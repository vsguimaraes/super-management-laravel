<?php

namespace App\Http\Middleware;

use App\Models\AccessLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        AccessLog::create(['log' => "IP $ip interceptando rota $route"]);
        // return $next($request);
        //return Response('Middleware interceptando!');
        $response = $next($request);
        // modificando o next - manipulação de respostas
        $response->setStatusCode(201, 'Alterando retorno do middleware!');
        return $response;
    }
}
