<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(Request $request){
        try{
            $data = [
                'pageTitle' => 'Home Page',
                'pageInfo'  => 'I AM HOME PAGE'
            ];
            return view($request->attributes->get('themePages').'home',compact('data'));
        }catch (Exception $exception){
            return response()->json([
               'status'     => 'error',
               'message'    => $exception->getMessage()
            ]);
        }
    }
    public function login(Request $request){
        try{
            $data = [
                'pageTitle' => 'Login Page',
                'pageInfo'  => 'I AM Login PAGE'
            ];
            return view($request->attributes->get('themePages').'login',compact('data'));
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'error',
                'message'    => $exception->getMessage()
            ]);
        }
    }
}
