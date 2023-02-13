<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function verificaLogin($params){

        $login = $params['login'];
        $senha = $params['senha'];

        $select = DB::table('users')
                    ->select('user', 'nivelAcesso')
                    ->whereRaw('user = ? AND password = ? ', [$login,$senha])->first();

        if($select == null){
            return $error=['erro'=>'Login/Senha incorreto(s)!!'];
        }else{
            return $error=['nivelAcesso'=>$select->nivelAcesso];
        }
    }
    public function cadastraLogin($params){

        $login = $params['login'];
        $senha = $params['senha'];
        $tipoUsuario = $params['tipoUsuario'];
        $select = DB::table('users')
                    ->select('user')
                    ->whereRaw('user = ? ', [$login])->first();

        if($select != null){
            return $error[]='Login já existe no sistema!!';
        }else{
            $insert = DB::table('users')
                        ->insert(['user' => $login,'password' => $senha,'nivelAcesso' => $tipoUsuario, 'ativo' => true]);

            if($insert){

                return $error[]='Usuário cadastrado com sucesso!!';
            }
        }
    }
    public function editaLogin($params){

        $login = $params['login'];
        $senha = $params['senha'];
        $tipoUsuario = $params['tipoUsuario'];

        $insert = DB::table('users')
                    ->where('id', $params['id'])
                    ->update(['user' => $login,'password' => $senha,'nivelAcesso' => $tipoUsuario])
                    ;


            return $error[]='Usuário atualizado com sucesso!!';

    }
    public function desativarLogin($params){

        $insert = DB::table('users')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Usuário desativado com sucesso!!';
        }
    }
    public function ativarLogin($params){

        $insert = DB::table('users')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Usuário ativado com sucesso!!';
        }
    }
    public function deletaLogin($id){

        $insert = DB::table('users')

                    ->delete($id)
                    ;

    }
}
