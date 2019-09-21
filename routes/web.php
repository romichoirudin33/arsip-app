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

Route::get('/', function () {
    if (Auth::guest()){
        return redirect('login');
    }
    return view('content.welcome');
});

Auth::routes();
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('home', function (){
    return redirect('/');
//    return view('homepage');
});

Route::group(['middleware' => 'auth'], function () {

    Route::resource('personel', 'PersonelController');
    Route::prefix('personel')->group(function () {
        Route::get('trash/list', 'PersonelController@trash')->name('personel.trash');
        Route::get('trash/{id}/restore', 'PersonelController@restore')->name('personel.restore');
        Route::get('/jabatan/{id}', 'PersonelController@jabatan');
    });

    Route::resource('users', 'UsersAdminController', ['except' => [
        'show'
    ]]);
    Route::prefix('users')->group(function (){
        Route::get('/{username}/reset', 'UsersAdminController@reset')->name('users.reset');
        Route::post('/{username}/reset', 'UsersAdminController@update_reset')->name('users.update_reset');
    });

    Route::resource('category', 'KategoriController', ['except' => [
        'show'
    ]]);
    Route::resource('kepala-jabatan', 'KepalaJabatanController', ['except' => [
        'show'
    ]]);
    Route::prefix('category')->group(function (){
        Route::get('/{id}/create_detail', 'KategoriController@create_detail')->name('category.create_detail');
        Route::post('/{id}/store_detail', 'KategoriController@store_detail')->name('category.store_detail');
        Route::get('/{id}/edit_detail', 'KategoriController@edit_detail')->name('category.edit_detail');
        Route::put('/{id}/update_detail', 'KategoriController@update_detail')->name('category.update_detail');
        Route::delete('/{id}/destroy_detail', 'KategoriController@destroy_detail')->name('category.destroy_detail');
    });

    Route::resource('reminder', 'ReminderController', ['except' => [
        'show', 'edit', 'update', 'destroy'
    ]]);

    Route::resource('value', 'ValuePersonelController', ['except' => [
        'show', 'edit', 'update', 'destroy', 'index'
    ]]);
    Route::get('value/destroy', 'ValuePersonelController@destroy')->name('value.destroy');
});
