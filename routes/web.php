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

Route::get('/', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    if ($user) {
        if ($user->role == 'admin') {
            return redirect(route('registries.index'));
        } else if ($user->role == 'user') {
            return redirect(route('registries.mine'));
        }
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registries/create', 'RegistryController@create')
    ->name('registries.create');

Route::post('/registries', 'RegistryController@store')
    ->name('registries.store');

Route::get('/registries', 'RegistryController@index')
    ->name('registries.index');

Route::get('/registries/mine', 'RegistryController@showRegistryByUserId')
    ->name('registries.mine');

Route::get('/registries/{id}', 'RegistryController@show')
    ->name('registries.show');

Route::post('/registries/{id}/approve', 'RegistryController@approve')
    ->name('registries.approve');

Route::post('/registries/{id}/reject', 'RegistryController@reject')
    ->name('registries.reject');
