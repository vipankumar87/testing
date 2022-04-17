<?php

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
//    Route::get('tasks')
    Route::controller(TaskController::class)->group(function(){
        Route::get('tasks','index')->name('tasks');
    });
});
Route::post('/send-message', function (Request $request){
   event(
       new Message(
           $request->input('username'),
           $request->input('message')
       )
   );
   return ['success'=>true];
});
require __DIR__.'/auth.php';
