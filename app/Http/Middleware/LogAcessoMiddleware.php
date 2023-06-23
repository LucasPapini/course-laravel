<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        // LogAcesso::create(['log' => 'IP xyz requisitou a rota abcd']);
        // return Response('Middleware');
        //dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "$ip requisitou a rota: $rota"]);

        //return $next($request);
        //return Response('Middleware');

        $resposta = $next($request);
        $resposta->setStatusCode(201, 'status da resposta e o texto da respota foram modificados');

        return $resposta;
    }
}
