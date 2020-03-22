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

Route::get('/teste', function () {
    return view('welcome');
});

Route::get('/locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return back();
});


Route::get('/', function () {
    return view('topicos.index');
});

Route::get('/topicos/{id}', 'TopicoController@show');

Route::middleware(['auth'])
    ->group(function () {
        Route::resource('topicos', 'TopicoController')->only([
            'index', 'store', 'edit', 'update'
        ]);

        // Route::get('/reply/highligth/{id}', 'RepliesController@highligth');
        // Route::get('/topico/pin/{topico}', 'TopicoController@pin');
        // Route::get('/topico/close/{topico}', 'TopicoController@close');

        // Route::get('/profile', 'ProfileController@edit');
        // Route::post('/profile', 'ProfileController@update');

        // Route::post('/replies', 'RepliesController@store');
    });


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
