<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;

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



Auth::routes();

Route::permanentRedirect('/', 'login');

Route::middleware(['auth','termsAccepted'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::name('dashboard.')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('tasks', TaskController::class);
    });
   
    
});
Route::get('terms', [TermsController::class, 'index'])->middleware('auth')->name('terms.index');
Route::post('terms', [TermsController::class, 'store'])->middleware('auth')->name('terms.store');

