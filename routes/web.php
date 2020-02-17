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

use Illuminate\Support\Facades\Route;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

Route::get('/', function () {
    return view('admin.pages.dashboard');
});
Route::group([
    'prefix'    => 'admin',
    'as'        => 'admin.',
    'namespace' => 'Admin'
],function(){
    Route::get('/','MainController@index')->name('index');
    Route::get('/dashboard','MainController@dashboard')->name('dashboard');
    Route::group([
        'prefix'    => 'categories',
        'as'        => 'category.'
    ],function(){
        Route::get('/','CategoryController@index')->name('list');
        Route::get('/create','CategoryController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','CategoryController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id?}','CategoryController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','CategoryController@showRemove')->name('show');
        Route::post('remove','CategoryController@showRemove')->name('remove');
    });

    Route::group([
        'prefix'    => 'tags',
        'as'        => 'tag.'
    ],function(){
        Route::get('/','TagController@index')->name('list');
        Route::get('/create','TagController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','TagController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id?}','TagController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','TagController@showRemove')->name('show');
        Route::post('remove','TagController@showRemove')->name('remove');
    });
    Route::group([
        'prefix'    => 'users',
        'as'        => 'user.'
    ],function(){
        Route::get('/','UserController@index')->name('list');
        Route::get('/create','UserController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','UserController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id?}','UserController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','UserController@showRemove')->name('show');
        Route::post('remove','UserController@showRemove')->name('remove');
    });
});
//Route::post('/uploadPlugins', function (\Illuminate\Http\Request $request) {
//    try{
//        $command = new Process('composer require laravelcollective/html');
//        $command->setWorkingDirectory(base_path());
//        $command->run();
//        if($command->isSuccessful()){
//            dd($command->getOutput());
//        } else {
//            throw new ProcessFailedException($command);
//        }
//        return view('admin.pages.plugins.create');
//    }catch (Exception $exception){
//        dd($exception->getMessage());
//    }
//})->name('uploadPlugins');
