<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RoleController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all users
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Role::whereNotIn('slug',['admin','user'])->latest()->get())
                        ->addIndexColumn()
                        ->editColumn('parent_id',function(Role $role){
                            if($role->parent_id === 1){
                                return 'Admin';
                            }
                            if($role->parent_id === 2){
                                return 'User';
                            }
                            return $role->getParentName->name;
                        })
                        ->addColumn('action',function(Role $role){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.user.role.show',$role->id).'" title="View Role">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.user.role.edit',$role->id).'" title="Edit Role">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.user.role.remove').'" data-id="'.$role->id.'" title="Remove Role">
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
                ['data' => 'parent_id', 'name' => 'parent_id', 'title' => 'Parent'],
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
                        'title'     => 'Roles_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Roles_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ]
            ]);
            $data = [
                'pageType'      => 'role',
                'createBtnUrl'  => route('admin.user.role.create'),
                'pageTitle'     => 'Role Listing',
                'pageInfo'      => 'User Roles are permission sets that control access to areas and features within the Professional Archive Platform. Each User account requires a Role assignment.',
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
                 'pageTitle'        => 'Role Create',
                 'pageInfo'         => 'Create role',
                 'formType'         => 'create',
                 'formData'         => []
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Role Edit',
                 'pageInfo'         => 'Update/Edit Role',
                 'formType'         => 'edit',
                 'formData'         => Role::findOrFail($id)
             ];
         }
        return view('admin.pages.roles.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            DB::table('roles')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'Role Updated Successfully'
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
            Role::findOrFail($request->get('id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Role removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Role',
            'pageInfo'         => 'Here you can view the details of user.',
            'formData'         => Role::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.roles.view',compact('data'));
    }
}
