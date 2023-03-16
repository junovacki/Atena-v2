<?php

namespace App\Http\Controllers;

use App\Models\turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public static function removerTurma(Request $request){
        $TurmaModel = new turma();

        $error = $TurmaModel->deletaTurma($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function desativarTurma(Request $request){
        $TurmaModel = new turma();

        $error = $TurmaModel->desativarTurma($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function ativarTurma(Request $request){
        $TurmaModel = new turma();

        $error = $TurmaModel->ativarTurma($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function cadastrarTurma(Request $request){
        $TurmaModel = new turma();

        $error = $TurmaModel->cadastraTurma($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atualizarTurma(Request $request){
        $TurmaModel = new turma();

        $error = $TurmaModel->atualizaTurma($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function vincularAlunos(Request $request){
        $TurmaModel = new turma();

        $error = $TurmaModel->vincularAlunos($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit(turma $turma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, turma $turma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(turma $turma)
    {
        //
    }
}
