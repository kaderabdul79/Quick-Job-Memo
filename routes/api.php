<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobMemoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// users
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);
Route::middleware('auth:sanctum')->delete('/logout', [AuthController::class, 'logout']);
// Route::middleware('auth:sanctum')->put('/user/{id}/update', [AuthController::class, 'updateProfile']);
Route::put('/user/{id}/update', [AuthController::class, 'updateProfile']);
Route::get('/jobMemoOverview', [AuthController::class, 'jobMemoOverview']);

// 
Route::resource('job-memos', JobMemoController::class);
