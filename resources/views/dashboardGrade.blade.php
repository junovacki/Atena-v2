<?php
use Illuminate\Support\Facades\DB;
    if($_COOKIE['nivelAcesso'] == 1){
        $grades = DB::select("SELECT * FROM grades");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grades</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body id="body">
    @if ($_COOKIE['nivelAcesso'] == 1)
        <div id="dashADM"></div>
        <div id="botaoCadUsuario">
            <a href="/cadastroGrade">Cadastro de grades</a>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex" style="background-color: rgb(177, 174, 174)">
                    <div class="col-lx-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grades Cadastradas</h4>
                                <p class="card-description"> Todas as grades cadastradas </p>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Estado</th>
                                                <th>AÇÃO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($grades as $grade)
                                            <tr>
                                                <td><?= $grade->descricao?></td>
                                                <td>
                                                @if ($grade->ativo == '1')
                                                    <a  onclick="desativarGrade('<?= $grade->id?>')"  >
                                                        <i class="fa fa-toggle-on" aria-hidden="true" style="font-size: 30px"></i>
                                                    </a>
                                                @else
                                                    <a   onclick="ativarGrade('<?= $grade->id?>')" >
                                                        <i class="fa fa-toggle-off" aria-hidden="true" class="button" style="font-size: 30px"></i>
                                                    </a>
                                                @endif
                                                </td>
                                                <td>
                                                    <a href="editarGrade/<?= $grade->id ?>" id="view" class="button" >
                                                        <i class="fa fa-eye fa-align-center" aria-hidden="true" style="font-size: 20px"></i>
                                                    </a>
                                                    <a  class="button" id="view"  onclick="deletarGrade('<?= $grade->id?>')">
                                                        <i class="fa fa-solid fa-ban " style="font-size: 20px"></i>
                                                    </a>
                                                </td>
                                            </tr>



                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    @endif

	@vite('resources/js/app.js')
    <script>
        function deletarGrade(id) {
        let text = "Deseja realmente deletar a Grade?";
        if (confirm(text) == true) {
            axios.post('http://127.0.0.1:8000/api/deletarGrade', {
            id: id
            })
            .then(function (response) {
                alert('Grade deletada com sucesso!!');
                window.location.href='/dashboard-grade';
            })
            .catch(function (error) {
                console.log('Erro na requisicao');
            });
        }
        }
        function desativarGrade(id) {
        let text = "Deseja realmente desativar a Grade?";
        if (confirm(text) == true) {
            axios.post('http://127.0.0.1:8000/api/desativar-grade', {
            id: id
            })
            .then(function (response) {
                alert('Grade desativada com sucesso!!');
                window.location.href='/dashboard-grade';
            })
            .catch(function (error) {
                console.log('Erro na requisicao');
            });
        }
        }
        function ativarGrade(id) {
        let text = "Deseja realmente ativar a Grade?";
        if (confirm(text) == true) {
            axios.post('http://127.0.0.1:8000/api/ativar-grade', {
            id: id
            })
            .then(function (response) {
                alert('Grade ativada com sucesso!!');
                window.location.href='/dashboard-grade';
            })
            .catch(function (error) {
                console.log('Erro na requisicao');
            });
        }
        }
    </script>
</body>
</html>

<style>

@import url(//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css);
@import url(//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css);
#body{
}
#botaoCadUsuario {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    position: absolute;
    top: 8px;
    right: 16px;
}
#botaoSair {
    background-color: #cc1c1c; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    position: center;
    margin-right: 10px;
}
.flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 2rem
 }

 .card {
     box-shadow: none;
     -webkit-box-shadow: none;
     -moz-box-shadow: none;
     -ms-box-shadow: none
 }

 .pl-3,
 .px-3 {
     padding-left: 1rem !important
 }

 .card {
     position: relative;
     display: flex;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: rgb(177, 174, 174);
     background-clip: border-box;
     border: 1px solid rgb(177, 174, 174);
     border-radius: 0
 }

 .card .card-title {
     color: #000000;
     margin-bottom: 0.625rem;
     text-transform: capitalize;
     font-size: 0.875rem;
     font-weight: 500
 }

 .card .card-description {
     margin-bottom: .875rem;
     font-weight: 400;
     color: #76838f
 }

 p {
     font-size: 0.875rem;
     margin-bottom: .5rem;
     line-height: 1.5rem
 }

 .table-responsive {
     display: block;
     width: 100%;
     overflow-x: auto;
     -webkit-overflow-scrolling: touch;
     -ms-overflow-style: -ms-autohiding-scrollbar
 }

 .table,
 .jsgrid .jsgrid-table {
     width: 100%;
     max-width: 100%;
     margin-bottom: 1rem;
     background-color: transparent
 }

 .table thead th,
 .jsgrid .jsgrid-table thead th {
     border-top: 0;
     border-bottom-width: 1px;
     font-weight: 500;
     font-size: .875rem;
     text-transform: uppercase
 }

 .table td,
 .jsgrid .jsgrid-table td {
     font-size: 0.875rem;
     padding: .875rem 0.9375rem
 }

 .badge {
     border-radius: 0;
     font-size: 12px;
     line-height: 1;
     padding: .375rem .5625rem;
     font-weight: normal
 }
 .button {
    background-color: #8E24AA;
    border-radius: 5px;
    text-align: center;
    color: rgb(177, 174, 174);
    padding: 5px;
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 20px;
    display: inline-flex;
    width: 40px;
    height: 30px;
    font-size: 13px;
    box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(0, 0, 0, .4)
}

.mt-200 {
    margin-top: 200px
}

.button:active {
    border: 1px solid #8E24AA;
    background-color: #a597a8;
    box-shadow: inset 2px 2px 2px rgba(0, 0, 0, .8), inset -1px -1px 1px rgba(255, 255, 255, .4);
    -webkit-transition: all .1s ease;
    -moz-transition: all .1s ease;
    -o-transition: all .1s ease;
    transition: all .1s ease
}

.button:hover {
    background-color: #8E24AA;
    color: rgb(180, 180, 180)
}
table {
    table-layout:fixed;
}

table td {
    overflow:hidden;
}
.content_td p{
    max-width: 100%;
    max-height: 50px;
    overflow-y: scroll;
    text-overflow: ellipsis;
}
</style>
