<?php

namespace App\Http\Controllers;

use App\Models\grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public static function removerGrade(Request $request){
        $GradeModel = new grade();

        $error = $GradeModel->deletaGrade($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function desativarGrade(Request $request){
        $GradeModel = new grade();

        $error = $GradeModel->desativarGrade($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function ativarGrade(Request $request){
        $GradeModel = new grade();

        $error = $GradeModel->ativarGrade($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function cadastrarGrade(Request $request){
        $GradeModel = new grade();

        $error = $GradeModel->cadastraGrade($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
    public static function atualizarGrade(Request $request){
        $GradeModel = new grade();

        $error = $GradeModel->atualizaGrade($request->all());


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
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(grade $grade)
    {
        //
    }
}
