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
        $data = [
            'pageType'      => 'dashboard',
            'createBtnUrl'  => route('admin.user.create'),
            'pageTitle'     => 'Dashboard',
            'pageInfo'      => 'A dashboard is a user interface that, organizes and presents information in a way that is easy to read.',
        ];
        return view('admin.pages.dashboard',compact('data'));
    }
}
