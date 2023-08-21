<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// View Page Home
Route::get('/home',[HomeController::class,'index'])->name('home');

// View Page Create Project
Route::get('/project/create',[ProjectController::class,'create'])->name('create-project');

// Path Save New Project in Store
Route::post('/project/store',[ProjectController::class,'store'])->name('save-project');
// Page index Project
Route::get('/project',[ProjectController::class,'index']);