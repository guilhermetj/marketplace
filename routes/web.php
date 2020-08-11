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

    $helloWorld = 'Hello World';

    return view('welcome', compact('helloWorld'));
});

Route::get('/model', function (){
// active record
//    $user = new \App\User();
//    $user->name = 'Usuario Teste 2 ';
//    $user->email = 'email@teste2.com';
//    $user->password = bcrypt('12345678');
//    $user->save();
//
    //mass created
//    $user   = \App\User::create([
//        'name' => 'Guilherme Pereira',
//        'email' => 'guilherme@email.com',
//        'password' => bcrypt('12345678')
//    ]);
//
    //mass update

//    $user = \App\User::find(42);
//    $user->update([
//       'name' => 'Atualizado com Mass update'
//     ]);
    return \App\User::all();
});




Route::prefix('admin')->namespace('Admin')->group(function (){

//    Route::prefix('stores')->group(function (){
//        Route::get('/create', 'StoreController@create')->name('stores.create');
//        Route::post('/update/{store}', 'StoreController@update')->name('stores.update');
//        Route::post('/store', 'StoreController@store')->name('stores.store');
//        Route::get('/{store}/edit', 'StoreController@edit')->name('stores.edit');
//        Route::get('/destroy/{store}', 'StoreController@destroy')->name('stores.destroy');
//        Route::get('/', 'StoreController@index')->name('stores.index');
//
//    });
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
