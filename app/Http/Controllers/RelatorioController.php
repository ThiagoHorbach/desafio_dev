<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;

class RelatorioController extends Controller
{
    public function mostraRelatorio(Request $request)
    {   

       // Pega o status selecionado na requisição
       $status = $request->input('status');

       // Query para pegar os últimos 100 pagamentos
       $query = Pagamento::orderBy('data_hora_transacao', 'desc');

       // Se houver um status filtrado, adiciona à query
       if ($status) {
           $query->where('status', $status);
       }

       // Limita aos últimos 100 registros
       $pagamentos = $query->take(100)->get();

       return view('relatorio', [
           'pagamentos' => $pagamentos,
           'statusSelecionado' => $status // Envia o status selecionado para a view
       ]);
    }
}
