<?php

use Illuminate\Support\Facades\Route;

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


// Route System Closes if Today :"Mon"
Route::get('/system-close',function()
{
    echo 'Today System-Closes in Monday ! ';
});

// Pass Parameter Id in Url
Route::get('next-day/{user?}',function($user = null)
{
    echo 'Welcome To The Next Day '. $user ;
});

// Use Controller With Route and Pass Functions
Route::get('contact-us',[App\Http\Controller\MainController::class,'index']);

// Add Name Short
Route::get('store-data',[App\Http\Controller\MainController::class,'storedata'])->name('data');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
