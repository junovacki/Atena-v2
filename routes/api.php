<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ModalidadeController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\GradeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'loginUsuario');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/registrarUsuario', 'cadastrarUsuario');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/atualizarUsuario', 'atualizarUsuario');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/deletarUsuario', 'removerUsuario');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/desativar-usuario', 'desativarUsuario');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/ativar-usuario', 'ativarUsuario');
});

Route::controller(CursoController::class)->group(function () {
    Route::post('/deletarCurso', 'removerCurso');
});

Route::controller(CursoController::class)->group(function () {
    Route::post('/desativar-curso', 'desativarCurso');
});

Route::controller(CursoController::class)->group(function () {
    Route::post('/ativar-curso', 'ativarCurso');
});

Route::controller(CursoController::class)->group(function () {
    Route::post('/atualizarCurso', 'atualizarCurso');
});

Route::controller(CursoController::class)->group(function () {
    Route::post('/registrarCurso', 'cadastrarCurso');
});

Route::controller(DisciplinaController::class)->group(function () {
    Route::post('/deletarDisciplina', 'removerDisciplina');
});

Route::controller(DisciplinaController::class)->group(function () {
    Route::post('/desativar-disciplina', 'desativarDisciplina');
});

Route::controller(DisciplinaController::class)->group(function () {
    Route::post('/ativar-disciplina', 'ativarDisciplina');
});

Route::controller(DisciplinaController::class)->group(function () {
    Route::post('/atualizarDisciplina', 'atualizarDisciplina');
});

Route::controller(DisciplinaController::class)->group(function () {
    Route::post('/registrarDisciplina', 'cadastrarDisciplina');
});

Route::controller(CategoriaController::class)->group(function () {
    Route::post('/deletarCategoria', 'removerCategoria');
});

Route::controller(CategoriaController::class)->group(function () {
    Route::post('/desativar-categoria', 'desativarCategoria');
});

Route::controller(CategoriaController::class)->group(function () {
    Route::post('/ativar-categoria', 'ativarCategoria');
});

Route::controller(CategoriaController::class)->group(function () {
    Route::post('/atualizarCategoria', 'atualizarCategoria');
});

Route::controller(CategoriaController::class)->group(function () {
    Route::post('/registrarCategoria', 'cadastrarCategoria');
});

Route::controller(TurnoController::class)->group(function () {
    Route::post('/deletarTurno', 'removerTurno');
});

Route::controller(TurnoController::class)->group(function () {
    Route::post('/desativar-turno', 'desativarTurno');
});

Route::controller(TurnoController::class)->group(function () {
    Route::post('/ativar-turno', 'ativarTurno');
});

Route::controller(TurnoController::class)->group(function () {
    Route::post('/atualizarTurno', 'atualizarTurno');
});

Route::controller(TurnoController::class)->group(function () {
    Route::post('/registrarTurno', 'cadastrarTurno');
});

Route::controller(ModalidadeController::class)->group(function () {
    Route::post('/deletarModalidade', 'removerModalidade');
});

Route::controller(ModalidadeController::class)->group(function () {
    Route::post('/desativar-modalidade', 'desativarModalidade');
});

Route::controller(ModalidadeController::class)->group(function () {
    Route::post('/ativar-modalidade', 'ativarModalidade');
});

Route::controller(ModalidadeController::class)->group(function () {
    Route::post('/atualizarModalidade', 'atualizarModalidade');
});

Route::controller(ModalidadeController::class)->group(function () {
    Route::post('/registrarModalidade', 'cadastrarModalidade');
});

Route::controller(AlunoController::class)->group(function () {
    Route::post('/deletarAluno', 'removerAluno');
});

Route::controller(AlunoController::class)->group(function () {
    Route::post('/desativar-aluno', 'desativarAluno');
});

Route::controller(AlunoController::class)->group(function () {
    Route::post('/ativar-aluno', 'ativarAluno');
});

Route::controller(AlunoController::class)->group(function () {
    Route::post('/atualizarAluno', 'atualizarAluno');
});

Route::controller(AlunoController::class)->group(function () {
    Route::post('/registrarAluno', 'cadastrarAluno');
});

Route::controller(PerguntaController::class)->group(function () {
    Route::post('/deletarPergunta', 'removerPergunta');
});

Route::controller(PerguntaController::class)->group(function () {
    Route::post('/atualizarPergunta', 'atualizarPergunta');
});

Route::controller(PerguntaController::class)->group(function () {
    Route::post('/registrarPergunta', 'cadastrarPergunta');
});

Route::controller(GradeController::class)->group(function () {
    Route::post('/deletarGrade', 'removerGrade');
});

Route::controller(GradeController::class)->group(function () {
    Route::post('/desativar-grade', 'desativarGrade');
});

Route::controller(GradeController::class)->group(function () {
    Route::post('/ativar-grade', 'ativarGrade');
});

Route::controller(GradeController::class)->group(function () {
    Route::post('/atualizarGrade', 'atualizarGrade');
});

Route::controller(GradeController::class)->group(function () {
    Route::post('/registrarGrade', 'cadastrarGrade');
});
