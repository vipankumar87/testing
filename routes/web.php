<?php

use App\Http\Controllers\ScoreController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth','prefix'=>'admin'], function(){
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::controller(TaskController::class)->group(function(){
        Route::get('tasks','index')->name('tasks');
        Route::get('tasks/create','create')->name('task_create');
        Route::post('/send-message', 'postMessage')->name('send_message');
    });
});
Route::get('score', [ScoreController::class,'view_index']);
require __DIR__.'/auth.php';
