<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<div class="header">
  <div class="row">
    <div class="col-lg-6">
    </div>
    <?php
    include_once '../models/dbConnection.php';
    session_start();
    $email = $_SESSION['email'];
    if (!(isset($_SESSION['email']))) {
      header("location:index.php");
    } else {
      $name = $_SESSION['name'];

      include_once '../models/dbConnection.php';
      echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="dash.php" class="log log1">' . $email . '</a>&nbsp;|&nbsp;<a href="logout.php?q=dash.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
    } ?>

  </div>
</div>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PARAKH</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

  <script>
    $(function() {
      $(document).on('scroll', function() {
        console.log('scroll top : ' + $(window).scrollTop());
        if ($(window).scrollTop() >= $(".logo").height()) {
          $(".navbar").addClass("navbar-fixed-top");
        }

        if ($(window).scrollTop() < $(".logo").height()) {
          $(".navbar").removeClass("navbar-fixed-top");
        }
      });
    });
  </script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <style>
    .styles_calendar__1s6ps {
      display: block;
      max-width: 100%;
      height: auto;
      overflow: visible;
    }

    .styles_calendar__1s6ps text {
      fill: currentColor;
    }

    .styles_block__1oBAV {
      stroke: rgba(0, 0, 0, 0.1);
      stroke-width: 1px;
      shape-rendering: geometricPrecision;
    }

    .styles_footer__56qQv {
      display: flex;
    }

    .styles_legendColors__1wUi_ {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 0.2em;
    }

    /*noinspection CssUnresolvedCustomProperty*/
    @keyframes styles_loadingAnimation__1DJJ8 {
      0% {
        fill: var(--react-activity-calendar-loading);
      }

      50% {
        fill: var(--react-activity-calendar-loading-active);
      }

      100% {
        fill: var(--react-activity-calendar-loading);
      }
    }

    /* Global Styles */
    body {
      background-image: url('cool-background.jpg');
      font-family: 'Montserrat', sans-serif;
    }

    /* Header */
    .header {
      background-color: #1E3A8A;
      color: #fff;
      padding: 20px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .header .title1 {
      font-size: 24px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .header .log1 {
      font-size: 18px;
      font-weight: bold;
    }

    .header .log1 .glyphicon {
      margin-right: 10px;
    }

    .header .log {
      font-size: 18px;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      transition: all 0.5s;
    }

    .header .log:hover {
      color: #f4511e;
      text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.5);
    }

    /* Navigation */
    .navbar {
      background-color: #4D648D;
      border: none;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 16px;
      font-weight: bold;
      letter-spacing: 2px;
      text-transform: uppercase;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar .navbar-brand {
      color: #f4511e !important;
      font-size: 24px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar .navbar-brand:hover {
      color: #f4511e;
      text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.5);
    }

    .navbar .navbar-nav>li>a {
      color: #f4511e;
      padding: 20px;
      transition: all 0.5s;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar .navbar-nav>li>a:hover {
      color: #f4511e;
      background-color: #1E3A8A;
      transform: scale(1.1);
    }

    .navbar .dropdown-menu {
      background-color: #4D648D;
      border: none;
      border-radius: 0;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar .dropdown-menu>li>a {
      color: #fff;
      padding: 10px 20px;
      transition: all 0.5s;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar .dropdown-menu>li>a:hover {
      color: #f4511e;
      background-color: #1E3A8A;
      transform: scale(1.1);
    }

    /* Content */
    .content {
      padding: 50px;
    }

    .content h2 {
      font-size: 36px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 50px;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .content .panel {
      border: none;
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
      transition: all 0.5s;
    }

    .content .panel:hover {
      box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.5);
      transform: scale(1.05);
    }

    .content .panel-heading {
      background-color: #1E3A8A;
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-radius: 10px 10px 0 0;
      padding: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .content .panel-body {
      padding: 50px;
    }

    .content .panel-footer {
      background-color: #1E3A8A;
      color: #fff;
      font-size: 18px;
      font-weight: bold;
      text-transform: uppercase;
    }
    /* Add hover animation to table rows */
    .table tbody tr:hover {
      background-color: #FFC300;
      transform: scale(1.02);
      transition: background-color 0.3s, transform 0.3s;
    }

    /* Animate table header */
    .table thead th {
      background-color: #FFC300;
      animation: slideInDown 1s forwards;
    }

    /* Keyframes animation for table header */
    @keyframes slideInDown {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
    .custom-file-upload {
        cursor: pointer;
        padding: 10px 20px;
        background-color: #f4511e;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .custom-file-upload:hover {
        background-color: #ff6f3d;
    }

    /* Style for the file input (hidden) */
    #csvFile {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
    }
  </style>
</head>

<body style="background:#eee;">

  <!-- admin start-->

  <!--navigation menu-->
  <nav class="navbar navbar-default title1">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard - TEACHER</b></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
          <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="dash.php?q=1">Scores</a></li>
          <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
          <!---- <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>  ---->
          <li class="dropdown <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo 'active'; ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="dash.php?q=4">Add Quiz</a></li>
              <li><a href="dash.php?q=5">Remove Quiz</a></li>
            </ul>
          </li>
          <li <?php if (@$_GET['q'] == 6) echo 'class="active"'; ?>><a href="dash.php?q=6">Upload Quiz</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!--navigation menu closed-->
  <div class="container"><!--container start-->
    <div class="row">
      <div class="col-md-12">

        <!--dataset-->
        <div class="panel">
          <?php if (@$_GET['q'] == 6) { ?>
            <div class="file_upload" style="text-align: center;">
              <form action="../router.php" method="post" enctype="multipart/form-data">
                <div class="file-input-container">
                  <label for="csvFile" class="custom-file-upload" style="font-size: 18px; text-align: center;">
                    <i class="fas fa-cloud-upload-alt"></i> Upload your Question bank CSV
                  </label>
                  <input type="file" name="csvFile" id="csvFile" accept=".csv" required style="font-size: 15px; text-align: center;">
                </div><br>

                <input type="submit" value="Upload" style="font-size: 15px;"><br>
              </form>
            </div><br>
          <?php } ?>
        </div>

        <!--uploaded-->
        <?php if (@$_GET['q'] == 7) {
          echo "
         <script>
             // Function to display an alert pop-up message
             function displayAlertMessage(message) {
                 alert(message);
             }
 
             // Call the function to display the message
             displayAlertMessage('Quiz has been successfully uploaded!');
         </script>
         ";
        } ?>

        <!--home start-->

        <?php if (@$_GET['q'] == 0) {

          $result = mysqli_query($con, "SELECT * FROM quiz where email='$email' ORDER BY date DESC") or die('Error');
          echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>positive</b></td><td><b>negative</b></td><td><b>Time limit</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $sahi = $row['sahi'];
            $wrong = $row['wrong'];
            $time = $row['time'];
            $eid = $row['eid'];
            $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
            $rowcount = mysqli_num_rows($q12);
            if ($rowcount == 0) {
              echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $sahi . '</td><td>' . $wrong . '</td><td>' . $time . '&nbsp;min</td>
	</tr>';
            } else {
              echo '<tr style="color:#99cc32"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	</tr>';
            }
          }
          $c = 0;
          echo '</table></div>';
        }



        //score details
        if (@$_GET['q'] == 1) {
          $q = mysqli_query($con, "SELECT distinct q.title,u.name,u.college,h.score,h.date from user u,history h,quiz q where q.email='$email' and q.eid=h.eid and h.email=u.email order by q.eid DESC") or die('Error197');
          //$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
          echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:black"><td><b>S.N.</b></td><td><b>Title</b></td><td><b>Name</b></td><td><b>College</b></td><td><b>Score<b></td><td><b>Date</b></td>';
          $c = 0;
          while ($row = mysqli_fetch_array($q)) {
            $title = $row['title'];
            $name = $row['name'];
            $college = $row['college'];
            $score = $row['score'];
            $date = $row['date'];
            echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $name . '</td><td>' . $college . '</td><td>' . $score . '</td><td>' . $date . '</td></tr>';
          }

          //$q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
          //while($row=mysqli_fetch_array($q23) )
          //{
          //$title=$row['title'];
          //}
          //$c++;
          //echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
          //}
          echo '</table></div>';
        }


        //ranking start
        if (@$_GET['q'] == 2) {
          //           $q = mysqli_query($con, "SELECT * FROM `rank` ORDER BY score DESC") or die('MySQL Error: ' . mysqli_error($con));

          //           echo  '<div class="panel title">
          // <table class="table table-striped title1" >
          // <tr><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
          //           $c = 0;
          //           while ($row = mysqli_fetch_array($q)) {
          //             $e = $row['email'];
          //             $s = $row['score'];
          //             $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
          //             while ($row = mysqli_fetch_array($q12)) {
          //               $name = $row['name'];
          //               $gender = $row['gender'];
          //               $college = $row['college'];
          //             }
          //             $c++;
          //             echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
          //           }
          //           echo '</table></div>';
          $q = mysqli_query($con, "SELECT * FROM `userhistory` ORDER BY total_result DESC") or die('MySQL Error: ' . mysqli_error($con));

          echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr><td><b>ID</b></td><td><b>Rank</b></td><td><b>Total Marks</b></td><td><b>Average Difficulty</b></td><td><b>Attempted At</b></td>';
          $c = 0;
          while ($row = mysqli_fetch_array($q)) {
            $rank = $row['Rank'];
            $tr = $row['total_result'];
            $ad = $row['average_difficulty'];
            $ct = $row['created_at'];

            $c++;
            echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td>' . $rank . '</td><td>' . $tr . '</td><td>' . $ad . '</td><td>' . $ct . '</td><td>';
          }
          echo '</table></div>';
        }

        ?>


        <!--home closed-->
        <!--users start-->



        <!--user end-->

        <!--feedback start-->

        <!--feedback closed-->

        <!--feedback reading portion start-->
        <?php if (@$_GET['fid']) {
          echo '<br />';
          $id = @$_GET['fid'];
          $result = mysqli_query($con, "SELECT * FROM feedback WHERE id='$id' ") or die('Error');
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $subject = $row['subject'];
            $date = $row['date'];
            $date = date("d-m-Y", strtotime($date));
            $time = $row['time'];
            $feedback = $row['feedback'];

            echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $subject . '</b></h1>';
            echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;' . $date . '</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;' . $time . '</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;' . $name . '</span><br />' . $feedback . '</div></div>';
          }
        } ?>
        <!--Feedback reading portion closed-->

        <!--add quiz start-->
        <?php
        if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
          echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="../models/update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
        }
        ?>
        <!--add quiz end-->

        <!--add quiz step2 start-->
        <?php
        if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
          echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';

          for ($i = 1; $i <= @$_GET['n']; $i++) {
            echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '1"></label>  
  <div class="col-md-12">
  <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '2"></label>  
  <div class="col-md-12">
  <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '3"></label>  
  <div class="col-md-12">
  <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '4"></label>  
  <div class="col-md-12">
  <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question ' . $i . '</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
          }

          echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
        }
        ?><!--add quiz step 2 end-->

        <!--remove quiz-->
        <?php if (@$_GET['q'] == 5) {

          $result = mysqli_query($con, "SELECT * FROM quiz where email='$email' ORDER BY date DESC") or die('Error');
          echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $sahi = $row['sahi'];
            $time = $row['time'];
            $eid = $row['eid'];
            echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	<td><b><a href="../models/update.php?q=rmquiz&eid=' . $eid . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
          }
          $c = 0;
          echo '</table></div>';
        }
        ?>


      </div><!--container closed-->
    </div>
  </div>
</body>

</html>