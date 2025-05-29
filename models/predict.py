#!usr/bin/env python3.8
import numpy as np
import joblib
import sys
import json
import tensorflow as tf
from tensorflow.keras.models import load_model

scaler = joblib.load('scaler.pkl')

def predict(input_data):
    try:
        # Load the model and scaler
        # model = joblib.load('difficulty_prediction_model.pkl')
        # scaler = joblib.load('min_max_scaler.pkl')
        model = tf.keras.models.load_model("ann_model.h5")

        # Convert the input data from a JSON string to a Python list
        input_data = json.loads(input_data)

        # Convert the input data to a numpy array
        input_data = np.array([input_data])

        # Scale the input data using the loaded scaler
        scaled_input = scaler.transform(input_data)

        # Predict using the loaded model
        predicted_norm_score = model.predict(scaled_input)

        print("Predicted normalized score", predicted_norm_score[0])
        # Return the prediction as a JSON object
        return json.dumps({'predicted_norm_score': predicted_norm_score[0]})
    except Exception as e:
        # Print the exception message to stderr
        print(str(e), file=sys.stderr)
        sys.exit(1)


def predict_next60(input_data):
    try:
        
        model = load_model("ppo_model")

        # Convert the input data from a JSON string to a Python list
        input_data = json.loads(input_data)

        # Convert the input data to a numpy array
        input_data = np.array([input_data])

        # Scale the input data using the loaded scaler
        scaled_input = scaler.transform(input_data)

        # Predict using the loaded model
        predicted_norm_score = model.predict(scaled_input)

        print("Predicted normalized score", predicted_norm_score[0])
        # Return the prediction as a JSON object
        return json.dumps({'predicted_norm_score': predicted_norm_score[0]})
    except Exception as e:
        # Print the exception message to stderr
        print(str(e), file=sys.stderr)
        sys.exit(1)

if __name__ == "__main__":
    # Retrieve the input data from the command line
    input_data = sys.argv[1]

    if input_data[0] == 0:
        prediction_result = predict(input_data[1:])
    else:
        prediction_result = predict_next60(input_data[1:])

    # Print the prediction result
    print(prediction_result)
