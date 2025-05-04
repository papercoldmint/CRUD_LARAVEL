<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;

// Redirect root URL to /makanans
Route::redirect('/', '/makanans');

// Resource route for makanan
Route::resource('makanans', MakananController::class);