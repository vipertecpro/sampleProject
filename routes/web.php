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
    return redirect()->route('admin.dashboard');
});
Route::group([
    'prefix'        => env('ADMIN_URL_PREFIX'),
    'as'            => 'admin.',
    'namespace'     => 'Admin',
    'middleware'    => 'config'
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
        Route::get('view/{id}','CategoryController@showCategory')->name('show');
        Route::delete('remove','CategoryController@removeCategory')->name('remove');
    });

    Route::group([
        'prefix'    => 'tags',
        'as'        => 'tag.'
    ],function(){
        Route::get('/','TagController@index')->name('list');
        Route::get('/create','TagController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','TagController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id?}','TagController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','TagController@showTag')->name('show');
        Route::delete('remove','TagController@removeTag')->name('remove');
    });
    Route::group([
        'prefix'    => 'users',
        'as'        => 'user.'
    ],function(){
        Route::get('/','UserController@index')->name('list');
        Route::get('/create','UserController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','UserController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id?}','UserController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','UserController@showUser')->name('show');
        Route::delete('remove','UserController@removeUser')->name('remove');
    });
    Route::group([
        'prefix'    => 'blogs',
        'as'        => 'blog.'
    ],function(){
        Route::get('/','PostController@index')->name('list');
        Route::get('/create','PostController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','PostController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id?}','PostController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','PostController@showBlogs')->name('show');
        Route::delete('remove','PostController@removeBlog')->name('remove');
    });
    Route::group([
        'prefix'    => 'news',
        'as'        => 'news.'
    ],function(){
        Route::get('/','NewsController@index')->name('list');
        Route::get('/create','NewsController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','NewsController@createUpdateForm')->name('edit');
        Route::post('storeUpdate/{id?}','NewsController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','NewsController@showNews')->name('show');
        Route::delete('remove','NewsController@showRemove')->name('remove');
    });
    Route::group([
        'prefix'    => 'media',
        'as'        => 'media.'
    ],function(){
        Route::get('/','MediaController@index')->name('list');
        Route::get('/create','MediaController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','MediaController@createUpdateForm')->name('edit');
        Route::post('/storeUpdate/{id?}','MediaController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','MediaController@showMedia')->name('show');
        Route::delete('remove','MediaController@showRemove')->name('remove');
    });

    Route::group([
        'prefix'    => 'products',
        'as'        => 'product.'
    ],function(){
        Route::get('/','ProductController@index')->name('list');
        Route::get('/create','ProductController@createUpdateForm')->name('create');
        Route::get('/edit/{id}','ProductController@createUpdateForm')->name('edit');
        Route::post('/storeUpdate/{id?}','ProductController@createUpdateRequest')->name('storeUpdate');
        Route::get('view/{id}','ProductController@showProduct')->name('show');
        Route::delete('remove','ProductController@showRemove')->name('remove');
    });

    Route::group([
        'prefix'    => 'config',
        'as'        => 'config.'
    ],function(){
        Route::get('/general','ConfigurationController@general')->name('general');
        Route::get('/locations','ConfigurationController@locations')->name('locations');
        Route::get('/header','ConfigurationController@header')->name('header');
        Route::get('/footer','ConfigurationController@footer')->name('footer');
        Route::get('/app','ConfigurationController@app')->name('app');
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
