<?php

namespace App\Http\Controllers;

use App\Post;
use Exception;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(Request $request){
        try{
            $getNewsData = Post::where('type','news')->paginate(3);
            $data = [
                'pageTitle' => 'Home Page',
                'pageInfo'  => 'I AM HOME PAGE',
                'pageData'  => [
                    'news'  => $getNewsData
                ]
            ];
            return view($request->attributes->get('themePages').'home',compact('data'));
        }catch (Exception $exception){
            return response()->json([
               'status'     => 'error',
               'message'    => $exception->getMessage()
            ]);
        }
    }
    public function news(Request $request, $newsSlug = ''){
        try{
            if($newsSlug !== ''){
                /*
                 * Single News Details
                 * */
                $getNewsData = Post::where('type','news')->where('slug',$newsSlug)->first();
                if($getNewsData !== null){
                    $data = [
                        'pageTitle' => 'News | '.$getNewsData->title,
                        'pageInfo'  => $getNewsData->summary,
                        'pageData'  => $getNewsData
                    ];
                }else{
                    return response()->json([
                        'status'    => 'error',
                        'message'   => 'Invalid URL'
                    ]);
                }
                return view($request->attributes->get('themePages').'singleNews',compact('data'));
            }
            $getNewsData = Post::where('type','news')->paginate(9);
            $data = [
                'pageTitle' => 'News | List',
                'pageInfo'  => 'Newly received or noteworthy information, especially about recent events.',
                'pageData'  => $getNewsData
            ];
            return view($request->attributes->get('themePages').'news',compact('data'));
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'error',
                'message'    => $exception->getMessage()
            ]);
        }
    }
}
