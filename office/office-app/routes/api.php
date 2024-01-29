<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

Route::get('/employees',[EmployeeController::class, 'index']);
Route::get('/delete',[EmployeeController::class, 'delete']);
Route::post('/create',[EmployeeController::class, 'create']);
Route::post('/update',[EmployeeController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
