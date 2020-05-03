<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class PostController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all post
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Post::where('type','blog')->latest()->get())
                        ->addIndexColumn()
                        ->editColumn('title',function(Post $post){
                            return Str::words($post->title,10);
                        })
                        ->editColumn('created_by',function(Post $post){
                            return $post->users->firstName.' '.$post->users->lastName;
                        })
                        ->addColumn('action',function(Post $post){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.post.show',$post->id).'" title="View Post">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.post.edit',$post->id).'" title="Edit Post">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.post.remove').'" data-id="'.$post->id.'" title="Remove Post">
                                            <i class="uil uil-trash"></i>
                                            </button>
                                    </div>';
                        })
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'S.No.', 'width' => '10px'],
                ['data' => 'created_by', 'name' => 'created_by', 'title' => 'Created By'],
                ['data' => 'title', 'name' => 'title', 'title' => 'Title'],
                ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
                ['data' => 'action', 'name' => 'action', 'title' => '', 'width' => '10px','sortable' => false],
            ])->parameters([
                'dom'           => 'Blfrtip',
                'processing'    => true,
                'responsive'    => true,
                'bAutoWidth'    => false,
                'lengthMenu'    => [[5 ,10, 25, 50, -1], [5, 10, 25, 50, 'All']],
                'buttons'       => [
                    [
                        'extend'    => 'excelHtml5',
                        'title'     => 'Post_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Post_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ]
            ]);
            $data = [
                'pageType'      => 'post',
                'createBtnUrl'  => route('admin.post.create'),
                'pageTitle'     => 'Post Listing',
                'pageInfo'      => 'A post is a discussion or informational website published on the World Wide Web consisting of discrete, often informal diary-style text entries.',
                'pageData'      => $html
            ];
            return view('admin.pages.index',compact('data'));
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'error',
                'message'    => $exception->getMessage()
            ],401);
        }
    }
    public function createUpdateForm($id = 0){
         if($id === 0){
             $data = [
                 'pageTitle'        => 'Post Create',
                 'pageInfo'         => 'Create post',
                 'formType'         => 'create',
                 'formData'         => [],
                 'getAllParentList' => Post::where('type','post')
                                         ->where('parent_id','0')
                                         ->pluck('name','id')
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Post Edit',
                 'pageInfo'         => 'Update/Edit Post',
                 'formType'         => 'edit',
                 'formData'         => Post::findOrFail($id),
                 'getAllParentList' => Post::where('type','post')
                                                ->where('id','!=',$id)
                                                ->where('parent_id','0')
                                                ->pluck('name','id')
             ];
         }
        return view('admin.pages.post.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            DB::table('users')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'Post Updated Successfully'
            ],401);
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'error',
                'message'    => $exception->getMessage()
            ],401);
        }
    }

    public function showRemove(Request $request, $id = 0){
        if($request->ajax()){
            Post::findOrFail($request->get('id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Post removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Post',
            'pageInfo'         => 'Here you can view the details of post.',
            'formData'         => Post::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.post.view',compact('data'));
    }
}
