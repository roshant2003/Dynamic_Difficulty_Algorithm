from flask import Flask, request, jsonify
import pickle
from pickle import load
import pandas as pd
import numpy as np
import os
import subprocess
import threading
from time import sleep
import tensorflow as tf
from sklearn.preprocessing import MinMaxScaler
from tensorflow.keras.optimizers import Adam
# model = load(open('difficulty_prediction_model.pkl', 'rb'))
# scaler = load(open('min_max_scaler.pkl', 'rb'))
custom_objects = {"Custom>Adam": Adam}
model = tf.keras.models.load_model("ann_model.h5", custom_objects=custom_objects)
#model = tf.keras.models.load_model("ann_model.h5")
import joblib
scaler = joblib.load("scaler.pkl")  # Use joblib instead of pickle

#scaler = load(open('scaler.pkl', 'rb'))

app = Flask(__name__)
def run_proctoring_script():
    script_directory = r'C:/wamp64/www/WebApp1roshan/WebApp1/Flask app/Intelligent-Online-Exam-Proctoring-System/Code'
    os.chdir(script_directory)

    # Run the script using Python in a separate process
    script_name = 'online_proctoring_system.py'
    subprocess.run(['python', script_name])
@app.route('/endpoints', methods=['POST'])
def initiate_proctoring():
    var=request.form.get('status')
    print(var)
    if var == '1':
        # Start the proctoring script in a separate thread
        proctoring_thread = threading.Thread(target=run_proctoring_script)
        proctoring_thread.start()
        sleep(25)
        # Return a response indicating the script has started
        return jsonify({'message': 'Proctoring script started.'})
    # if var == '1':
    #     script_directory = r'C:/wamp64/www/WebApp/Flask app/Intelligent-Online-Exam-Proctoring-System/Code'   
    #     os.chdir(script_directory)

    #     # Run the script using Python
    #     script_name = 'online_proctoring_system.py'
    #     #subprocess.run(['python', script_name])
    #     subprocess.Popen(['python', script_name])
    #     return jsonify({'message': 'Proctoring script started.'})
    #     #return var

    elif var == '0':
        # Terminate the script by sending Ctrl+C signal
        subprocess.run(['taskkill', '/F', '/T', '/PID', str(os.getpid())])
        #return var

'''
@app.route('/endpoint', methods=['POST'])
def handle_post_request():
    # Retrieve POST data from PHP
    malp = request.form.get('Malpractice_score')
    diff = request.form.get('Difficulty')
    time_spent = request.form.get('Time_Spent')
    res = request.form.get('Result')

    user_input = {
    'diff': float(diff),
    'mal': float(malp),
    'time': float(time_spent),
    'res': int(res)
    }

    user_input_df = pd.DataFrame([user_input])

    # Scale the features for the user input
    user_input_df[['diff_scaled', 'mal_scaled']] = scaler.transform(user_input_df[['diff', 'mal']])
    user_input_df['time_scaled'] = user_input_df['time'] / 100.0

    # Extract the features for prediction
    features_for_prediction = user_input_df[['diff_scaled', 'mal_scaled', 'time_scaled', 'res']]

    # Predict using the trained Random Forest Regressor
    predicted_norm_score = model.predict(features_for_prediction)

    print(predicted_norm_score[0])

    return jsonify({'predicted_norm_score': predicted_norm_score[0]})
    # return predicted_norm_score[0]

'''
# Newly edited
@app.route('/endpoint', methods=['POST'])
def handle_post_request():
    # Retrieve POST data from PHP
    malp = request.form.get('Malpractice_score')
    diff = request.form.get('Difficulty')
    time_spent = request.form.get('Time_Spent')
    res = request.form.get('Result')
    ideal_time = 40

    user_input = {
    'diff': float(diff),
    'mal': float(malp),
    'time': float(time_spent),
    'res': int(res),
    'ideal_time' : int(ideal_time)
    }

    input_data = np.array([[user_input['diff'], user_input['time'], user_input['ideal_time'], user_input['res'], user_input['mal']]])
    input_data_scaled = scaler.transform(input_data)  # Apply scaling
    predicted_score = model.predict(input_data_scaled)[0][0]
    print("Predicted Score :", max(0, min(100, predicted_score)))  # Keep within range 0-100

    #return jsonify({'predicted_norm_score': max(0, min(100, predicted_score))})
    return jsonify({'predicted_norm_score': float(max(0, min(100, predicted_score)))})



if __name__ == '__main__':
    app.run(debug=True)  
