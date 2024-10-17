<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {return view('welcome');});
Route::get('/', [PaymentController::class, 'index'])->name('pagamento');

Route::get('/pagamento', [PaymentController::class, 'index'])->name('pagamento');

Route::get('/pagamento/pix', [PaymentController::class, 'pix']);
Route::get('/pagamento/boleto', [PaymentController::class, 'boleto']);

Route::post('/pagamento/cartao', [PaymentController::class, 'cartao'])->name('pagamento.cartao');


