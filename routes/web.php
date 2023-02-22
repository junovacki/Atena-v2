<?php

use Illuminate\Support\Facades\Route;

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
