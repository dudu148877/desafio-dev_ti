<?php
use App\Http\Controllers\CnabController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 

Route::get('/', [CnabController::class, 'index']);
Route::post('/upload-cnab', [CnabController::class, 'uploadCnab'])->name('upload.cnab');
Route::get('/transactions', [CnabController::class, 'showTransactions']);
