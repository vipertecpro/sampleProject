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
    public function show(Request $request,$post_type = null, $post_slug = null){
        try{
            if($post_slug !== null){
                /*
                 * Single News Details
                 * */
                $data = [
                    'pageTitle'        => 'News | '.Str::of($post_slug->title)->words(20),
                    'pageInfo'         => Str::of($post_slug->summary)->words(20),
                    'pageData'         => $post_slug,
                    'pageImage'        => publicAsset('img/logo.png'),
                    'pageType'         => 'article',
                    'meta_description' => Str::of($post_slug->summary)->words(10),
                    'meta_keywords'    => 'Home Page',
                    'meta_author'      => env('META_AUTHOR'),
                ];
                return view($request->attributes->get('themePages').'singleNews',compact('data'));
            }
            $data = [
                'pageTitle' => 'News | List',
                'pageInfo'  => 'Newly received or noteworthy information, especially about recent events.',
                'pageData'  => $post_type
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
