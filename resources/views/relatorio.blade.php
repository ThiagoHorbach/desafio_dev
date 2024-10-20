@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Relatório de Pagamentos</h1>

        <!-- Filtro de Status -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <form method="GET" action="{{ url('/relatorio') }}">
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label text-right">Filtrar por Status:</label>
                        <div class="col-sm-5">
                            <select name="status" id="status" class="form-control">
                                <option value="">Todos</option>
                                <option value="PENDING" {{ $statusSelecionado == 'PENDING' ? 'selected' : '' }}>Pendente</option>
                                <option value="CONFIRMED" {{ $statusSelecionado == 'CONFIRMED' ? 'selected' : '' }}>Confirmado</option>
                                <option value="FAILED" {{ $statusSelecionado == 'FAILED' ? 'selected' : '' }}>Falhou</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Últimos 100 Pagamentos</h5>
            </div>
            <div class="card-body">
                @if($pagamentos->isEmpty())
                    <p class="text-center">Nenhum pagamento encontrado.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Data/Hora da Transação</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Nome</th>
                                    <th>Status</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagamentos as $pagamento)
                                    <tr>
                                        <td>{{ $pagamento->id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pagamento->data_hora_transacao)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ $pagamento->forma_pagamento }}</td>
                                        <td>{{ $pagamento->nome }}</td>
                                        <td>
                                            <span class="badge bg-{{ $pagamento->status == 'PENDING' ? 'warning' : ($pagamento->status == 'CONFIRMED' ? 'success' : 'danger') }}">
                                                {{ $pagamento->status }}
                                            </span>
                                        </td>
                                        <td>R$ {{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('pagamento') }}" class="btn btn-primary">Voltar para o Início</a>
        </div>
    </div>
@endsection
