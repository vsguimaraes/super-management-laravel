<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $type_auth, $type_user): Response
    {
        // return Response("Acesso negado! Usuário precisa de autenticação para prosseguir. $type_auth $type_user");
        session_start();
        if (!isset($_SESSION['name']) ||!isset($_SESSION['email'])) {
            return redirect()->route('site.login', ['error' => 2]);
        }

        return $next($request);
    }
}
