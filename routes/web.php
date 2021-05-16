<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TechnologyController;

// use View;

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

 // Technologies ROUTES
Route::resource('technologies', TechnologyController::class);
// END of Technologies ROUTES

// THEMES THEMES
Route::resource('themes', ThemeController::class);
// END of THEMES ROUTES


// Folders folder
Route::resource('folders', FolderController::class);
// END of Folders ROUTES




// Route::get('/technologies', [TechnologyController::class, 'index'])
//     ->name('technologies');

// // Route::post('/technologies', [TechnologyController::class, 'create']);

// // Route::post('/create', [TechnologyController::class, 'store']);
// Route::post('technologies', 'TechnologyController@create');


// Route::put('/technologies', [TechnologyController::class, 'update']);

// Route::delete('/technologies', [TechnologyController::class, 'destroy']);




// Route::post('technologies', 'Api\BookController@createBook');
// Route::put('technologies/{id}', 'Api\BookController@updateBook');
// Route::delete('technologies/{id}', 'Api\BookController@deleteBook');





Route::get('/datatable', 'HomeController@datatable')->name('datatable');


Route::get('/', function () {
    if (auth()->user()){
        auth()->user()->assignRoles('admin');
    }
       return view('auth.login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/document', [DocumentController::class, 'index'])->name('document');
Route::post('/document', [DocumentController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/* Route::get('/login', function () {
    return view('auth.login');
}); */