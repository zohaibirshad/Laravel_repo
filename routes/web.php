<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
//User edit routes
Route::group(['middleware' =>'activitylog'], function () {

    Route::group(['middleware' => 'check-permission:permission-actions'], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::post('/update/permission/{name}','PermissionController@update');
            Route::get('/view/permission/{name}','PermissionController@show');
            Route::get('/delete/permission/{name}','PermissionController@destroy');
            Route::get('/edit/permission/{name}','PermissionController@edit');
            Route::post('/permission/add','PermissionController@store');
            Route::get('/permission/list','PermissionController@index');
            Route::get('/permission/form','PermissionController@create');
        });
    });
    Route::group(['middleware'=>'check-permission:user-actions'],function(){
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/user/create/form','UserController@create');
            Route::get('/edit/user/{id}/','UserController@edit');
            Route::get('/delete/user/{id}/','UserController@destroy');
            Route::post('/update/user/{id}','UserController@update');
            Route::post('/create/user','UserController@store');
            Route::get('/view/user/{id}','UserController@show');
            Route::get('/users/list','UserController@index');
            Route::get('/profile','UserController@show');
        });
        Route::get('/settings',function(){
            return view('user.settings');
        });
    });
});
Route::get('activitylog','ActivitylogController@index');

Route::group(['middleware' => ['auth']], function () {
Route::get('/',function(){
   return redirect('dashboard');
});
    Route::get('/dashboard',function(){
        return redirect('/welcome');
    })->name('dashboard');

    Route::get('/welcome','HomeController@index');


});



//Login and Logout Routes
Route::get('/login','LoginController@create')->name('login_form');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@destroy')->name('logout');
//Route to dashboard
// dd('in route');


Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
