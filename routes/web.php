<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard-user', function () {
    return view('dashboardUsuario');
});

Route::get('/cadastroUsuario', function () {
    return view('cadastroUsuario');
});

Route::get('/editarUsuario/{id}', function ($id) {
    return view('editarUsuario', ['idUsuario' => $id]);
});

Route::get('/dashboard-curso', function () {
    return view('dashboardCurso');
});

Route::get('/cadastroCurso', function () {
    return view('cadastroCurso');
});

Route::get('/editarCurso/{id}', function ($id) {
    return view('editarCurso', ['id' => $id]);
});

Route::get('/dashboard-disciplina', function () {
    return view('dashboardDisciplina');
});

Route::get('/cadastroDisciplina', function () {
    return view('cadastroDisciplina');
});

Route::get('/editarDisciplina/{id}', function ($id) {
    return view('editarDisciplina', ['id' => $id]);
});

Route::get('/dashboard-categoria', function () {
    return view('dashboardCategoria');
});

Route::get('/cadastroCategoria', function () {
    return view('cadastroCategoria');
});

Route::get('/editarCategoria/{id}', function ($id) {
    return view('editarCategoria', ['id' => $id]);
});

Route::get('/dashboard-turno', function () {
    return view('dashboardTurno');
});

Route::get('/cadastroTurno', function () {
    return view('cadastroTurno');
});

Route::get('/editarTurno/{id}', function ($id) {
    return view('editarTurno', ['id' => $id]);
});

Route::get('/dashboard-modalidade', function () {
    return view('dashboardModalidade');
});

Route::get('/cadastroModalidade', function () {
    return view('cadastroModalidade');
});

Route::get('/editarModalidade/{id}', function ($id) {
    return view('editarModalidade', ['id' => $id]);
});

Route::get('/dashboard-aluno', function () {
    return view('dashboardAluno');
});

Route::get('/cadastroAluno', function () {
    return view('cadastroAluno');
});

Route::get('/editarAluno/{id}', function ($id) {
    return view('editarAluno', ['id' => $id]);
});

Route::get('/dashboard-pergunta', function () {
    return view('dashboardPergunta');
});

Route::get('/cadastroPergunta', function () {
    return view('cadastroPergunta');
});

Route::get('/editarPergunta/{id}', function ($id) {
    return view('editarPergunta', ['id' => $id]);
});

Route::get('/dashboard-grade', function () {
    return view('dashboardGrade');
});

Route::get('/cadastroGrade', function () {
    return view('cadastroGrade');
});

Route::get('/editarGrade/{id}', function ($id) {
    return view('editarGrade', ['id' => $id]);
});

Route::get('/dashboard-turma', function () {
    return view('dashboardTurma');
});

Route::get('/cadastroTurma', function () {
    return view('cadastroTurma');
});

Route::get('/editarTurma/{id}', function ($id) {
    return view('editarTurma', ['id' => $id]);
});

Route::get('/vincularAlunoTurma/{id}', function ($id) {
    return view('vinculaAlunoTurma', ['id' => $id]);
});

Route::get('/dashboard-prova', function () {
    return view('dashboardProva');
});

Route::get('/cadastroProva', function () {
    return view('cadastroProvas');
});

Route::get('/editarProva/{id}', function ($id) {
    return view('editarProva', ['id' => $id]);
});

Route::get('/gerenciarAcertos/{id}', function ($id) {
    return view('gerenciarAcertos', ['id' => $id]);
});
Route::get('/imprimirProva/{id}', function ($id) {
    $perguntas = DB::select("SELECT * FROM prova_perguntas
        LEFT JOIN perguntas ON prova_perguntas.idPergunta=perguntas.id
        LEFT JOIN provas ON prova_perguntas.idProva=provas.id
        LEFT JOIN turma_provas ON turma_provas.idProva=provas.id
        LEFT JOIN turmas ON turma_provas.idTurma=turmas.id
        where prova_perguntas.idProva = ?", [$id]);
    $pdf =  Pdf::loadView('moldeProva', ['perguntas'=>$perguntas])
                //->setPaper('a4', 'landscape')
                ;
                return $pdf->stream();
});
Route::get('/visualizarEstatisticaProva/{id}', function ($id) {
    return view('estatisticaProva', ['id' => $id]);
});
