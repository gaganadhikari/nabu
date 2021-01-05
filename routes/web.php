<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard',[AdminController::class,'dashboard']);
        Route::get('settings',[AdminController::class,'settings']);
        Route::get('logout',[AdminController::class,'logout']);
    });

    Route::match(['get','post'],'/',[AdminController::class,'login']);
});
