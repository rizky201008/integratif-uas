<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CustomersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Selamat Datang di API',
        'data' => [
            'nama' => 'Muhammad Rizky Ramadhan',
            'nim' => '1941720013',
            'kelas' => 'TI-2D'
        ]
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/jawaban-a', [CustomersController::class, 'jawabanA']);
    Route::get('/jawaban-b/{id}', [CustomersController::class, 'jawabanB']);
    Route::post('/jawaban-c', [CustomersController::class, 'jawabanC']);
    Route::put('/jawaban-d/{id}', [CustomersController::class, 'jawabanD']);
    Route::delete('/jawaban-e/{id}', [CustomersController::class, 'jawabanE']);
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AccessController::class, 'register']);
    Route::post('/login', [AccessController::class, 'login']);
    Route::post('/logout', [AccessController::class, 'logout'])->middleware('auth:sanctum');
});
