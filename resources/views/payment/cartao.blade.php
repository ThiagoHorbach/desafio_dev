@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Obrigado por comprar conosco</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 text-center">Detalhes da Transação</h5>
            </div>
            <div class="card-body text-center">
                <p><strong>Status da Transação:</strong> {{ $paymentData['status'] }}</p>
                <p><strong>Valor da Transação:</strong> {{ $paymentData['installments']}}x de R$ {{ number_format($paymentData['value'], 2, ',', '.') }}</p>

                @if($paymentData['status'] === 'CONFIRMED')
                <p><strong>Comprovante:</strong> 
                    <a href="{{ $paymentData['transactionReceiptUrl'] }}" target="_blank" class="btn btn-success">
                        Ver Comprovante <i class="fas fa-receipt"></i>
                    </a>
                </p>
                @endif
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('pagamento') }}" class="btn btn-primary">Voltar para o Início</a>
        </div>
    </div>

@endsection