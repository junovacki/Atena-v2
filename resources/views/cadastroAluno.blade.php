
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Aluno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
    @if ($_COOKIE['nivelAcesso'] == 1)
        <div id="dashADM"></div>

    @endif

	@vite('resources/js/app.js')
    <div id="botaoVoltar">
        <a href="/dashboard-aluno">Voltar</a>
    </div>

    <div class="alert alert-success">
        {{ session('alert') }}
    </div>

    @if ($_COOKIE['nivelAcesso'] == 1 )
    <form id="formCadastro">
        <div id="campoLogin" style="margin-top: 130px !important">
            Nome do aluno: <input type="text" name="nome_aluno" id="nome_aluno"/>
        </div>
        <div id="campoLogin">
            Cpf do aluno: <input type="text" name="nome_aluno" id="cpf_aluno"/>
        </div>
        <div id="campoLogin">
            RG do aluno: <input type="text" name="nome_aluno" id="rg_aluno"/>
        </div>
        <div id="campoLogin">
            Endereco do aluno: <input type="text" name="nome_aluno" id="endereco_aluno"/>
        </div>
        <div id="campoLogin">
            Telefone do aluno: <input type="text" name="nome_aluno" id="telefone_aluno"/>
        </div>
        <div id="campoLogin">
            E-mail do aluno: <input type="text" name="nome_aluno" id="email_aluno"/>
        </div>
        <div id="campoLogin">
            RA do aluno: <input type="text" name="nome_aluno" id="ra_aluno"/>
        </div>


        <input type="button" onclick="enviar()" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif

</body>
</html>

<script>
function enviar() {

        axios.post('http://127.0.0.1:8000/api/registrarAluno', {
            nome_aluno: document.getElementById('nome_aluno').value,
            cpf_aluno: document.getElementById('cpf_aluno').value,
            rg_aluno: document.getElementById('rg_aluno').value,
            telefone_aluno: document.getElementById('telefone_aluno').value,
            endereco_aluno: document.getElementById('endereco_aluno').value,
            email_aluno: document.getElementById('email_aluno').value,
            ra_aluno: document.getElementById('ra_aluno').value
        })
        .then(function (response) {
            let resposta = response;
            alert(resposta.data);
            window.location.href='/cadastroAluno';

        })
        .catch(function (error) {
            console.log('Erro na requisicao');
        });
    }

</script>

<style>

#formCadastro{
    background-color: rgb(177, 174, 174);
    float: inherit;
    position: center;
    width: 512px;
    height: 1050px;
    margin-left: 0%;
    border-style: solid;
    border-radius: 20% !important;
}
#body{
    flex-direction: row-reverse;
}

#botaoVoltar {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    margin-top: -650px;
    text-decoration: none;
    position: fixed;
    font-size: 16px;
    margin-left: 85% !important;
}
#campoLogin{
    margin-top: 1% ;
    margin-left: 10% !important;
}
#login{
    padding: 0px;
    width: 60%;
}
.nome_aluno{
    width: 49%;
}
#campoSenha{
    margin-top: 3%;
    margin-left: 10%;
}
#senhas{
    padding: 0px;
    width: 65%;
}
#campoTipoUsuario{
    margin-top: 3%;
    margin-left: 10%;
}
#submitUsuario{
    margin-top: 25%;
    margin-left: 15%;
    width: 45%;

}
#submitCurso{
    margin-top: 21%;
    margin-left: 45%;
}
</style>
