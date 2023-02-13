<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function loginUsuario(Request $request){

        //dd($request->all());
        $login = $request->all('login');
        $senha = $request->all('senha');
        $loginModel = new User();

        $error = $loginModel->verificaLogin($request->all());


        //dd($error);
        if(isset($error['erro'])){
            return ['retorno'=>0];
        }else{
            return ['retorno'=>1, 'nivelAcesso'=>$error['nivelAcesso']];
        }
    }

    public static function cadastrarUsuario(Request $request){
        $loginModel = new User();

        $error = $loginModel->cadastraLogin($request->all());


        //dd($error);
        if($error != null){
            return $error;
        }else{
            return redirect('/cadastroUsuario');
        }
    }

    public static function atualizarUsuario(Request $request){
        $loginModel = new User();

        $error = $loginModel->editaLogin($request->all());


        return $error;
    }

    public static function removerUsuario(Request $request){
        $loginModel = new User();

        $error = $loginModel->deletaLogin($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function desativarUsuario(Request $request){
        $loginModel = new User();

        $error = $loginModel->desativarLogin($request->all());


        if($error != null){
            return redirect()->back()->with('alert', $error);
        }else{
            return redirect('/dashboard');
        }
    }

    public static function ativarUsuario(Request $request){
        $loginModel = new User();

        $error = $loginModel->ativarLogin($request->all());


        if($error != null){
            return $error;
        }else{
            return redirect('/dashboard');
        }
    }
}
