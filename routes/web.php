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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');

Route::resource('/', 'StudentController');   
Route::resource('students', 'StudentController');

Route::get('/export_excel', 'ExportExcellController@index');

Route::get('export_excel/excel','ExportExcellController@excel')->name('export_excel.excel');

Route::get('students', ['uses'=>'StudentController@index', 'as'=>'students.index']);
// Route::get('students', ['uses'=>'StudentController@studentGender', 'as'=>'students.studentGender']);
Route::delete('students/{id}', ['uses'=>'StudentController@destroy', 'as'=>'students.destroy']);
// Route::get('students/show', ['uses'=>'StudentController@show', 'as'=>'students.show']);
// Route::get('students', ['uses'=>'StudentController@viewGenderCheck', 'as'=>'students.viewGenderCheck']);

Route::get('/admin', function(){
    return 'You are Admin Account!';

})->middleware(['auth','auth.admin']);


Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users','UserController',['except' => ['show','create','store']]);
    Route::get('/impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');
});

Route::get('/admin/impersonate/destroy','Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');