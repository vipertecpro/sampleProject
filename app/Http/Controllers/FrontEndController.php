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
                $pageTitle = Str::of($post_slug->type)->ucfirst().' | '.Str::of($post_slug->title)->words(20).' - '.env('APP_NAME');
                $data = [
                    'pageTitle'        => $pageTitle,
                    'pageInfo'         => Str::of($post_slug->summary)->words(20),
                    'pageData'         => $post_slug,
                    'pageImage'        => publicAsset('img/logo.png'),
                    'pageType'         => $post_slug->type,
                    'meta_description' => Str::of($post_slug->summary)->words(10),
                    'meta_keywords'    => $post_slug->type.','.$post_slug->title,
                    'meta_author'      => env('META_AUTHOR'),
                ];
                return view($request->attributes->get('themePages').'singleNews',compact('data'));
            }
            if($post_type->first()->type === 'blog'){
                $pageInfo = 'A blog (a truncation of "weblog") is a discussion or informational website published on the World Wide Web consisting of discrete, often informal diary-style text entries (posts).';
            }else if($post_type->first()->type === 'news'){
                $pageInfo = 'News is information about current events. This may be provided through many different media: word of mouth, printing, postal systems, broadcasting, electronic communication, or through the testimony of observers and witnesses to events.';
            }else if($post_type->first()->type === 'product'){
                $pageInfo = 'A product is the item offered for sale. A product can be a service or an item. It can be physical or in virtual or cyber form. Every product is made at a cost and each is sold at a price.';
            }
            $data = [
                'pageTitle' => Str::of($post_type->first()->type)->ucfirst().' - '.env('APP_NAME'),
                'pageInfo'  => $pageInfo,
                'pageData'  => $post_type,
                'pageType'  => Str::of($post_type->first()->type)->plural()

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
