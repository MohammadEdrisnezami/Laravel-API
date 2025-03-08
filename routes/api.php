<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
Route::get('/user', function (Request $request) {
    return $request->user(); 
})->middleware('auth:sanctum');
// Make sure this route is in routes/api.php
Route::post('/upload-image', [ImageUploadController::class, 'upload']);