<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BankController;
use App\Http\Controllers\TransferController;

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

Route::get('/', function () {
    return redirect('/banks');
});

Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
Route::post('/banks', [BankController::class, 'store'])->name('banks.store');
Route::get('/banks/{id}/transfers', [BankController::class, 'showTransfers'])->name('banks.transfers');
Route::delete('/banks/{id}', [BankController::class, 'destroy'])->name('banks.destroy');

Route::get('/transfers', [TransferController::class, 'index'])->name('transfers.index');
Route::get('/transfers/create', [TransferController::class, 'create'])->name('transfers.create');
Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');