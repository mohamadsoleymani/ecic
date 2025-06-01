<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->name('users.')->middleware(['auth:api', 'role:admin'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('messages')->middleware(['auth:api', 'role:admin'])->group(function () {
    Route::get('/', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::put('/{message}', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::prefix('tickets')->middleware(['auth:api', 'role:admin'])->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('tickets.index');
//    Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::put('/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
});
