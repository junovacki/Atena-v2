<?php

use Illuminate\Support\Facades\DB;
if($_COOKIE['nivelAcesso'] == 2){

    $perguntas_prova = DB::select("SELECT * FROM prova_perguntas
                                where prova_perguntas.idProva = ?", [$id]);

    $alunos_prova = DB::select("SELECT * FROM prova_alunos
                        LEFT JOIN alunos ON prova_alunos.idAluno=alunos.id
                        where prova_alunos.idProva = ?", [$id]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Acertos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
    <link rel="stylesheet" type="text/css" href="../src/bootstrap-duallistbox.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

</head>
<body id="body">
    @if ($_COOKIE['nivelAcesso'] == 2)
        <div id="dashCoordenador"></div>

    @endif

	@vite('resources/js/app.js')
    <div id="botaoVoltar">
        <a href="/dashboard-prova">Voltar</a>
    </div>

    <div class="alert alert-success">
        {{ session('alert') }}
    </div>

    @if ($_COOKIE['nivelAcesso'] == 2 )
    <form id="formCadastro">
        <input type="hidden" value="<?= $id ?>" id="id_prova">
        @foreach ($alunos_prova as $aluno)
        <div id="campoLogin">
            <?= $aluno->ra?>-<?= $aluno->nome?> : <input type="number" step="1" min="0" max="<?= count($perguntas_prova)?>" class="nome_prova" id="<?= $aluno->idAluno?>" value="<?= $aluno->quantidadeAcerto?>"/>
        </div>
        @endforeach

        <input type="button" onclick="enviar()" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif

</body>
</html>

<script>




function enviar() {

    let selecionados = $('.nome_prova');
    let final = [];


    selecionados.each(function( key, valor ) {
        let array = {
            "idALuno" : valor.getAttribute('id'),
            "acertos" : valor.value
        };


        final.push(array);

    });
    console.log(final);


        axios.post('http://127.0.0.1:8000/api/atribuirAcertos', {
            id_prova: document.getElementById('id_prova').value,

            alunos_respostas: final
        })
        .then(function (response) {
            let resposta = response;
            alert(resposta.data);
            window.location.href='/dashboard-prova';

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
p {
  color: #b3b3b3;
  font-weight: 300; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a, a:hover {
    text-decoration: none !important; }



h2 {
  font-size: 20px; }

.custom-table {
  min-width: 900px; }
  .custom-table thead tr, .custom-table thead th {
    border-top: none;
    border-bottom: none !important; }
  .custom-table tbody th, .custom-table tbody td {
    color: #777;
    font-weight: 400;
    padding-bottom: 20px;
    padding-top: 20px;
    font-weight: 300; }
    .custom-table tbody th small, .custom-table tbody td small {
      color: #b3b3b3;
      font-weight: 300; }
  .custom-table tbody .persons {
    padding: 0;
    margin: 0; }
    .custom-table tbody .persons li {
      padding: 0;
      margin: 0 0 0 -15px;
      list-style: none;
      display: inline-block; }
      .custom-table tbody .persons li a {
        display: inline-block;
        width: 36px; }
        .custom-table tbody .persons li a img {
          border-radius: 50%;
          max-width: 100%; }
  .custom-table tbody tr th, .custom-table tbody tr td {
    position: relative;
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease; }
    .custom-table tbody tr th:before, .custom-table tbody tr th:after, .custom-table tbody tr td:before, .custom-table tbody tr td:after {
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease;
      content: "";
      left: 0;
      right: 0;
      position: absolute;
      height: 1px;
      background: #bfbfbf;
      width: 100%;
      opacity: 0;
      visibility: hidden; }
    .custom-table tbody tr th:before, .custom-table tbody tr td:before {
      top: -1px; }
    .custom-table tbody tr th:after, .custom-table tbody tr td:after {
      bottom: -1px; }
  .custom-table tbody tr:hover th, .custom-table tbody tr:hover td {
    background: rgba(0, 0, 0, 0.03); }
    .custom-table tbody tr:hover th:before, .custom-table tbody tr:hover th:after, .custom-table tbody tr:hover td:before, .custom-table tbody tr:hover td:after {
      opacity: 1;
      visibility: visible; }
  .custom-table tbody tr.active th, .custom-table tbody tr.active td {
    background: rgba(0, 0, 0, 0.03); }
    .custom-table tbody tr.active th:before, .custom-table tbody tr.active th:after, .custom-table tbody tr.active td:before, .custom-table tbody tr.active td:after {
      opacity: 1;
      visibility: visible; }

/* Custom Checkbox */
.control {
  display: block;
  position: relative;
  margin-bottom: 25px;
  font-size: 18px; }

.control input {
  position: absolute;
  z-index: -1;
  opacity: 0; }

.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  border-radius: 4px;
  border: 2px solid #ccc;
  background: transparent; }

.control--radio .control__indicator {
  border-radius: 50%; }

.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  border: 2px solid #007bff; }

.control input:checked ~ .control__indicator {
  border: 2px solid #007bff;
  background: #007bff; }

.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
  border: 2px solid #ccc; }

.control__indicator:after {

  position: absolute;
  display: none; }

.control input:checked ~ .control__indicator:after {
  display: block;
  color: #fff; }

.control--checkbox .control__indicator:after {
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -52%);
  -ms-transform: translate(-50%, -52%);
  transform: translate(-50%, -52%); }

.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b; }

.control--checkbox input:disabled:checked ~ .control__indicator {
  background-color: #007bff;
  opacity: .2;
  border: 2px solid #007bff; }


</style>
