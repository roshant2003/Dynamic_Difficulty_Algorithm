<?php
require_once('models/homeModel.php');
require_once('router.php');

class homeController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new homeModel($db);
    }

    public function startStopProctoring($status)
    {
        $postData = array(
            'status' => $status
        );
        $url = 'http://localhost:5000/endpoints';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
    }

    public function sendToFlask($userData)
    {
        $url = 'http://localhost:5000/endpoint';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json_response = curl_exec($ch);
        curl_close($ch);

        $response_data = json_decode($json_response, true);
        return $response_data['predicted_norm_score'];
    }

    public function processForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_FILES["csvFile"])) {
                if ($_FILES["csvFile"]["error"] == UPLOAD_ERR_OK) {
                    $csvFile = $_FILES["csvFile"]["tmp_name"];
                    $this->model->dataInsertion($csvFile);
                    header("location:views/dash.php?q=7");
                } else {
                    echo "Error code: " . $_FILES["csvFile"]["error"];
                }
            }

            if (isset($_POST['skip_upload'])) {
                include('views/test_start_page.php');
            }

            if (isset($_POST['test_start'])) {
                $qn_num = 1;
                $qa = $this->model->fetchFirstQuestion();

                if ($qa == null) {
                    include('views/finish_test.php');
                } else {
                    $options = array();
                    $qn_id = $qa[0]['id'];
                    $question = $qa[0]['question'];
                    $options[0] = $qa[0]['opa'];
                    $options[1] = $qa[0]['opb'];
                    $options[2] = $qa[0]['opc'];
                    $options[3] = $qa[0]['opd'];
                    $qn_diff = $qa[0]['diff_score'];
                    $this->startStopProctoring(1);
                    include('views/Question_display.php');
                }
            }

            if (isset($_POST['answer']) && isset($_POST['qn_num'])) {
                $user_ans = $_POST['answer'];
                $qn_id = $_POST['qn_id'];
                $page_load_time = $_POST['page_load_time'];

                $userData = array();
                date_default_timezone_set('Asia/Kolkata');
                $endtime = date('Y-m-d H:i:s');
                $starttime = date('Y-m-d H:i:s', $page_load_time);

                $userData['Difficulty'] = $this->model->fetchDiff($qn_id);
                $time_spent_on_page = time() - $page_load_time;
                $userData['Time_Spent'] = $time_spent_on_page;

                // ✅ Get ideal time from database instead of hardcoding
                $userData['ideal_time_spent'] = $this->model->fetchIdealTime($qn_id);

                $res = $this->model->validateUserAns($qn_id, $user_ans);
                $userData['Result'] = $res;
                $userData['Malpractice_score'] = $this->model->fetchMalpScore($starttime, $endtime);

                $this->model->tempScoresTable(
                    $qn_id,
                    $userData['Difficulty'],
                    $time_spent_on_page,
                    $userData['ideal_time_spent'],
                    $res,
                    $userData['Malpractice_score']
                );

                $qn_num = $_POST['qn_num'];
                $qn_num++;

                if ($qn_num <= 20) {
                    $diff = $this->sendToFlask($userData);
                    $qa = $this->model->fetchQnfromDiff($diff);
                } else {
                    $qa = null;
                }

                $this->model->updatePerc($qn_id, $res);

                if ($qa == null) {
                    $result = $this->model->getScoreAndAverage();
                    $totalResult = $result['score'];
                    $averageDifficulty = $result['avgdiff'];
                    $currentDatetime = date('Y-m-d H:i:s');

                    $this->model->userhistory($totalResult, $averageDifficulty, $currentDatetime);
                    $this->startStopProctoring(0);
                    include('views/finish_test.php');
                } else {
                    $options = array();
                    $qn_id = $qa[0]['id'];
                    $question = $qa[0]['question'];
                    $options[0] = $qa[0]['opa'];
                    $options[1] = $qa[0]['opb'];
                    $options[2] = $qa[0]['opc'];
                    $options[3] = $qa[0]['opd'];
                    $qn_diff = $qa[0]['diff_score'];

                    include('views/Question_display.php');
                }
            }
        }
    }
}
