<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

//Obtener las 7 rutas del controlador de contactos
Route::resource('contacts', ContactController::class);

// Ruta para marcar un contacto como favoritos
Route::patch('/contacts/{contact}/favorite', [ContactController::class, 'toggleFavorite'])->name('contacts.favorite');