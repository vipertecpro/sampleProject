<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Configuration;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ConfigurationController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all configuration
     * */
    public function general(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Configuration::latest()->get())
                        ->addIndexColumn()
                        ->editColumn('user_id',function(Configuration $settings){
                            return $settings->users->firstName.' '.$settings->users->lastName;
                        })

                        ->addColumn('action',function(Configuration $settings){
                            return '<div class="actionBtn">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-sm btn-info copy" data-clipboard-text="'.$settings->path.'" title="Copy To Clipboard">
                                                <i class="uil uil-copy"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.configuration.show',$settings->id).'" title="View Configuration">
                                                <i class="uil uil-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.configuration.edit',$settings->id).'" title="Edit Configuration">
                                                <i class="uil uil-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.configuration.remove').'" data-id="'.$settings->id.'" title="Remove Configuration">
                                                <i class="uil uil-trash"></i>
                                            </button>
                                        </div>
                                    </div> ';
                        })
                        ->rawColumns(['user_id','action'])
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'action', 'name' => 'action', 'title' => '', 'width' => '10px','sortable' => false],
            ])->parameters([
                'dom'           => 'Blfrtip',
                'processing'    => true,
                'responsive'    => true,
                'bAutoWidth'    => false,
                'lengthMenu'    => [[12 ,24, 48, 96, -1], [12 ,24, 48, 96, 'All']],
                'buttons'       => [
                    [
                        'extend'    => 'excelHtml5',
                        'title'     => 'Configuration_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Configuration_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ],
                'drawCallback' => 'function() {

                }',
            ]);
            $data = [
                'pageType'      => 'configuration',
                'pageTitle'     => 'Configuration Listing',
                'pageInfo'      => 'A Configuration of a system refers to the arrangement of each of its functional units, according to their nature, number and chief characteristics.',
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
                 'pageTitle'        => 'Configuration Create',
                 'pageInfo'         => 'Create configuration',
                 'formType'         => 'create',
                 'formData'         => []
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Configuration Edit',
                 'pageInfo'         => 'Update/Edit Configuration',
                 'formType'         => 'edit',
                 'formData'         => Configuration::findOrFail($id)
             ];
         }
        return view('admin.pages.configuration.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            $validator = Validator::make($request->all(),[
                'file_upload'   => 'required',
                'file_upload.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'        => 'error',
                    'message'       => $validator->getMessageBag(),
                    'requestData'   => $request->all()
                ]);
            }
            DB::table('configurations')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'Configuration Updated Successfully'
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
            Configuration::findOrFail($request->get('id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Configuration removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Configuration',
            'pageInfo'         => 'Here you can view the details of configuration.',
            'formData'         => Configuration::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.configuration.view',compact('data'));
    }
}
