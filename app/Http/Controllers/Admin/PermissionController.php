<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class PermissionController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all users
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Permission::latest()->get())
                        ->addIndexColumn()
                        ->addColumn('action',function(Permission $permission){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.user.permission.create',$permission->id).'" title="View Permission">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.user.permission.edit',$permission->id).'" title="Edit Permission">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.user.permission.remove').'" data-id="'.$permission->id.'" title="Remove Permission">
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
                        'title'     => 'Permissions_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Permissions_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ]
            ]);
            $data = [
                'pageType'      => 'permission',
                'createBtnUrl'  => route('admin.user.permission.create'),
                'pageTitle'     => 'Permission Listing',
                'pageInfo'      => 'Permissions determine what information users can view and edit within the software. Flexible and customizable permissions allow you to maintain the appropriate balance of collaboration and control, while giving you peace of mind that your company\'s data is secure and protected.',
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
                 'pageTitle'        => 'Permission Create',
                 'pageInfo'         => 'Create permission',
                 'formType'         => 'create',
                 'formData'         => []
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Permission Edit',
                 'pageInfo'         => 'Update/Edit Permission',
                 'formType'         => 'edit',
                 'formData'         => Permission::findOrFail($id)
             ];
         }
        return view('admin.pages.permissions.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            DB::table('permissions')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'Permission Updated Successfully'
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
            Permission::findOrFail($request->get('id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Permission removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Permission',
            'pageInfo'         => 'Here you can view the details of user.',
            'formData'         => Permission::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.permissions.view',compact('data'));
    }
}
