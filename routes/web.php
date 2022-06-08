<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/crud', [App\Http\Controllers\CrudController::class, 'index'])->name('crud');
Route::post('/addnew', [App\Http\Controllers\CrudController::class, 'insert'])->name('insert');
Route::get('/destroy/{id}', [App\Http\Controllers\CrudController::class, 'destroy'])->name('destroy');
Route::get('/student/{id}', [App\Http\Controllers\CrudController::class, 'student'])->name('student');
Route::post('/updatecrud', [App\Http\Controllers\CrudController::class, 'updatecrud'])->name('updatecrud');


Route::get('/onetone',[App\Http\Controllers\onetonecontroller::class, 'index']);


Route::get('/test',function(){
	return 'Hello dhamrnear';
});