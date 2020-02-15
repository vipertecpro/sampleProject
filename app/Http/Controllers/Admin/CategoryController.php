<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all categories
     * */
    public function index(){
        try{
            $data = [
                'pageTitle' => 'Category Listing',
                'pageInfo'  => 'Categories are a way of grouping blog, product, media, page and news',
                'pageData'  => DB::table('users')->paginate(5) //User::paginate(5)
            ];
            return view('admin.pages.index',compact('data'));
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'error',
                'message'    => $exception->getMessage()
            ],401);
        }
    }
}
