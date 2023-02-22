<?php

namespace App\Http\Controllers;

use App\Models\pergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    public static function removerPergunta(Request $request){
        $PerguntaModel = new pergunta();

        $error = $PerguntaModel->deletaPergunta($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function cadastrarPergunta(Request $request){
        $PerguntaModel = new pergunta();

        $error = $PerguntaModel->cadastraPergunta($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atualizarPergunta(Request $request){
        $PerguntaModel = new pergunta();

        $error = $PerguntaModel->atualizaPergunta($request->all());


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
     * @param  \App\Models\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function show(pergunta $pergunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function edit(pergunta $pergunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pergunta $pergunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(pergunta $pergunta)
    {
        //
    }
}
