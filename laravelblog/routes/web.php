<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

//-------Todo-----
// Route::middleware('auth')->group(function(){
    Route::resource('/todo', 'TodoController');
    Route::put('/todo/{todo}/complete', 'TodoController@complete')->name('todo.complete');
    Route::delete('/todo/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
// });

// Route::get('/todo', 'TodoController@index')->name('todo.index');
// Route::get('/todo/create', 'TodoController@create');
// Route::post('/todo/create', 'TodoController@store');
// Route::get('/todo/{todo}/edit', 'TodoController@edit');
// Route::patch('/todo/{todo}/update', 'TodoController@update')->name('todo.update');
// Route::delete('/todo/{todo}/delete', 'TodoController@delete')->name('todo.delete');






//------------User-----------

Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');
//TESTING UPLOAD
// Route::post('/upload', function(Request $request){
//     $request->image->store('images');
//     return 'successful';
//     // dd($request->image);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
