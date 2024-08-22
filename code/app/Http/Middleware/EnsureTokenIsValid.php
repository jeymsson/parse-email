<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		// verifique se o parametro get 'token' é igual ao token do projeto
		// se não for, retorne um erro nao autorizado
		// se for, continue com a requisição
		if ($request->input('token') !== env('APP_TOKEN')) {
			abort(403);
		}
        return $next($request); 
    }
}
