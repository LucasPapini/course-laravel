<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) 
    {
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuario/senha não existe';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a página!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) 
    {
        $regras = [
            'usuario' => 'email',
            'senha'   => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        // var_dump(
        //     [
        //         "email" => $email,
        //         "usuario" => $password
        //     ]
        // );
        //var_dump($request->all()).die;
        //return 'chegamos aqui';
        //return view('site.login', ['titulo' => 'Login']);

        //Iniciar model user
        $user = new User();

        $existe = $user->where('email', $email)->where('password', $password)->get()->first();
        
        // echo "<pre>";
        // var_dump($existe);
        // echo "</pre>";

        if(isset($existe)){
            session_start();
            $_SESSION['nome'] = $existe->name;
            $_SESSION['email'] = $existe->email;

            return redirect()->route('app.home');
        }else{
           return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
