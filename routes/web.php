<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

//user controller
Route::resource('users', UserController::class);

//task controller
Route::resource('tasks', TaskController::class);

//route for user to view their tasks 
Route::get('/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.my');
