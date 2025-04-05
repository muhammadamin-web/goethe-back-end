<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Contact_a2Controller;
use App\Http\Controllers\Contact_b1Controller;
use App\Http\Controllers\Limit_a2Controller;
use App\Http\Controllers\Limit_b1Controller;
use App\Http\Controllers\LimitController;
use Illuminate\Support\Facades\Auth;

// Limitlarni ko'rsatish
Route::middleware(['auth'])->group(function () {
    Route::get('/limits', [LimitController::class, 'index'])->name('limits.index');

    // Habarlarni ko'rsatish
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    // Limitlarni yangilash
    Route::put('/limits', [LimitController::class, 'update'])->name('limits.update');
    Route::post('/contacts/delete', [ContactController::class, 'deleteLeads'])->name('contacts.delete');

    // Contact_a2larni ko'rsatish
    Route::get('/contacts_a2', [Contact_a2Controller::class, 'index'])->name('contacts_a2.index');
    Route::post('/contacts_a2/delete', [Contact_a2Controller::class, 'deleteLeads'])->name('contacts_a2.delete');
    Route::put('/limits_a2', [Limit_a2Controller::class, 'update'])->name('limits_a2.update');
    Route::get('/limits_a2', [Limit_a2Controller::class, 'index'])->name('limits_a2.index');


    Route::get('/contacts_b1', [Contact_b1Controller::class, 'index'])->name('contacts_b1.index');
    Route::post('/contacts_b1/delete', [Contact_b1Controller::class, 'deleteLeads'])->name('contacts_b1.delete');
    Route::put('/limits_b1', [Limit_b1Controller::class, 'update'])->name('limits_b1.update');
    Route::get('/limits_b1', [Limit_b1Controller::class, 'index'])->name('limits_b1.index');
});
Route::get('/', function () {
    return redirect('/login');
});


Auth::routes();
// Route::match(['get', 'post', 'put', 'patch', 'delete'], '/register', function () {
//     abort(403, 'This route is blocked.');
// });
// Auth route'lari


// Home sahifasi
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
