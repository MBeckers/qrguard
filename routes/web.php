<?php

use App\Http\Controllers\QrReaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scanner', QrReaderController::class);
