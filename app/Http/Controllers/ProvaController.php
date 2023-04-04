<?php

namespace App\Http\Controllers;

use App\Models\prova;
use Illuminate\Http\Request;

class ProvaController extends Controller
{
    public static function removerProva(Request $request){
        $ProvaModel = new prova();

        $error = $ProvaModel->deletaProva($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function desativarProva(Request $request){
        $ProvaModel = new prova();

        $error = $ProvaModel->desativarProva($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function ativarProva(Request $request){
        $ProvaModel = new prova();

        $error = $ProvaModel->ativarProva($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function cadastrarProva(Request $request){
        $ProvaModel = new prova();

        $error = $ProvaModel->cadastraProva($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atualizarProva(Request $request){
        $ProvaModel = new prova();

        $error = $ProvaModel->atualizaProva($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atribuirAcertos(Request $request){
        $ProvaModel = new prova();

        $error = $ProvaModel->atribuirAcertos($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function imprimirProva(Request $request){
        $ProvaModel = new prova();

        $error = $ProvaModel->imprimirProva($request->all());


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
     * @param  \App\Models\prova  $prova
     * @return \Illuminate\Http\Response
     */
    public function show(prova $prova)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prova  $prova
     * @return \Illuminate\Http\Response
     */
    public function edit(prova $prova)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prova  $prova
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prova $prova)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prova  $prova
     * @return \Illuminate\Http\Response
     */
    public function destroy(prova $prova)
    {
        //
    }
}
