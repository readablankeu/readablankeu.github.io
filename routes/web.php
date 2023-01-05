<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::resource('/menu','App\Http\Controllers\MenuController')->middleware('auth');
Route::resource('/kupon','App\Http\Controllers\KuponController')->middleware('auth');

Route::get('/usercrud', function(){
    return view('usercrud');
})->middleware('auth');

Route::resource('/utama', 'App\Http\Controllers\UtamaController');
Route::resource('/coupon', 'App\Http\Controllers\CouponController');
Route::get('/tentang', function(){
    return view ('tentang');
});
// Route::get('/utama', function(){
//     return view('utama');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/admin_dashboard', 'Admin\DashboardController@index');
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');
// Route::get('/buyer_dashboard', 'Buyer\DashboardController@index');
Route::get('/buyer_dashboard', [App\Http\Controllers\Buyer\DashboardController::class, 'index'])->middleware('role:buyer');