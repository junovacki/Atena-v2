<?php

use Illuminate\Support\Facades\DB;
if($_COOKIE['nivelAcesso'] == 3){
    $cursos = DB::select("SELECT * FROM cursos");
    $disciplinas = DB::select("SELECT * FROM disciplinas");
    $pergunta = DB::select("SELECT * FROM perguntas WHERE id = ?",[$id]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Perguntas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
    @if ($_COOKIE['nivelAcesso'] == 3)
        <div id="dashProfessor"></div>

    @endif

	@vite('resources/js/app.js')
    <div id="botaoVoltar">
        <a href="/dashboard-pergunta">Voltar</a>
    </div>

    <div class="alert alert-success">
        {{ session('alert') }}
    </div>

    @if ($_COOKIE['nivelAcesso'] == 3 )
    <form id="formCadastro">
        <div id="campoCurso">
            Nome do curso: <select id="curso" name="curso" style="margin-left: 0px; max-width: 100px;">
            @foreach($cursos as $curso)
                <option value="<?= $curso->id?>" <?php if($pergunta[0]->idCurso == $curso->id){ echo 'selected';} ?>><?= $curso->nome_curso?></option>
            @endforeach
            </select>
            Nome da disciplina: <select id="disciplina" name="disciplina" style="max-width: 100px;">
            @foreach($disciplinas as $disciplina)
                <option value="<?= $disciplina->id?>" <?php if($pergunta[0]->idDisciplina == $disciplina->id){ echo 'selected';} ?>><?= $disciplina->nome_disciplina?></option>
            @endforeach
            </select>
        </div>
        <div id="campoPergunta">
            Questão: <textarea rows = "5" cols = "60" name = "pergunta" id="texto_pergunta">
            <?= $pergunta[0]->texto_pergunta?>
         </textarea>
        </div>
        <div>
            <div id="campoRespostaA">
                <input type="radio" name="radio" id="radioA" onchange="a()" <?php if($pergunta[0]->alternativa_a == 1){ echo 'checked="checked" value="1"';} ?>> A) <textarea rows = "3" cols = "60" id = "respostaA" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_a?>
            </textarea>
            </div>
            <div id="campoRespostaB">
                <input type="radio" name="radio" id="radioB" onchange="b()" <?php if($pergunta[0]->alternativa_b == 1){ echo 'checked="checked" value="1"';} ?>> B) <textarea rows = "3" cols = "60" id = "respostaB" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_b?>
            </textarea>
            </div>
            <div id="campoRespostaC">
                <input type="radio" name="radio" id="radioC" onchange="c()" <?php if($pergunta[0]->alternativa_c == 1){ echo 'checked="checked" value="1"';} ?>> C) <textarea rows = "3" cols = "60" id = "respostaC" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_c?>
            </textarea>
            </div>
            <div id="campoRespostaD">
                <input type="radio" name="radio" id="radioD" onchange="d()" <?php if($pergunta[0]->alternativa_d == 1){ echo 'checked="checked" value="1"';} ?>> D) <textarea rows = "3" cols = "60" id = "respostaD" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_d?>
            </textarea>
            <div id="campoRespostaE">
                <input type="radio" name="radio" id="radioE" onchange="e()" <?php if($pergunta[0]->alternativa_e == 1){ echo 'checked="checked" value="1"';} ?>> E) <textarea rows = "3" cols = "60" id = "respostaE" style="margin-left: 35px;">
                <?= $pergunta[0]->texto_resposta_e?>
            </textarea>
            </div>
        </div>
        <input type="hidden" name="idPergunta" id="idPergunta" value="<?= $id?>"/>

        <input type="hidden" name="" id="nome_usuario" value="<?= $_COOKIE['login']?>">
        <input type="button" onclick="enviar()" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif

</body>
</html>

<script>
function enviar() {

        axios.post('http://127.0.0.1:8000/api/atualizarPergunta', {
            texto_pergunta: document.getElementById('texto_pergunta').value,
            id: document.getElementById('idPergunta').value,
            nome_usuario: document.getElementById('nome_usuario').value,
            curso: document.getElementById('curso').value,
            disciplina: document.getElementById('disciplina').value,
            texto_resposta_a: document.getElementById('respostaA').value,
            texto_resposta_b: document.getElementById('respostaB').value,
            texto_resposta_c: document.getElementById('respostaC').value,
            texto_resposta_d: document.getElementById('respostaD').value,
            texto_resposta_e: document.getElementById('respostaE').value,
            alternativa_a: document.getElementById('radioA').value,
            alternativa_b: document.getElementById('radioB').value,
            alternativa_c: document.getElementById('radioC').value,
            alternativa_d: document.getElementById('radioD').value,
            alternativa_e: document.getElementById('radioE').value
        })
        .then(function (response) {
            let resposta = response;
            alert(resposta.data);
            window.location.href='/dashboard-pergunta';

        })
        .catch(function (error) {
            console.log('Erro na requisicao');
        });
    }

    function a(){
        radioA.setAttribute("value", "1");
        radioB.setAttribute("value", "0");
        radioC.setAttribute("value", "0");
        radioD.setAttribute("value", "0");
        radioE.setAttribute("value", "0");
    }
    function b(){
        radioA.setAttribute("value", "0");
        radioB.setAttribute("value", "1");
        radioC.setAttribute("value", "0");
        radioD.setAttribute("value", "0");
        radioE.setAttribute("value", "0");
    }
    function c(){
        radioA.setAttribute("value", "0");
        radioB.setAttribute("value", "0");
        radioC.setAttribute("value", "1");
        radioD.setAttribute("value", "0");
        radioE.setAttribute("value", "0");
    }
    function d(){
        radioA.setAttribute("value", "0");
        radioB.setAttribute("value", "0");
        radioC.setAttribute("value", "0");
        radioD.setAttribute("value", "1");
        radioE.setAttribute("value", "0");
    }
    function e(){
        radioA.setAttribute("value", "0");
        radioB.setAttribute("value", "0");
        radioC.setAttribute("value", "0");
        radioD.setAttribute("value", "0");
        radioE.setAttribute("value", "1");
    }

</script>

<style>



#formCadastro{
    background-color: rgb(177, 174, 174);
    float: inherit;
    position: center;
    width: 912px;
    height: 750px;
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
    width: 60%;
}
#nome_disciplina{
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
    margin-left: 15%;
    width: 25%;

}
#submitCurso{
    margin-top: 21%;
    margin-left: 45%;
}
</style>
