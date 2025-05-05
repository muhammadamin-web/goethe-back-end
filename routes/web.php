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
    Route::get('/limits/create', [LimitController::class, 'create'])->name('limits.create');
    Route::post('/limits', [LimitController::class, 'store'])->name('limits.store');
    Route::get('/limits/{id}/edit', [LimitController::class, 'edit'])->name('limits.edit');
    Route::put('/limits/{id}', [LimitController::class, 'updateTest'])->name('limits.update.test');
    Route::delete('/limits/{id}', [LimitController::class, 'destroy'])->name('limits.destroy');
    Route::put('/limits', [LimitController::class, 'update'])->name('limits.update');

    // Habarlarni ko'rsatish
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    // Limitlarni yangilash
    Route::post('/contacts/delete', [ContactController::class, 'deleteLeads'])->name('contacts.delete');

    // Contact_a2larni ko'rsatish
    Route::get('/contacts_a2', [Contact_a2Controller::class, 'index'])->name('contacts_a2.index');
    Route::post('/contacts_a2/delete', [Contact_a2Controller::class, 'deleteLeads'])->name('contacts_a2.delete');
    Route::get('/limits_a2', [Limit_a2Controller::class, 'index'])->name('limits_a2.index');
    Route::get('/limits_a2/create', [Limit_a2Controller::class, 'create'])->name('limits_a2.create');
    Route::post('/limits_a2', [Limit_a2Controller::class, 'store'])->name('limits_a2.store');
    Route::get('/limits_a2/{id}/edit', [Limit_a2Controller::class, 'edit'])->name('limits_a2.edit');
    Route::put('/limits_a2/{id}', [Limit_a2Controller::class, 'updateTest'])->name('limits_a2.update.test');
    Route::delete('/limits_a2/{id}', [Limit_a2Controller::class, 'destroy'])->name('limits_a2.destroy');
    Route::put('/limits_a2', [Limit_a2Controller::class, 'update'])->name('limits_a2.update');

    Route::get('/contacts_b1', [Contact_b1Controller::class, 'index'])->name('contacts_b1.index');
    Route::post('/contacts_b1/delete', [Contact_b1Controller::class, 'deleteLeads'])->name('contacts_b1.delete');
    Route::get('/limits_b1', [Limit_b1Controller::class, 'index'])->name('limits_b1.index');
    Route::post('/admin/limits_b1', [Limit_b1Controller::class, 'store'])->name('limits_b1.store');
    Route::get('/admin/limits_b1/create', [Limit_b1Controller::class, 'create'])->name('limits_b1.create');
    Route::get('/admin/limits_b1/{id}/edit', [Limit_b1Controller::class, 'edit'])->name('limits_b1.edit');
    Route::put('/admin/limits_b1/{id}', [Limit_b1Controller::class, 'update'])->name('limits_b1.update');
    Route::delete('/admin/limits_b1/{id}', [Limit_b1Controller::class, 'destroy'])->name('limits_b1.destroy');
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
