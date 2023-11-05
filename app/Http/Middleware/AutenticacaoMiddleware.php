<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metado_autenticacao): Response
    {
        // verifique se o usuario possui acesso a rota
        session_start();

        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            # code...
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro' => 2]);
        }
        
    }
}
