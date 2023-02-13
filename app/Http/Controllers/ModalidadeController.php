<?php

namespace App\Http\Controllers;

use App\Models\modalidade;
use Illuminate\Http\Request;

class ModalidadeController extends Controller
{
    public static function removerModalidade(Request $request){
        $ModalidadeModel = new modalidade();

        $error = $ModalidadeModel->deletaModalidade($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function desativarModalidade(Request $request){
        $ModalidadeModel = new modalidade();

        $error = $ModalidadeModel->desativarModalidade($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function ativarModalidade(Request $request){
        $ModalidadeModel = new modalidade();

        $error = $ModalidadeModel->ativarModalidade($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function cadastrarModalidade(Request $request){
        $ModalidadeModel = new modalidade();

        $error = $ModalidadeModel->cadastraModalidade($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atualizarModalidade(Request $request){
        $ModalidadeModel = new modalidade();

        $error = $ModalidadeModel->atualizaModalidade($request->all());


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
     * @param  \App\Models\modalidade  $modalidade
     * @return \Illuminate\Http\Response
     */
    public function show(modalidade $modalidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modalidade  $modalidade
     * @return \Illuminate\Http\Response
     */
    public function edit(modalidade $modalidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modalidade  $modalidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modalidade $modalidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modalidade  $modalidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(modalidade $modalidade)
    {
        //
    }
}
