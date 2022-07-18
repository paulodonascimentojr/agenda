<?php

use App\Http\Controllers\{
    UserController,
    ContactController,
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    //Contatos
    Route::delete('users/contact/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('users/{id}/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::get('users/{user}/contacts/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::post('users/{id}/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('users/{id}/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('users/{user}/contacts/show/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('users', [ContactController::class, 'index'])->name('users.index');
    //Usuários
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');   
    Route::get('/', [UserController::class, 'index'])->name('users.index');

});



require __DIR__.'/auth.php';
