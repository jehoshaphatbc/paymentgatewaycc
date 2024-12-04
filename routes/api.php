<?php

use App\Http\Controllers\API\TransactionController;
use App\Http\Middleware\NameAuthorization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/deposit', [TransactionController::class, 'deposit'])->middleware(NameAuthorization::class);
Route::post('/withdrawal', [TransactionController::class, 'withdrawal'])->middleware(NameAuthorization::class);
