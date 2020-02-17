<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Yajra\DataTables\Html\Builder;

class MainController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all categories
     * */
    public function index(){
        return redirect()->route('admin.dashboard');
    }
    public function dashboard(){
        return view('admin.pages.dashboard');
    }
}
