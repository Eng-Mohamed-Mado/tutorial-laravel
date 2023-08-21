<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskCOntroller;
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
Route::post('/project/store',[ProjectController::class,'store']);
// Page index Project
Route::get('/project',[ProjectController::class,'index']);
// Page Show Project
Route::get('/project/{project}',[ProjectController::class,'show']);

// Page Patch Project
Route::patch('/project/{project}',[ProjectController::class,'update']);

// Route Store Add Tasks
Route::post('/project/{project}/tasks',[TaskCOntroller::class,'store']);

// Route Patch update tasks
Route::patch('/project/{project}/tasks/{task}',[TaskCOntroller::class,'update']);
