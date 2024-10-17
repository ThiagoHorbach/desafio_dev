<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento com Boleto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Obrigado por comprar conosco</h1>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 text-center">Pagamento via Boleto</h5>
            </div>
            <div class="card-body text-center">
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">ATENÇÃO!</h4>
                    <p>
                        O Asaas gera apenas o código de barras do boleto, 
                        não disponibilizando o boleto por completo. 
                        Seguem os dados que o Asaas disponibiliza abaixo.
                    </p>
                    <hr>
                    <p class="mb-0">
                        Futuramente, é recomendável implementar uma outra biblioteca para a geração do boleto.
                    </p>
                </div>

                <p>Identificação: {{ $identificationField }}</p>
                <p>Nosso Número: {{ $nossoNumero }}</p>      
                <p>Código de barras: {{ $barCode }}</p>      

               
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
