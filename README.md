````markdown
# 🧠 Dynamic Difficulty Adjustment for Intelligent Online Exams

This project implements an **AI-powered online exam platform** that dynamically adjusts the **difficulty of questions** in real-time based on student performance, time taken, and behavior — enabling fairer and smarter evaluation.

It combines:
- 🧮 **PHP** for the main web application (hosted via WAMP server)
- 🐍 **Python** (Flask script `app.py`) to power the AI backend (question difficulty prediction)
- 🎯 An **ANN model** and a **PPO reinforcement learning agent** to determine the next question difficulty

---

## 🚀 Features

- 📊 Dynamic difficulty changes based on correctness, speed, and malpractice
- 🔐 No question navigation (strict exam flow)
- 🧠 ML-based decision logic using ANN (40% of exam) and PPO(Reinforcement Learning) (60%)
- 🎥 Face detection for exam proctoring
- 💡 Smart behavior detection using time-based suspicion and malpractice score

---

## 📁 Project Setup (Windows)

### 📌 1. Prerequisites

- **WAMP Server** installed and running
- **Python 3.7**
- **Git LFS** installed (`https://git-lfs.github.com`)

---

### 🔧 2. Clone the Repository and Setup Git LFS

```bash
git lfs install
git clone https://github.com/roshant2003/Dynamic_Difficulty_Algorithm.git
cd Dynamic_Difficulty_Algorithm
git lfs pull
````

---

### 🧠 3. Install Python Dependencies

```bash
cd WebApp1/Flask app/Intelligent-Online-Exam-Proctoring-System
python -m venv venv
venv\Scripts\activate   # Use `source venv/bin/activate` on Linux/Mac
pip install -r requirements.txt
```

---

### 🌐 4. Setup PHP Files in WAMP

1. Copy the entire `WebApp` folder and place it into:

   ```
   C:\wamp64\www\
   ```

   Rename the folder if needed (e.g., `exam_system`).

2. Start WAMP server and make sure it's running.

---

### ▶️ 5. Run the Python Backend Script

In a new terminal:

```bash
cd WebApp1/Flask app/Intelligent-Online-Exam-Proctoring-System
python app.py
```

This starts the Flask server (usually on `http://127.0.0.1:5000/`)

---

### 🌍 6. Open the Web App

In your browser:

```
http://localhost/WebApp1/index.php
```

> Make sure both the **WAMP server** and **Flask app.py** are running in the background.

---

## ⚙️ Machine Learning Models

* **ANN** (`difficulty_prediction_model.pkl`)
  Used in the first 40% of the exam to predict question difficulty based on:

  * Current difficulty
  * Time taken vs. ideal
  * Response correctness
  * Malpractice index

* **PPO RL Agent**
  Used in the remaining 60% to adaptively adjust difficulty and penalize abnormal patterns.


