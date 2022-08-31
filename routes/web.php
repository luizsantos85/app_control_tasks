<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;

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

Auth::routes(['verify' => true]); //rotas com validações de email

// Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');
Route::get('/task/export', [TaskController::class, 'exportaExcel'])->name('exportaExcel');
Route::resource('/task', TaskController::class)->middleware('verified');

Route::get('/mail', function(){
    return new MessageMail();
    // Mail::to('luiz.santos85@gmail.com')->send(new MessageMail());
    // return 'Email enviado.';
});