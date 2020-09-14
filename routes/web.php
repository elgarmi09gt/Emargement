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

/* Route::name('home')->get('/', function () {
    return view('welcome');
}); */

Route::name('home')->get('/', 'App\Http\Controllers\EmargementController@index');

Route::name('emargement.create')->post('/emargement', 'App\Http\Controllers\EmargementController@save');
/*
Route::get('/emargement', [
        'uses' => 'EmargementController@index',
        'as' => 'index'
    ]
);
*/
// Route::post('/emargement', 'EmargementController@save')->name('emargement.create');