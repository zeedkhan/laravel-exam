<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;




Route::get('/', function () {
    return view('welcome');
});

Route::resource('/todo', TodoController::class);
Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
Route::put('/todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todo.incomplete');



Route::get('/user', [UserController::class, 'index']);
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/upload', [UserController::class, 'uploadAvatar']);
