<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(Request $request){

        $erro = '';

        if ($request->get('erro') == 1) {
            # code...
            $erro = 'Usuario ou senha não existe';
        }
        if ($request->get('erro') == 2) {
            # code...
            $erro = 'Necessario realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){

        //validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //feedback
        $feedback = [
            'usuario.email' => 'O campo usuario (email) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        // echo "Usuario : $email | Senha: $password";
        // echo "<br>";

        $user = new User();

        $usuario = $user->where('email', $email)
                    ->where('password', $password)
                    ->get()
                    ->first();

        if (isset($usuario->name)) {
            # code...
            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        }
        else {
            return redirect()->route("site.login", ['erro' => 1]);
        }

    }

    public function sair(){
        session_destroy();

        return redirect()->route('site.index');
    }
}
