<?php


use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

//Route::prefix('client/messages')->name('client')->group(function () {
//    Route::get('/', [MessageController::class, 'index'])->name('messages.index');
//    Route::get('/create', [MessageController::class, 'create'])->name('messages.create');
//    Route::post('/{message}/reply', [SubMessageController::class, 'store'])->name('submessages.store');
//    Route::put('/submessages/{id}', [SubMessageController::class, 'update'])->name('submessages.update');
//    Route::get('/{message}', [MessageController::class, 'show'])->name('messages.show');
//    Route::delete('/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
//});

Route::prefix('tickets')->middleware(['auth:api', 'role:client'])->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
//    Route::put('/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
});
