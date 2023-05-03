<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
// Route::get('/email/verify',VerificationController::class)->name('verification.notice');

// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

 
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('email/verify', '\App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', '\App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', '\App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');

// add verified  to middleware to enable the verified email to work

Route::middleware(['auth','termsAccepted'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::name('dashboard.')->group(function () {
        Route::resource('users', UserController::class)->middleware('role:admin');
        Route::resource('clients', ClientController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('tasks', TaskController::class);

        
        Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
            Route::post('{model}/{id}/upload', [MediaController::class, 'store'])->name('upload');
            Route::get('{mediaItem}/download', [MediaController::class, 'download'])->name('download');
            Route::delete('{model}/{id}/{mediaItem}/delete', [MediaController::class,'destroy'])->name('delete');
           
        });


        Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
            Route::get('/', [NotificationsController::class, 'index'])->name('index');
            Route::put('/{notification}', [NotificationsController::class, 'update'])->name('update');
            Route::delete('/destroy', [NotificationsController::class, 'destroy'])->name('destroy');
        });


        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    });
    Route::get('token', function () {
        return auth()->user()->createToken('crm')->plainTextToken;
    });
    // i will ask questions on this
   
    
    
});
Route::get('terms', [TermsController::class, 'index'])->middleware('auth')->name('terms.index');
Route::post('terms', [TermsController::class, 'store'])->middleware('auth')->name('terms.store');



