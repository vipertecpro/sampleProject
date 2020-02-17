<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class CategoryController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all categories
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(User::latest()->get())
                        ->addIndexColumn()
                        ->addColumn('action',function(User $user){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.category.show',$user->id).'" title="View Category">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" title="Edit Category">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.category.remove').'" data-id="'.$user->id.'" title="Remove Category">
                                            <i class="uil uil-trash"></i>
                                            </button>
                                    </div>';
                        })
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'S.No.', 'width' => '10px'],
                ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
                ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
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
                        'title'     => 'Categories_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Categories_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ]
            ]);
            $data = [
                'pageTitle' => 'Category Listing',
                'pageInfo'  => 'Categories are a way of grouping blog, product, media, page and news',
                'pageData'  => $html
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
                 'pageTitle'        => 'Category Create',
                 'pageInfo'         => 'Create category',
                 'formType'         => 'create',
                 'formData'         => [],
                 'getAllParentList' => []
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Category Edit',
                 'pageInfo'         => 'Update/Edit Category',
                 'formType'         => 'create',
                 'formData'         => User::findOrFail($id),
                 'getAllParentList' => []
             ];
         }
        return view('admin.pages.categories.form',compact('data'));
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
            User::findOrFail($request->get('category_id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Category removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Category',
            'pageInfo'         => 'Here you can view the details of category.',
            'formData'         => User::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.categories.view',compact('data'));
    }
}
