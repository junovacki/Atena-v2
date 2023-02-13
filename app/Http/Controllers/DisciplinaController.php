<?php

namespace App\Http\Controllers;

use App\Models\disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public static function removerDisciplina(Request $request){
        $disciplinaModel = new disciplina();

        $error = $disciplinaModel->deletaDisciplina($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function desativarDisciplina(Request $request){
        $disciplinaModel = new disciplina();

        $error = $disciplinaModel->desativarDisciplina($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function ativarDisciplina(Request $request){
        $disciplinaModel = new disciplina();

        $error = $disciplinaModel->ativarDisciplina($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function cadastrarDisciplina(Request $request){
        $disciplinaModel = new disciplina();

        $error = $disciplinaModel->cadastraDisciplina($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atualizarDisciplina(Request $request){
        $disciplinaModel = new disciplina();

        $error = $disciplinaModel->atualizaDisciplina($request->all());


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
     * @param  \App\Models\disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(disciplina $disciplina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(disciplina $disciplina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, disciplina $disciplina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(disciplina $disciplina)
    {
        //
    }
}
