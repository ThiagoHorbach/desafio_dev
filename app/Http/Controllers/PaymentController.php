<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    const ASAAS_TOKEN = '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwOTIyNTM6OiRhYWNoXzIwM2RiZTIyLTgwNDEtNDY4Mi1iYjcyLWM3N2U2MWZhMGFiYg==';
    public function index()
    {
        return view('payment');
    }

    public function pix()
    {

        $paymentData = $this->criaRequisicaoPagamento("PIX");
        $paymentId = $paymentData['id']; 



        try {
            $qrCodeResponse = $this->obterQrCode($paymentId);
        
            if ($qrCodeResponse['success']) {
                return view('payment.pix', [
                    'message' => 'Você escolheu o modo PIX',
                    'qrCode' => $qrCodeResponse['encodedImage'],
                    'payload' => $qrCodeResponse['payload'], 
                    'expirationDate' => $qrCodeResponse['expirationDate'] 
                ]);
            } else {
                return view('payment.pix', [
                    'message' => 'Erro ao obter o QR Code: Falha na requisição',
                    'error' => $qrCodeResponse
                ]);
            }
        } catch (\Exception $e) {
            return view('payment.pix', [
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Obtém o QR Code a partir do ID do pagamento.
     *
     * @param string $paymentId
     * @return array
     */
    private function obterQrCode($paymentId)
    {
        $qrCodeResponse = Http::withHeaders([
            'access_token' => self::ASAAS_TOKEN
        ])->get("https://sandbox.asaas.com/api/v3/payments/{$paymentId}/pixQrCode");

        // Verificar se a requisição foi bem-sucedida
        if ($qrCodeResponse->successful()) {
            return $qrCodeResponse->json();
        } else {
            return [
                'success' => false,
                'message' => $qrCodeResponse->body()
            ];
        }
    }

    public function boleto()
    {

        $paymentData = $this->criaRequisicaoPagamento("BOLETO");
        $paymentId = $paymentData['id']; 


        try {
            $boletoResponse = $this->obterDadosBoleto($paymentId);
    
            if ($boletoResponse['barCode']) {
                return view('payment.boleto', [
                    'message' => 'Você escolheu o modo BOLETO',
                    'identificationField' => $boletoResponse['identificationField'],
                    'nossoNumero' => $boletoResponse['nossoNumero'], 
                    'barCode' => $boletoResponse['barCode'] 
                ]);
            } else {
                return view('payment.boleto', [
                    'message' => 'Erro ao obter o BOLETO: Falha na requisição',
                    'error' => $boletoResponse
                ]);
            }
        } catch (\Exception $e) {
            return view('payment.boleto', [
                'message' => $e->getMessage()
            ]);
        }


    }

    /**
     * Obtém o QR Code a partir do ID do pagamento.
     *
     * @param string $paymentId
     * @return array
     */
    private function obterDadosBoleto($paymentId)
    {
        $dadosBoleto = Http::withHeaders([
            'access_token' => self::ASAAS_TOKEN
        ])->get("https://sandbox.asaas.com/api/v3/payments/{$paymentId}/identificationField");

        // Verificar se a requisição foi bem-sucedida
        if ($dadosBoleto->successful()) {
            return $dadosBoleto->json();
        } else {
            return [
                'success' => false,
                'message' => $dadosBoleto->body()
            ];
        }
    }

    public function cartao(Request $request)
    {

        // Validação dos dados do cartão
        $request->validate([
            'cardNumber' => 'required|string',
            'cardHolder' => 'required|string',
            'expirationDate' => 'required|string',
            'ccv' => 'required|string',
            'installments' => 'required|integer',
        ]);

        $paymentData = $this->criaRequisicaoPagamentoCartao("CREDIT_CARD", $request);
        
        
        if (!isset($paymentData['id'])) {
            return view('payment.cartao', ['error' => 'Falha na transação. ID da transação não retornado.']);
        }

        return view('payment.cartao', ['paymentData' => $paymentData]);
    }



    /**
     * Cria a Requisição de pagamento
     *
     * @param string $meio
     * @return void
     */
    public function criaRequisicaoPagamento($meio)
    {

        $data = [
            "customer" => "6293132",
            "billingType" => $meio,
            "dueDate" => "2024-10-18",
            "value" => 100,
            "description" => "Pedido 056984",
            "daysAfterDueDateToCancellationRegistration" => 1,
            "externalReference" => "056984",
            "discount" => [
                "value" => 0,
                "dueDateLimitDays" => 0
            ],
            "fine" => [
                "value" => 1
            ],
            "interest" => [
                "value" => 2
            ],
            "postalService" => false
        ];
    
        $response = Http::withHeaders([
            'access_token' => self::ASAAS_TOKEN
        ])->post('https://sandbox.asaas.com/api/v3/payments', $data);
    
        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Erro ao criar o pagamento: ' . $response->body());
        }
    }

    /**
     * Cria a Requisição de pagamento
     *
     * @param string $meio
     * @return void
     */
    public function criaRequisicaoPagamentoCartao($meio, $creditCardData = null)
    {

        $valor = 100;

        $data = [
            "customer" => "6293132",
            "billingType" => $meio,
            "dueDate" => "2024-10-18",
            "value" => $valor,
            "description" => "Pedido 056984",
            "daysAfterDueDateToCancellationRegistration" => 1,
            "externalReference" => "056984",
            "discount" => [
                "value" => 0,
                "dueDateLimitDays" => 0
            ],
            "fine" => [
                "value" => 1
            ],
            "interest" => [
                "value" => 2
            ],
            "postalService" => false
        ];
    
        list($expiryMonth, $expiryYear) = explode('/', $creditCardData['expirationDate']); 

        if (strlen($expiryYear) === 2) {
            $expiryYear = '20' . $expiryYear;
        }

        $data['creditCard'] = [
            "holderName" => $creditCardData['cardHolder'],
            "number" => $creditCardData['cardNumber'],
            "expiryMonth" => $expiryMonth,
            "expiryYear" => $expiryYear,
            "ccv" => $creditCardData['ccv'],
        ];

        $data['creditCardHolderInfo'] = [
            "name" => "thiago s horbach",
            "email" => "email@teste.com.br",
            "cpfCnpj" => "24971563792",
            "postalCode" => "89223-005",
            "addressNumber" => "277",
            "addressComplement" =>  null,
            "phone" => "4738010919",
            "mobilePhone" => "4738010919",
        ];
    

        if (isset($creditCardData['installments'])) {
            $data['installmentCount'] = $creditCardData['installments'];
            $data['installmentValue'] = $valor/$creditCardData['installments'];
        }


        $response = Http::withHeaders([
            'access_token' => self::ASAAS_TOKEN
        ])->post('https://sandbox.asaas.com/api/v3/payments', $data);
    
        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Erro ao criar o pagamento: ' . $response->body());
        }
    }




}