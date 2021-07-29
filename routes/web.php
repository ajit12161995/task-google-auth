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

Route::post('UserRegistraton', 'UserController@store')->name('registration.post');
Route::post('LoginSubmit', 'UserController@AcountMatch')->name('LoginSubmit.post');
Route::get('/Welcome','UserController@Welcome');
Route::get('/Login','UserController@index');
Route::post('/Login','UserController@create')->name('Login');
Route::get('/Logout','UserController@Logout')->name('Logout');

Route::get('/New-Registration',function () {
    return view('NewRegistration');
});

Route::get('/', function () {
    if(session()->get('id')){
        return redirect('Welcome');
    }else{
        return view('login');
    }
    
});

// Route::post('/Login', function () {
//     return redirect(URL()->previous());
// })->name('Login')->middleware('2fa');

Route::post('/2fa', function () {
    return redirect(URL()->previous());
})->name('2fa')->middleware('2fa');