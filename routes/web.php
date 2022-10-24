<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [AlbumsController::class, 'allData'])->name('home');

Route::name('user.')->group(function(){
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [RegistrationController::class, 'save']);

    Route::get('/create', function (){
        if(!Auth::check()){
            return redirect(route('user.login'));
        }
        return view('createnewalbum');
    })->name('create_album');

    Route::post('/create', [AlbumsController::class, 'submit']);

    Route::get('/album/{id}/update', [AlbumsController::class, 'oneAlbum'])->name('update_album');

    Route::post('/album/{id}/update', [AlbumsController::class, 'update']);

    Route::get('/album/{id}/update/delete', [AlbumsController::class, 'delete'])->name('delete_album');
});
