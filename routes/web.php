<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [RecordController::class, 'index']);
    Route::post('/atwork', [RecordController::class, 'attend']);
    Route::post('/leave', [RecordController::class, 'leave']);
    Route::get('/mypage', [RecordController::class, 'mypage']);
    Route::post('/mypage', [RecordController::class, 'mypage']);
    Route::post('/mypage/create', [RecordController::class, 'create']);
    Route::post('/mypage/update', [RecordController::class, 'update']);
    Route::post('/mypage/delete', [RecordController::class, 'delete']);
});

require __DIR__.'/auth.php';