<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
                        ->editColumn('file_size',function(Media $media){
                            $bytes = $media->file_size;
                            if ($bytes >= 1073741824)
                            {
                                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
                            }
                            elseif ($bytes >= 1048576)
                            {
                                $bytes = number_format($bytes / 1048576, 2) . ' MB';
                            }
                            elseif ($bytes >= 1024)
                            {
                                $bytes = number_format($bytes / 1024, 2) . ' KB';
                            }
                            elseif ($bytes > 1)
                            {
                                $bytes .= ' bytes';
                            }
                            elseif ($bytes === 1)
                            {
                                $bytes .= ' byte';
                            }
                            else
                            {
                                $bytes = '0 bytes';
                            }
                            return '<strong>File Size: </strong>'.$bytes;
                        })
                        ->editColumn('file_type',function(Media $media){
                            return '<strong>File Type : </strong>'.$media->file_type;
                        })
                        ->addColumn('action',function(Media $media){
                            return '<div class="actionBtn">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-sm btn-info copy" data-clipboard-text="'.$media->path.'" title="Copy To Clipboard">
                                                <i class="uil uil-copy"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.media.show',$media->id).'" title="View Media">
                                                <i class="uil uil-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.media.edit',$media->id).'" title="Edit Media">
                                                <i class="uil uil-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.media.remove').'" data-id="'.$media->id.'" title="Remove Media">
                                                <i class="uil uil-trash"></i>
                                            </button>
                                        </div>
                                    </div> ';
                        })
                        ->rawColumns(['path','file_type','file_size','action'])
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'path', 'name' => 'path', 'title' => 'Path'],
                ['data' => 'file_type', 'name' => 'file_type', 'title' => 'File Type'],
                ['data' => 'file_size', 'name' => 'file_size', 'title' => 'File Size'],
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

                    // Tooltip

                    $("button").tooltip({
                      trigger: "click",
                      placement: "bottom"
                    });

                    function setTooltip(btn, message) {
                      $(btn).tooltip("hide")
                        .attr("data-original-title", message)
                        .tooltip("show");
                    }

                    function hideTooltip(btn) {
                      setTimeout(function() {
                        $(btn).tooltip("hide");
                        $(btn).tooltip("dispose");
                      }, 1000);
                    }
                    var clipboard = new ClipboardJS(".copy");
                    clipboard.on("success", function(e) {
                      setTooltip(e.trigger, "Copied!");
                      hideTooltip(e.trigger);
                    });

                    clipboard.on("error", function(e) {
                      setTooltip(e.trigger, "Failed!");
                      hideTooltip(e.trigger);
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
