<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BillController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Bill routes
    Route::get('/bills', [BillController::class, 'index']); 
    Route::post('/bills', [BillController::class, 'store']); 
    Route::get('/bills/{bill}', [BillController::class, 'show']); 
    Route::put('/bills/{bill}', [BillController::class, 'update']); 
    Route::delete('/bills/{bill}', [BillController::class, 'destroy']); 

    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
   Route::get('user', function(Request $request){
       return $request->user();
   });
});