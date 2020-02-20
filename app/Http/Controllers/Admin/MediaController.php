<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class MediaController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all media
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Media::latest()->get())
                        ->addIndexColumn()
                        ->editColumn('created_by',function(Media $media){
                            return $media->users->firstName.' '.$media->users->lastName;
                        })
                        ->editColumn('path',function(Media $media){
                            return '<a href="'.asset($media->path).'" target="_blank">
                                        <img class="img-responsive img-fluid fit-image" src="'.asset($media->path).'">
                                    </a>';
                        })
                        ->editColumn('file_size_kb',function(Media $media){
                            if ($media->file_size >= 1024)
                            {
                                return '<strong>File Size (kb): </strong>'.number_format($media->file_size / 1024, 2) . ' KB';
                            }
                            return '<strong>File Size (kb): - </strong>';
                        })
                        ->editColumn('file_size_mb',function(Media $media){
                            if ($media->file_size >= 1048576)
                            {
                                return '<strong>File Size (mb): </strong>'.number_format($media->file_size / 1048576, 2) . ' MB';
                            }
                            return '<strong>File Size (mb): - </strong>';
                        })
                        ->editColumn('file_type',function(Media $media){
                            return '<strong>File Type : </strong>'.$media->file_type;
                        })
                        ->addColumn('action',function(Media $media){
                            return '<div class="actionBtn"><div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.media.show',$media->id).'" title="View Media">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.media.edit',$media->id).'" title="Edit Media">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.media.remove').'" data-id="'.$media->id.'" title="Remove Media">
                                            <i class="uil uil-trash"></i>
                                            </button>
                                    </div></div> ';
                        })
                        ->rawColumns(['path','file_type','file_size_kb','file_size_mb','action'])
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'path', 'name' => 'path', 'title' => 'Path'],
                ['data' => 'file_type', 'name' => 'file_type', 'title' => 'File Type'],
                ['data' => 'file_size_kb', 'name' => 'file_size_kb', 'title' => 'File Size (kb)'],
                ['data' => 'file_size_mb', 'name' => 'file_size_mb', 'title' => 'File Size (mb)'],
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
                        'title'     => 'Media_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Media_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ],
                'drawCallback' => 'function() {
                    function getRandomColor() {
                      var letters = "0123456789ABCDEF";
                      var color = "#";
                      for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                      }
                      return color;
                    }
                    $("#dataTableBuilder tbody tr").each(function (i) {
                        $(this).css("border-left", "2px solid "+getRandomColor());
                    });
                }',
            ]);
            $data = [
                'pageType'      => 'media',
                'createBtnUrl'  => route('admin.media.create'),
                'pageTitle'     => 'Media Listing',
                'pageInfo'      => 'Media are the communication outlets or tools used to store and deliver information or data.',
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
                 'pageTitle'        => 'Media Create',
                 'pageInfo'         => 'Create media',
                 'formType'         => 'create',
                 'formData'         => []
             ];
         }else{
             $data = [
                 'pageTitle'        => 'Media Edit',
                 'pageInfo'         => 'Update/Edit Media',
                 'formType'         => 'edit',
                 'formData'         => Media::findOrFail($id)
             ];
         }
        return view('admin.pages.media.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            DB::table('medias')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'Media Updated Successfully'
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
            Media::findOrFail($request->get('id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Media removed successfully'
            ],200);
        }
        $data = [
            'pageTitle'        => 'View Media',
            'pageInfo'         => 'Here you can view the details of media.',
            'formData'         => Media::findOrFail($id),
            'getAllParentList' => []
        ];
        return view('admin.pages.media.view',compact('data'));
    }
}
