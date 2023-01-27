import os
from flask import Flask

app = Flask(__name__)
app.config['SECRET_KEY'] = 'minha-palavra-secreta'

from routes import *


if __name__ == '__main__':
    PORT = int(os.getenv('PORT'), '5000')
    app.run(host='0.0.0.0', port=PORT)