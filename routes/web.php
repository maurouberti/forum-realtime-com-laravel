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
Route::resource('topicos', 'TopicoController')->only([
    'index', 'show'
]);

Route::get('/respostas/{id}', 'RespostaController@index');

Route::middleware(['auth'])->group(function () {

    Route::resource('topicos', 'TopicoController')->only([
        'store', 'edit', 'update'
    ]);
    Route::get('/topico/fixar/{topico}', 'TopicoController@fixar');
    Route::get('/topico/fechar/{topico}', 'TopicoController@fechar');

    Route::post('/respostas', 'RespostaController@store');
    Route::get('/resposta/destaque/{id}', 'RespostaController@destaque');

        
    Route::get('/profile', 'ProfileController@edit');
    Route::post('/profile', 'ProfileController@update');
        
});


Route::get('/login/{provider}', 'SocialAuthController@redirect');
Route::get('/login/{provider}/callback', 'SocialAuthController@callback');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
