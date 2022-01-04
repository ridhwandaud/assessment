<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/workspace', [WorkspaceController::class, 'index'])->name('workspace');

Route::post('/workspace', [WorkspaceController::class, 'store']);

Route::get('/workspace/{id}', [WorkspaceController::class, 'show']);

Route::get('/task/{id}', [TaskController::class, 'index'])->name('task');

Route::post('/task', [TaskController::class, 'store']);

Route::post('/task/update/{id}', [TaskController::class, 'update']);