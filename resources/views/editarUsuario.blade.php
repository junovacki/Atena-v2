<?php
use Illuminate\Support\Facades\DB;
    $usuario = DB::select("SELECT * FROM users where id = ?", [$idUsuario]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editare Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
    <div id="botaoVoltar">
        <a href="/dashboard">Voltar</a>
    </div>

    @if ($_COOKIE['nivelAcesso'] == 1)
        <div id="dashADM"></div>

    @endif

	@vite('resources/js/app.js')
    @if ($_COOKIE['nivelAcesso'] == 1 )
    <form id="formCadastro" >

        <div id="campoLogin">
            Login: <input type="text" name="login" id="login" value="<?= $usuario[0]->user ?>"/>
        </div>
        <div id="campoSenha">
            Senha: <input type="password" name="senha" id="senhar" value="<?= $usuario[0]->password ?>"/>
        </div>
        <div id="campoTipoUsuario">
            Tipo de usuário: <select id="tipoUsuario" name="tipoUsuario">
                <option value="2" <?php if($usuario[0]->nivelAcesso == '2'){echo "selected";} ?>>Coordenador</option>
                <option value="3" <?php if($usuario[0]->nivelAcesso == '3'){echo "selected";} ?>>Professor</option>
            </select>
        </div>
        <input type="hidden" value="<?= $usuario[0]->id?>" name="id" id="idUsuario"/>
        <input type="button" onclick="enviar()" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif
</body>
</html>

<script>
    function enviar() {
            axios.post('http://127.0.0.1:8000/api/atualizarUsuario', {
                login: document.getElementById('login').value,
                tipoUsuario: document.getElementById('tipoUsuario').value,
                id: document.getElementById('idUsuario').value,
                senha: document.getElementById('senhar').value
            })
            .then(function (response) {
                let resposta = response;
                alert(resposta.data);
                window.location.href='/dashboard-user';

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
        width: 450px;
        height: 350px;
        margin-left: 0%;
        border-style: solid;
        border-radius: 20% !important;
        position: fixed;
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
        margin-top: 1% !important;
        margin-left: 10% !important;
    }
    #login{
        padding: 0px;
        margin-top: 20px;
        width: 66%;
    }
    #nome_curso{
        width: 49%;
    }
    #campoSenha{
        margin-top: 3%;
        margin-left: 10%;
    }
    #senhar{
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
