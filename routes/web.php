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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Route::get(['middleware'=>'auth'], function () {

// });

Route::resource('people', 'PersonController');
Route::group(['prefix' => 'people'], function () {
    Route::group(['prefix' => '{personn}'], function () {
        Route::redirect('/posts', '/people/{person}');
        // Route::post('/update', 'PersonController@update')->name('people.update');
        Route::resource('posts', 'PostController')->except(['index']);
    });
});

Route::get('/posts', 'PostController@index')->name('posts.index');



//無視

Route::group(['prefix' => 'test'], function () {
    //テスト一覧画面を表示
    Route::get('', 'TestController@showList')->name('tests');   
    //テスト登録画面を表示
    Route::get('/create', 'TestController@showCreate')->name('create');

    //テスト登録
    Route::post('/store', 'TestController@exeStore')->name('store');

    Route::post('/update', 'TestController@exeUpdate')->name('update');
    Route::group(['prefix' => '{id}'], function () {
        //テスト詳細画面を表示
        Route::get('', 'TestController@showDetail')->name('show');

        //テスト削除
        Route::post('/delete', 'TestController@exeDelete')->name('delete');

        //テスト編集画面を表示
        Route::get('/edit', 'TestController@showEdit')->name('edit');
    });
});
