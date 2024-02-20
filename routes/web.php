<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
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

// Route::get('/', function () {
//     return view('welcome', [
//         'title' => 'web laravel', 
//         'subtitle' => 'homepage dengan laravel',
//         'description' => 20.342
//     ]);
// });

// Route::get('/hello', function () {
//     $nama = "ian";
//     return view('hello', $nama);
// });


Route::controller(OuterController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/article/{id}', 'article_detail')->name('article_detail');
});

Route::controller(UsersController::class)->group(function(){

    Route::get('/login', 'login_form')->name('login_form');
    Route::post('/login', 'login_action')->name('login_action');

    Route::post('/article/delete', 'article_delete_action')->name('article_delete_action');
    Route::post('/article/add', 'article_add_action')->name('article_add_action');
    Route::get('/article/edit/{id}', 'article_edit_action')->name('article_edit_action');
    Route::put('/article/update/{id}', 'article_update_action')->name('article_update_action');

    Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
    Route::post('/logout', 'dashboard_logout')->name('dashboard_logout');
});