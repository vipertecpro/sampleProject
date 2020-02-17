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

    Route::group([
        'prefix'    => 'categories',
        'as'        => 'category.'
    ],function(){
        Route::get('/','CategoryController@index')->name('list');
        Route::get('/create','CategoryController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','CategoryController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id}','CategoryController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','CategoryController@showRemove')->name('show');
        Route::post('remove','CategoryController@showRemove')->name('remove');
    });
    Route::group([],function(){

    });
    Route::group([],function(){

    });
    Route::group([],function(){

    });
    Route::group([],function(){

    });
    Route::group([],function(){

    });
});
Route::get('categories','Admin\CategoryController@index');
Route::get('createUpdateForm/{id?}','Admin\CategoryController@createUpdateForm');
Route::post('createUpdateRequest/{id?}','Admin\CategoryController@createUpdateRequest')->name('createUpdateRequest');

Route::post('/uploadPlugins', function (\Illuminate\Http\Request $request) {
    try{
        $command = new Process('composer require laravelcollective/html');
        $command->setWorkingDirectory(base_path());
        $command->run();
        if($command->isSuccessful()){
            dd($command->getOutput());
        } else {
            throw new ProcessFailedException($command);
        }
        return view('admin.pages.plugins.create');
    }catch (Exception $exception){
        dd($exception->getMessage());
    }
})->name('uploadPlugins');
