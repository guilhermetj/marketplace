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
