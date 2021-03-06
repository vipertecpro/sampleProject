<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Taxonomy;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class TagController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all tags
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Taxonomy::where('type','tag')->latest()->get())
                        ->addIndexColumn()
                        ->addColumn('action',function(Taxonomy $tag){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.tag.show',$tag->id).'" title="View Taxonomy">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.tag.edit',$tag->id).'" title="Edit Taxonomy">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.tag.remove').'" data-id="'.$tag->id.'" title="Remove Taxonomy">
                                            <i class="uil uil-trash"></i>
                                            </button>
                                    </div>';
                        })
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'S.No.', 'width' => '10px'],
                ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
                ['data' => 'slug', 'name' => 'slug', 'title' => 'Slug'],
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
                        'title'     => 'Tags_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Tags_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ]
            ]);
            $data = [
                'pageType'      => 'tag',
                'createBtnUrl'  => route('admin.tag.create'),
                'pageTitle'     => 'Tag Listing',
                'pageInfo'      => 'A tag is a keyword or term assigned to a piece of information.',
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
                 'pageTitle'        => 'Tag Create',
                 'pageInfo'         => 'Create tag',
                 'formType'         => 'create',
                 'formData'         => [],
                 'getAllParentList' => Taxonomy::where('type','tag')
                                                 ->where('parent_id','0')
                                                 ->pluck('name','id')
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Tag Edit',
                 'pageInfo'         => 'Update/Edit Tag',
                 'formType'         => 'edit',
                 'formData'         => Taxonomy::findOrFail($id),
                 'getAllParentList' => Taxonomy::where('type','tag')
                                                 ->where('id','!=',$id)
                                                 ->where('parent_id','0')
                                                 ->pluck('name','id')
             ];
         }
        return view('admin.pages.tags.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            DB::table('users')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'User Updated Successfully'
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
            Taxonomy::findOrFail($request->get('id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Taxonomy removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Taxonomy',
            'pageInfo'         => 'Here you can view the details of tag.',
            'formData'         => Taxonomy::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.tags.view',compact('data'));
    }
}
