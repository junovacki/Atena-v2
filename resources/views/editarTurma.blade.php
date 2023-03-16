<?php

use Illuminate\Support\Facades\DB;
if($_COOKIE['nivelAcesso'] == 1){
        $turmas = DB::select("SELECT * FROM turmas
                        where turmas.id = ?", [$id]);
        $grades = DB::select("SELECT * FROM grades");

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Turma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
    @if ($_COOKIE['nivelAcesso'] == 1)
        <div id="dashADM"></div>

    @endif

	@vite('resources/js/app.js')
    <div id="botaoVoltar">
        <a href="/dashboard-turma">Voltar</a>
    </div>

    <div class="alert alert-success">
        {{ session('alert') }}
    </div>

    @if ($_COOKIE['nivelAcesso'] == 1 )
    <form id="formCadastro">
        <div id="campoLogin">
            Nome da turma: <input type="text" name="nome_turma" id="nome_turma" value="<?= $turmas[0]->descricao ?>"/>
        </div>
        <div id="campoLogin">
            Serie da turma: <input type="text" name="serie_turma" id="serie_turma" value="<?= $turmas[0]->serie ?>"/>
        </div>
        <div id="campoLogin">
            Ano da turma: <input type="text" name="ano_turma" id="ano_turma" value="<?= $turmas[0]->ano ?>"/>
        </div>
        <div id="campoLogin2">
            Semestre da turma: <input type="text" name="semestre_turma" id="semestre_turma" value="<?= $turmas[0]->semestre ?>"/>
        </div>
        <div id="campoTipoUsuario">
            Grade da turma: <select id="tipoCurso" name="tipoCurso" style="margin-left: 14px;">
            @foreach($grades as $grade)
                <option value="<?= $grade->id?>" <?php if($turmas[0]->idGrade == $grade->id){echo "selected";} ?>><?= $grade->descricao?></option>
            @endforeach
            </select>
        </div>

        <input type="hidden" value="<?= $id?>" name="idTurma" id="idTurma"/>
        <input type="button" onclick="enviar()" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif

</body>
</html>

<script>
function enviar() {

    let eModalidade = document.getElementById('tipoCurso');
    let modalidade= eModalidade.options[eModalidade.selectedIndex].value;


        axios.post('http://127.0.0.1:8000/api/atualizarTurma', {
            descricao: document.getElementById('nome_turma').value,
            ano: document.getElementById('ano_turma').value,
            semestre: document.getElementById('semestre_turma').value,
            serie: document.getElementById('serie_turma').value,
            id: document.getElementById('idTurma').value,
            grade: modalidade,

        })
        .then(function (response) {
            let resposta = response;
            alert(resposta.data);
            window.location.href='/dashboard-turma';

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
#campoLogin2{
    margin-top: 1% !important;
}
#login{
    padding: 0px;
    width: 60%;
}
#nome_curso{
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
