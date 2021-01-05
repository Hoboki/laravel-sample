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

//テスト一覧画面を表示
Route::get('/', 'TestController@showList')->name('tests');

//テスト登録画面を表示
Route::get('/test/create', 'TestController@showCreate')->name('create');

//テスト登録
Route::post('/test/store', 'TestController@exeStore')->name('store');

//テスト詳細画面を表示
Route::get('/test/{id}', 'TestController@showDetail')->name('show');

//テスト編集画面を表示
Route::get('/test/edit/{id}', 'TestController@showEdit')->name('edit');
Route::post('/test/update', 'TestController@exeUpdate')->name('update');

//ブログ削除
Route::post('/test/delete/{id}', 'TestController@exeDelete')->name('delete');





//合計を表示
Route::get('/sum/{x}/{y}', 'MathController@sum');