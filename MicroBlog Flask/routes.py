from app import app
from flask import render_template, request, flash, redirect

@app.route('/')
@app.route('/index', defaults={'nome': 'usuário', 'profissao': 'indefinida'})
@app.route('/index/<nome>/<profissao>')
def index(nome, profissao):
    dados = {
        'nome': nome,
        'profissao': profissao,
    }
    return render_template('index.html', dados = dados)


@app.route('/contato')
def contato():
    return render_template('contato.html')


@app.route('/login')
def login():
    return render_template('login.html')


@app.route('/autenticar', methods=['POST'])
def autenticar():
    usuario = request.form.get('usuario')
    senha = request.form.get('senha')
    if usuario == 'admin' and senha == 'senha123':
        return "usuario: {} e senha: {}".format(usuario, senha)
    else:
        flash('dados inválidos')
        flash('login ou senha inválidos')
        return redirect('/login')