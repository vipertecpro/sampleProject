<?php

namespace App\Http\Controllers;

use App\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    public function index(Request $request){
        try{
            $getNewsData = Post::where('type','news')->paginate(3);
            $data = [
                'pageTitle'        => 'Home Page',
                'pageImage'        => publicAsset('img/logo.png'),
                'pageInfo'         => 'I AM HOME PAGE',
                'pageType'         => 'website',
                'meta_description' => 'Home Page',
                'meta_keywords'    => 'Home Page',
                'meta_author'      => env('META_AUTHOR'),
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
                        'pageTitle'        => 'News | '.Str::of($getNewsData->title)->words(20),
                        'pageInfo'         => Str::of($getNewsData->summary)->words(20),
                        'pageData'         => $getNewsData,
                        'pageImage'        => publicAsset('img/logo.png'),
                        'pageType'         => 'article',
                        'meta_description' => Str::of($getNewsData->summary)->words(10),
                        'meta_keywords'    => 'Home Page',
                        'meta_author'      => env('META_AUTHOR'),
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
