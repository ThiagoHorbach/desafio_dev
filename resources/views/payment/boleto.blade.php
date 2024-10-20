@extends('layout.app')

@section('content')
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

                <p>Identificação: {{ $identificationField ?? 'N/A' }}</p>
                <p>Nosso Número: {{ $nossoNumero ?? 'N/A' }}</p>      
                <p>Código de barras: {{ $barCode ?? 'N/A' }}</p>      

               
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('pagamento') }}" class="btn btn-primary">Voltar para o Início</a>
        </div>
    </div>

@endsection
