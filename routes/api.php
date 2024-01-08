<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ScannerController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/scanners/{scanner}/mode', [ScannerController::class, 'getScannerMode'])->name('scanners.mode');
Route::post('/addcard', [CardController::class, 'addCard']);
Route::post('/scancard', [CardController::class, 'updateCardBalance']);


Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::get('payment/{billId}', [PaymentController::class, 'index']);
Route::get('payment-confirmation', [PaymentController::class, 'paymentConfirmation'])->name('paymentConfirmation');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {

        Route::apiResource('cards', CardController::class);

    });
