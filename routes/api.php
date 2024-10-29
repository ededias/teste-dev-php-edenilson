<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;


Route::get('/getDocument/{document}', [DocumentController::class, 'find']);

Route::group(['prefix' => 'supplier'], function () {
    Route::get('list', [SupplierController::class, 'all']);
    Route::post('/create', [SupplierController::class, 'create']);
    Route::get('/find/{id}', [SupplierController::class, 'find']);
    Route::delete('/delete/{id}', [SupplierController::class, 'delete']);
    Route::put('/update/{id}', [SupplierController::class, 'update']);
});

