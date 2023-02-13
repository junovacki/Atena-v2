<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public static function removerAluno(Request $request){
        $AlunoModel = new aluno();

        $error = $AlunoModel->deletaAluno($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function desativarAluno(Request $request){
        $AlunoModel = new aluno();

        $error = $AlunoModel->desativarAluno($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function ativarAluno(Request $request){
        $AlunoModel = new aluno();

        $error = $AlunoModel->ativarAluno($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function cadastrarAluno(Request $request){
        $AlunoModel = new aluno();

        $error = $AlunoModel->cadastraAluno($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atualizarAluno(Request $request){
        $AlunoModel = new aluno();

        $error = $AlunoModel->atualizaAluno($request->all());


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
     * @param  \App\Models\aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(aluno $aluno)
    {
        //
    }
}
