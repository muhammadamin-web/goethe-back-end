<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LimitController;
use App\Http\Controllers\Contact_a2Controller;
use App\Http\Controllers\Contact_b1Controller;
use App\Http\Controllers\ContactController;


Route::prefix('admin')->middleware(['check.request.origin'])->group(function () {
    // Remove the middleware temporarily
    // ->middleware(['auth:sanctum', 'admin'])
    
    // Dashboard
    // Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/submissions', [ContactController::class, 'submitForm']);
    // Contacts
    Route::get('/contacts/count', [ContactController::class, 'countContacts']);
    Route::get('/limits', [AdminController::class, 'getLimits']);
    
    
    

  
  
    // Route::get('/contacts', [AdminController::class, 'index']);
    // Route::post('/contacts', [AdminController::class, 'store']);
    // Route::get('/contacts/{id}', [AdminController::class, 'show']);
    // Route::put('/contacts/{id}', [AdminController::class, 'update']);
    // Route::delete('/contacts/{id}', [AdminController::class, 'destroy']);

    // Limits
    // Route::put('/limits', [AdminController::class, 'updateLimits']);

    Route::post('/submissions_a2', [Contact_a2Controller::class, 'submitForm']);
    // Contacts
    Route::get('/contacts/count_a2', [Contact_a2Controller::class, 'countContacts']);
    Route::get('/limits_a2', [AdminController::class, 'getLimits_a2']);



    Route::post('/submissions_b1', [Contact_b1Controller::class, 'submitForm']);
    Route::get('/contacts/count_b1', [Contact_b1Controller::class, 'countContacts']);

    Route::get('/limits_b1', [AdminController::class, 'getLimits_b1']);

});