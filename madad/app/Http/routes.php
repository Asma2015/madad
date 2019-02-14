<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::auth();
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    
Route::resource('Employee','EmployeesController');

});

Route::get('/home', 'HomeController@index');


