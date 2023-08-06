from crypt import methods
import json
from unicodedata import name
from flask import Flask, jsonify, request, render_template, session
import sys
from time import time
import numpy as np
import matplotlib.pyplot as plt
from sklearn.gaussian_process.kernels import RBF, WhiteKernel
from sklearn.gaussian_process import GaussianProcessRegressor

app = Flask(__name__)

app.secret_key = '8bebb763dee92176725f405a23bd6b5efd9de6e0d173f470018d1577dda83096'


@app.route("/")
def root():
    return render_template("index.html")

@app.route("/index")
def index():
    return render_template("index.html")

@app.route("/dda", methods=['GET', 'POST'])
def dda():
    if request.method == "POST":
        request_data = request.get_json()
        print(request_data)
        hint = request_data['level']
        times = request_data['score']

        totalscore = 0
        max_score = 50.0

        priory = [np.log(13.0), np.log(23.0), np.log(33.0), np.log(36.0), np.log(43.0)]
        goal = max_score*0.7
        log_goal = np.log(goal)
        print(hint)
        hint = np.asarray(hint)
        print(times)
        times = np.asarray(times)
        domain = np.arange(1, 6)
        log_times = []
        if len(times)>0:
            for t in times:
                if t == 0:
                    t = 1
                log_times.append(np.log(t))

        kernel_1 = 1 * RBF(length_scale=1) + WhiteKernel(noise_level=np.log(2))
        gpr = GaussianProcessRegressor(kernel=kernel_1)

        X = np.array([hint.copy()]).T

        Y = []
        if len(hint) > 0:
            for x in range(len(hint)):
                Y.append(log_times[x] - priory[np.where(domain == hint[x])[0][0]])

        if len(X) > 0:
            gpr = gpr.fit(X, Y)
        n_samples = 1000
        max_so_far = []

        if len(log_times) > 0:
            for x in log_times:
                max_so_far.append(-1 * ((x - log_goal) ** 2))
        else:
            max_so_far.append(-999)
        Msf = max(max_so_far)

        prior_fn = np.array(priory)
        prior_fn = prior_fn.reshape(-1, 1)
        mu, sigma = gpr.predict(domain.reshape(-1, 1), return_std=True)

        mean_gp = mu.copy()
        standard_deviation = sigma.reshape(-1, 1)
        mean_gp = prior_fn + mean_gp.reshape(-1, 1)

        g_samples = mean_gp + standard_deviation * np.random.randn(mean_gp.shape[0], n_samples)
        g_samples = -(g_samples - log_goal) ** 2
        g_samples = g_samples - Msf
        ei = np.maximum(0, g_samples)
        ei = np.mean(ei, axis = 1)
        
        ei = np.argmax(ei)
        next_hints = int(domain[ei])
        print(next_hints)
        # return render_template("index.html", next_content=next_hints)
    else:
        next_hints = "nothing to see here"
    return jsonify(next_hints)

if __name__ == "__main__":
    print("Serving the web app")
    app.run()