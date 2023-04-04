<?php

use Illuminate\Support\Facades\DB;
if($_COOKIE['nivelAcesso'] == 1){
    $turmas = DB::select("SELECT * FROM turmas
                        where id = ?", [$id]);
    $aluno_turma = DB::select("SELECT * FROM aluno_turmas
                        LEFT JOIN alunos ON aluno_turmas.idAluno=alunos.id
                        where aluno_turmas.idTurma = ?", [$id]);
    $alunos = DB::select("SELECT * FROM alunos");

    foreach ($aluno_turma as $at) {
        foreach ($alunos as $key => $aluno) {
            if($aluno->id == $at->idAluno ){
                unset($alunos[$key]);
            }
        }
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinculo Aluno Turma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
    <link rel="stylesheet" type="text/css" href="../src/bootstrap-duallistbox.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="../src/jquery.bootstrap-duallistbox.js"></script>

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
            Descrição da turma: <input type="text" name="nome_grade" disabled id="nome_grade" value="<?= $turmas[0]->descricao?>"/>
        </div>


        <div class="container">
            <br />
            <div class="row">

                <div class="dual-list list-left col-md-5">
                    <div class="well text-right">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-search"></span>
                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="btn-group">
                                    <a class="btn btn-default selector" title="select all"><i class="fa fa-check-square"></i></a>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group">
                            @foreach ($alunos as $aluno)
                                <li class="list-group-item" value="<?= $aluno->id?>"><?= $aluno->ra?> - <?= $aluno->nome?></li>

                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="list-arrows col-md-1 text-center">
                    <span type="button" class="btn btn-default btn-sm move-left" >
                        <span class="fa fa-arrow-left"></span>
                    </span>

                    <span type="button" class="btn btn-default btn-sm move-right" >
                        <span class="fa fa-arrow-right"></span>
                    </span>
                </div>

                <div class="dual-list list-right col-md-5">
                    <div class="well">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="btn-group">
                                    <a class="btn btn-default selector" title="select all"><i class="fa fa-check-square"></i></a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                    <span class="input-group-addon glyphicon glyphicon-search"></span>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group">
                            @foreach ($aluno_turma as $aT)
                                <li class="list-group-item teste" value="<?= $aT->id?>"><?= $aT->ra?> - <?= $aT->nome?></li>

                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <input type="hidden" name="idGradess" id="idGradess" value="<?= $id?>"/>

        <input type="button" onclick="enviar()" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif

</body>
</html>

<script>
 var selecionados = [];
 var final = [];


    function init(){


    }
    window.onload = init;
    function in_array(needle, haystack){
    var found = 0;
    for (var i=0, len=haystack.length;i<len;i++) {
        if (haystack[i] == needle) return i;
            found++;
    }
    return -1;
}

        $(function () {

            $('.list-arrows span').click(function () {
                var $button = $(this), actives = '';
                if ($button.hasClass('move-left')) {
                    actives = $('.list-right ul li.active');
                    actives.removeClass('teste');

                    actives.clone().appendTo('.list-left ul');

                    selecionados.pop(actives.clone()[0].value);
                    actives.remove();
                } else if ($button.hasClass('move-right')) {

                    actives = $('.list-left ul li.active');

                    actives.addClass('teste');

                    actives.clone().appendTo('.list-right ul');
                    selecionados.push(actives.clone()[0].value);
                    actives.remove();

                }

            });


$('body').on('click', '.list-group .list-group-item', function () {
    $(".list-group .list-group-item").removeClass("active");
    $(this).toggleClass('active');
});


$('.dual-list .selector').click(function () {
    var $checkBox = $(this);
    if (!$checkBox.hasClass('selected')) {
        $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
        $checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
    } else {
        $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
        $checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
    }
});
$('[name="SearchDualList"]').keyup(function (e) {
    var code = e.keyCode || e.which;
    if (code == '9') return;
    if (code == '27') $(this).val(null);
    var $rows = $(this).closest('.dual-list').find('.list-group li');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    $rows.show().filter(function () {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});



});
function enviar() {
    var elements = document.getElementsByClassName('teste');
        for (let i = 0; i < elements.length; i++) {
            let myElement = elements[i]; // access element

            selecionados.push(myElement.value);
        }
    const filtered = selecionados.filter((item, index) => selecionados.indexOf(item) === index);

        axios.post('http://127.0.0.1:8000/api/vincularAlunos', {
            id: document.getElementById('idGradess').value,
            lista: filtered
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
@import url(//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css);


#formCadastro{
    background-color: rgb(177, 174, 174);
    float: inherit;
    position: center;
    width: 1012px;
    height: 670px;
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
    margin-top: 5%;
    margin-left: 15%;
    width: 45%;

}
#submitCurso{
    margin-top: 21%;
    margin-left: 45%;
}
.dual-list .list-group {
            margin-top: 8px;
        }

        .list-left li, .list-right li {
            cursor: pointer;
        }

        .list-arrows {
            padding-top: 100px;
        }

            .list-arrows button {
                margin-bottom: 20px;
            }
</style>
