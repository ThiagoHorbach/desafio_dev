@extends('layout.app')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <!-- Card do Produto -->
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <img src="https://img.freepik.com/free-vector/background-realistic-abstract-technology-particle_23-2148431735.jpg?t=st=1729285761~exp=1729289361~hmac=dfba37fae4a67116264b9e26aaa176a19d12f8c44e538870e261cb2565eec5e6&w=1380" class="card-img-top" alt="Imagem do Produto">
                <div class="card-body">
                    <h4 class="card-title text-center font-weight-bold">Produto ou serviço Teste</h4>
                    <p class="card-text text-muted text-center">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut luctus eros. 
                        Ut eros mauris, pharetra non vulputate tristique, tincidunt sed mi. 
                        Ut ultrices dapibus nulla vel maximus. Aenean dignissim et lorem a egestas.
                    </p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Preço:</span>
                        <span class="h4 font-weight-bold text-success">R$ 100,00</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meio de pagamento -->
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title text-center font-weight-bold">Escolha o meio de pagamento</h4>
                    <div class="list-group mt-4">
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
                        <!-- Área de detalhes do cartão -->
                        <div id="cartao-details" class="mt-3 d-none border rounded p-3" style="background-color: #f8f9fa;">
                            <h5 class="text-center text-dark">Dados do Cartão</h5>
                            <form method="POST" action="{{ route('pagamento.cartao') }}">
                                @csrf
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
                                        <!-- Opções preenchidas via JavaScript -->
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark btn-lg w-100">Pagar com Cartão</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalAmount = 100; // Valor total
        const installmentsSelect = document.getElementById('installments');

        function updateInstallmentsOptions() {
            installmentsSelect.innerHTML = '<option value="" disabled selected>Escolha...</option>'; 
            for (let i = 1; i <= 5; i++) { 
                const installmentValue = (totalAmount / i).toFixed(2);
                let selected = i === 1 ? "selected" : "";
                installmentsSelect.innerHTML += `<option value="${i}" ${selected}>${i}x de R$ ${installmentValue.replace('.', ',')}</option>`;
            }
        }

        updateInstallmentsOptions();

        $('#cartao-option').on('click', function() {
            $('#cartao-details').toggleClass('d-none'); 
        });
    });
</script>
@endsection
