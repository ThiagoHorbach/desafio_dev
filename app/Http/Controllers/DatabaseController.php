<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class DatabaseController extends Controller
{
    public function checkConnection(): JsonResponse
    {
        try {
            // Tenta fazer uma consulta ao banco de dados
            DB::connection()->getPdo();
            return response()->json(['message' => 'Conexão com o banco de dados bem-sucedida!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()], 500);
        }
    }
}
