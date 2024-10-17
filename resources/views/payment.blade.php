@extends('layout.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 400px;">
        <h3 class="text-center mb-4">Escolha o meio de pagamento</h3>
        <div class="list-group">
            <a href="{{ url('/pagamento/pix') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>Pix</span>
                <i class="fas fa-qrcode"></i>
            </a>
            <a href="{{ url('/pagamento/boleto') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>Boleto</span>
                <i class="fas fa-barcode"></i>
            </a>
            <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="cartao-option">
                <span>Cartão de Crédito</span>
                <i class="fas fa-credit-card"></i>
            </a>
            <!-- Área para preencher os dados do cartão de crédito com estilo -->
            <div id="cartao-details" class="mt-2 d-none border rounded p-3" style="background-color: #8b8c8d; border: 1px solid #ccc;">
                <h5 class="text-light">Dados do Cartão</h5>
                <form method="POST" action="{{ route('pagamento.cartao') }}">
                    @csrf <!-- Para proteger contra CSRF -->
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Número do Cartão</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="0000 0000 0000 0000" value='4111111111111111' required>
                    </div>
                    <div class="mb-3">
                        <label for="cardHolder" class="form-label">Nome no Cartão</label>
                        <input type="text" class="form-control" id="cardHolder" name="cardHolder" value="Teste Asaas" required>
                    </div>
                    <div class="mb-3">
                        <label for="expirationDate" class="form-label">Data de Validade</label>
                        <input type="text" class="form-control" id="expirationDate" name="expirationDate" placeholder="MM/AA" value="12/25" required>
                    </div>
                    <div class="mb-3">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="ccv" name="ccv" value="123" required>
                    </div>
                    <div class="mb-3">
                        <label for="installments" class="form-label">Quantidade de Parcelas</label>
                        <select class="form-select" id="installments" name="installments" required>
                            <!-- As opções serão preenchidas pelo JavaScript -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg w-100">Pagar com Cartão</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalAmount = 100; // Valor total
        const installmentsSelect = document.getElementById('installments');

        // Função para atualizar as opções de parcelas
        function updateInstallmentsOptions() {
            installmentsSelect.innerHTML = ''; // Limpa as opções anteriores
            installmentsSelect.innerHTML += '<option value="" disabled selected>Escolha...</option>'; // Opção padrão

            for (let i = 1; i <= 5; i++) { // Para 1 a 5 parcelas
                const installmentValue = (totalAmount / i).toFixed(2);
                let selected = "";
                if(i == 1){
                    selected = "selected";
                }

                installmentsSelect.innerHTML += `<option value="${i}" ${selected} >${i}x de R$ ${installmentValue.replace('.', ',')}</option>`;
            }
        }

        updateInstallmentsOptions(); // Chama a função para preencher as opções
    });

    $(document).ready(function() {
        $('#cartao-option').on('click', function() {
            $('#cartao-details').toggleClass('d-none'); // Mostrar/ocultar a seção de detalhes do cartão
        });
    });
</script>
@endsection
