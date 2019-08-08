<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

//Registration Routes
Route::get('/register','RegisterController@create')->name('register_form');
Route::post('/register','RegisterController@store')->name('register');
Route::get('/users','RegisterController@show')->name('list_users');


//Login and Logout Routes

Route::get('/login','LoginController@create')->name('login_form');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@destroy')->name('logout');


//Route to dashboard
Route::get('/dashboard',function(){
    return view('layout.dashboard');
})->name('dashboard')->middleware('auth');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
