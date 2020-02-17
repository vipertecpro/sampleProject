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
                        ->addColumn('action',function(){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary" title="View Category">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning" title="Edit Category">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" title="Remove Category">
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
//                'language'     => [
//                  'processing' => '<img src="https://thumbs.gfycat.com/SizzlingSmallAbalone-small.gif">'
//                ],
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
         try{
             if($id === 0){
                 $data = [
                     'pageTitle' => 'Category Create',
                     'pageInfo'  => 'Create category',
                     'formType'  => 'create',
                     'formData'  => [],
                 ];
             }else{
                 $data = [
                     'pageTitle' => 'Category Edit',
                     'pageInfo'  => 'Update/Edit Category',
                     'formType'  => 'create',
                     'formData'  => User::findOrFail((int)$id),
                 ];
             }
            return view('admin.pages.categories.form',compact('data'));
         }catch (Exception $exception){
             return response()->json([
                 'status'     => 'error',
                 'message'    => $exception->getMessage()
             ],401);
         }
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
}
