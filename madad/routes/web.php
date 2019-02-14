<?php
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
Route::get('sesion', function () {
    return session()->all();
});
    // Switch between the included languages
    Route::get('lang/{lang}', 'LanguageController@swap')->name('lang.swap');
    Route::get('logout', function () {
        app(\App\Http\Controllers\Auth\LoginController::class)->logout(request());
    });
        Route::get('/', function () {
            return view('welcome');
        });
            Auth::routes();
            //////hide it for enable register
            Route::get('register', function () {
                return redirect('/');
            })->name('register');
            
            Route::get('/home', 'HomeController@index')->name('home');
            
            Route::get('/employees', function () {
                return view('employees');
            });
            
                Route::get('/companies', function () {
                    return view('companies');
                });
                    
                  
                
            Route::group(['middleware' => 'auth'], function () {
                Route::resource('employees', 'EmployeesController');
                
                Route::resource('companies', 'CompaniesController');
                Route::resource('company', 'CompaniesController');
            });
            