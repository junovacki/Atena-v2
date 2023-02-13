<?php

use Illuminate\Support\Facades\DB;
if($_COOKIE['nivelAcesso'] == 1){
        $cursos = DB::select("SELECT * FROM cursos
                        INNER JOIN categorias ON cursos.idCategoria=categorias.id
                        INNER JOIN modalidades ON cursos.idModalidade=modalidades.id
                        INNER JOIN turnos ON cursos.idTurno=turnos.id
                        where cursos.id = ?", [$id]);
        $modalidades = DB::select("SELECT * FROM modalidades");
        $categorias = DB::select("SELECT * FROM categorias");
        $turnos = DB::select("SELECT * FROM turnos");

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Curso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
    @if ($_COOKIE['nivelAcesso'] == 1)
        <div id="dashADM"></div>

    @endif

	@vite('resources/js/app.js')
    <div id="botaoVoltar">
        <a href="/dashboard-curso">Voltar</a>
    </div>

    <div class="alert alert-success">
        {{ session('alert') }}
    </div>

    @if ($_COOKIE['nivelAcesso'] == 1 )
    <form id="formCadastro">
        <div id="campoLogin">
            Nome do curso: <input type="text" name="nome_curso" id="nome_curso" value="<?= $cursos[0]->nome_curso ?>"/>
        </div>
        <div id="campoTipoUsuario">
            Modalidade do curso: <select id="tipoCurso" name="tipoCurso" style="margin-left: 14px;">
            @foreach($modalidades as $modalidade)
                <option value="<?= $modalidade->id?>" <?php if($cursos[0]->idModalidade == $modalidade->id){echo "selected";} ?>><?= $modalidade->modalidade?></option>
            @endforeach
            </select>
        </div>
        <div id="campoTipoUsuario">
            Categoria do curso: <select id="tipoCategoria" name="tipoCategoria" style="margin-left: 14px;">
            @foreach($categorias as $categoria)
                <option value="<?= $categoria->id?>" <?php if($cursos[0]->idCategoria == $categoria->id){echo "selected";} ?>><?= $categoria->categoria?></option>
            @endforeach
            </select>
        </div>
        <div id="campoTipoUsuario">
            Turno do curso: <select id="tipoTurno" name="tipoTurno" style="margin-left: 14px;">
            @foreach($turnos as $turno)
                <option value="<?= $turno->id?>" <?php if($cursos[0]->idTurno == $turno->id){echo "selected";} ?>><?= $turno->turno?></option>
            @endforeach
            </select>
        </div>
        <input type="hidden" value="<?= $id?>" name="idCurso" id="idCurso"/>
        <input type="button" onclick="enviar()" name="submitUsuario" id="submitUsuario" value="Enviar"/>
    </form>
    @endif

</body>
</html>

<script>
function enviar() {
    let eCategoria = document.getElementById('tipoCategoria');
    let categoria= eCategoria.options[eCategoria.selectedIndex].value;
    let eModalidade = document.getElementById('tipoCurso');
    let modalidade= eModalidade.options[eModalidade.selectedIndex].value;
    let eTurno = document.getElementById('tipoTurno');
    let turno= eTurno.options[eTurno.selectedIndex].value;

        axios.post('http://127.0.0.1:8000/api/atualizarCurso', {
            nome_curso: document.getElementById('nome_curso').value,
            id: document.getElementById('idCurso').value,
            modalidade: modalidade,
            turno: turno,
            categoria: categoria
        })
        .then(function (response) {
            let resposta = response;
            alert(resposta.data);
            window.location.href='/dashboard-curso';

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
