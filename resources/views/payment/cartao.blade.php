<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento com Cartão de Crédito</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Obrigado por comprar conosco</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 text-center">Detalhes da Transação</h5>
            </div>
            <div class="card-body text-center">
                <p><strong>Status da Transação:</strong> {{ $paymentData['status'] }}</p>
                <p><strong>Valor da Transação:</strong> {{ $paymentData['installmentNumber']}}x de R$ {{ number_format($paymentData['value'], 2, ',', '.') }}</p>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
