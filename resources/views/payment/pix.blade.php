@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Obrigado por comprar conosco</h1>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 text-center">QR Code do PIX</h5>
            </div>
            <div class="card-body text-center">
                <p>Use o aplicativo do seu banco para escanear o código QR e efetuar o pagamento ou copie o código abaixo.</p>
                
                <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code PIX" class="img-fluid mb-3" style="max-width: 250px;">
                <p>
                    <strong>Pix Copia e Cola</strong><br /> 
                    <button class="btn btn-secondary mt-3" onclick="copyToClipboard()"> <i class="fas fa-copy"></i> Copiar</button>
                    <br>                
                    <span id="payload">{{ $payload }}</span>      
                </p>
                <p>&nbsp;</p>

                
                <p><strong>Validade:</strong> {{ $expirationDate }}</p>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('pagamento') }}" class="btn btn-primary">Voltar para o Início</a>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const payload = document.getElementById('payload').innerText;
            navigator.clipboard.writeText(payload)
                .then(() => {
                    alert('Código digitável copiado para a área de transferência!');
                })
                .catch(err => {
                    console.error('Erro ao copiar o texto: ', err);
                });
        }
    </script>

@endsection
