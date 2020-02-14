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

Route::get('/create', function () {
    return view('admin.pages.plugins.create');
});
Route::post('/uploadPlugins', function (\Illuminate\Http\Request $request) {
    try{
        $command = new Process('composer require laravelcollective/html');
//        $command = new Process('which composer ');
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

