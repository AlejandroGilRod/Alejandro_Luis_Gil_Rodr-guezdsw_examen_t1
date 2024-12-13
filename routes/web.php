<?php

use Illuminate\Support\Facades\Route;
use App\Models\Message;
use App\Http\Controllers\MessageController;
Route::get('/', function () {
    $messages = \App\Models\Message::all();
    return view('messages', ['messages' => $messages]);
});

Route::get('/messages', function () {
    $messages = \App\Models\Message::all();
    return view('messages', ['messages' => $messages]);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/navigation-menu', [MessageController::class, 'index2'])->name('menu-lateral');

Route::get('/messages', [MessageController::class, 'index'])->name('messages');

Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

Route::get('/messages/modificar/{id}', [MessageController::class, 'edit'])->name('messages.edit');

Route::put('/messages/{id}', [MessageController::class, 'update'])->name('messages.update');

// Eliminar dudas
Route::get('/eliminar-mensajes', [MessageController::class, 'mostrarEliminar']) -> name('eliminar.mensajes');

Route::post('/eliminar-mensajes', [MessageController::class, 'eliminarMensajes']) -> name('prosesar.eliminar.mensajes');