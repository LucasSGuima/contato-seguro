<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class EnvironmentCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $dbConnection = config('database.default');
        $dbDatabase = config("database.connections.$dbConnection.database");

        if (empty($dbConnection) || empty($dbDatabase)) {
            return response()->json(['message' => 'Variáveis de ambiente do banco de dados não estão configuradas corretamente'], 500);
        }

        try {
            DB::connection($dbConnection)->getPdo();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao conectar-se ao banco de dados'], 500);
        }

        return $next($request);
    }
}
