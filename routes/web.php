<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BraintreeController;


/* ... */

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user/message', function () {
    return view('admin.users.message');
});

// Route::any('/payment', [BraintreeController::class, 'token'])->name('token')->middleware('auth');




Route::middleware(['auth'])
->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
->group(function () {
    
        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);

        Route::get('/user/sponsor', function () {
            return view('admin.users.sponsor');
        })->name('user.sponsor');

        // pagamento
        Route::get('/braintree/show-form', [BraintreeController::class, 'showForm'])->name('show.form');
        Route::post('/braintree/token', [BraintreeController::class, 'getToken'])->name('get.token');
        Route::post('/braintree/process-payment', [BraintreeController::class, 'processPayment'])->name('process.payment');

        
});

require __DIR__.'/auth.php';
