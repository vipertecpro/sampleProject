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

class PageController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all page
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Post::where('type','page')->latest()->get())
                        ->addIndexColumn()
                        ->editColumn('title',function(Post $page){
                            return Str::words($page->title,10);
                        })
                        ->editColumn('created_by',function(Post $page){
                            return $page->users->firstName.' '.$page->users->lastName;
                        })
                        ->addColumn('action',function(Post $page){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.page.show',$page->id).'" title="View Page">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.page.edit',$page->id).'" title="Edit Page">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.page.remove').'" data-id="'.$page->id.'" title="Remove Page">
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
                        'title'     => 'Page_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Page_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ]
            ]);
            $data = [
                'pageType'      => 'page',
                'createBtnUrl'  => route('admin.page.create'),
                'pageTitle'     => 'Page Listing',
                'pageInfo'      => 'A web page is a specific collection of information provided by a website and displayed to a user in a web browser.',
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
                 'pageTitle'        => 'Page Create',
                 'pageInfo'         => 'Create page',
                 'formType'         => 'create',
                 'formData'         => [],
                 'getAllParentList' => Post::where('type','post')
                                         ->where('parent_id','0')
                                         ->pluck('name','id')
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Page Edit',
                 'pageInfo'         => 'Update/Edit Page',
                 'formType'         => 'edit',
                 'formData'         => Post::findOrFail($id),
                 'getAllParentList' => Post::where('type','post')
                                                ->where('id','!=',$id)
                                                ->where('parent_id','0')
                                                ->pluck('name','id')
             ];
         }
        return view('admin.pages.page.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            DB::table('users')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'Page Updated Successfully'
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
                'message'    => 'Page removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Page',
            'pageInfo'         => 'Here you can view the details of page.',
            'formData'         => Post::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.page.view',compact('data'));
    }
}
