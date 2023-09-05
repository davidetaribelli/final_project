<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;
use App\Models\Message;

/* ... */

Route::get('/', function () {
    return view('welcome');
});






Route::middleware(['auth'])
->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
->group(function () {
    
        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);

        Route::get('/user/message', function () {
         return view('admin.users.message');
        })->name('user.message');

        Route::resource('singleMessage', MessageController::class);


        Route::get('/user/review', function () {
            return view('admin.users.review_vote');
           })->name('user.review');
        
});

require __DIR__.'/auth.php';
