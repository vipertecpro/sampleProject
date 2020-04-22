<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Theme;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ThemeController extends Controller
{
    public function __construct(){
    }
    /*
     * Def : List of all theme
     * */
    public function index(Builder $builder){
        try{
            updateThemes();
            if (request()->ajax()) {
                return DataTables::of(Theme::latest()->get())
                        ->addIndexColumn()
                        ->editColumn('name',function(Theme $theme){
                            return Str::words($theme->name,10);
                        })
                        ->editColumn('screenshot_path',function(Theme $theme){
                            return '<a href="javascript::void();">
                                        <img class="img-responsive img-fluid fit-image" src="../../'.$theme->screenshot_path.'" width="100px">
                                    </a>';
                        })
                        ->addColumn('action',function(Theme $theme){
                            $defaultBtn = '';
                            if($theme->activate === 'false'){
                                $defaultBtn = '<div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-info activate" data-url="'.route('admin.theme.activate').'" data-id="'.$theme->id.'" title="Activate Theme">
                                            <i class="uil uil-repeat"></i>
                                            </button>
                                    </div>';
                                if($theme->name !== 'default'){
                                    return $defaultBtn.'<div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.theme.remove').'" data-id="'.$theme->id.'" title="Remove Role">
                                            <i class="uil uil-trash"></i>
                                            </button>
                                    </div>';
                                }
                            }
                            return $defaultBtn;
                        })
                        ->rawColumns(['screenshot_path','action'])
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'S.No.', 'width' => '10px'],
                ['data' => 'screenshot_path', 'name' => 'screenshot_path', 'title' => 'Screenshot'],
                ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
                ['data' => 'activate', 'name' => 'activate', 'title' => 'Activate'],
                ['data' => 'pages_path', 'name' => 'pages_path', 'title' => 'Pages Path'],
                ['data' => 'action', 'name' => 'action', 'title' => '', 'width' => '100px','sortable' => false],
            ])->parameters([
//                'dom'           => 'Blfrtip',
                'processing'    => true,
                'responsive'    => true,
                'bAutoWidth'    => false,
            ]);
            $data = [
                'pageType'      => 'theme',
                'pageTitle'     => 'Theme Listing',
                'pageInfo'      => 'In computing, a theme is a preset package containing graphical appearance details.',
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
    public function activate(Request $request, $id = 0){
        try{
            if($request->ajax()) {
                $getTheme = Theme::findOrFail($request->get('id'));
                if($getTheme->activate === 'false'){
                    Theme::where('id',$request->get('id'))->update([
                        'activate'  => 'true'
                    ]);
                    Theme::where('id','!=',$request->get('id'))
                        ->where('activate','true')
                        ->update([
                        'activate'  => 'false'
                    ]);
                }else{
                    Theme::where('id',$request->get('id'))->update([
                        'activate'  => 'false'
                    ]);
                }
                if(file_exists(public_path('assets')) && is_link(public_path('assets'))){
                    unlink(public_path('assets'));
                }
                File::link(resource_path('views/themes/'.$getTheme->name.'/assets'), public_path('assets'));
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Theme Activated Successfully'
                ], 200);
            }
        }catch (Exception $exception){
            return response()->json([
                'status'     => 'error',
                'message'    => $exception->getMessage()
            ],401);
        }
    }
    public function rmdir_recursive($dir) {
        try{
            foreach(scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                if (is_dir("$dir/$file")) $this->rmdir_recursive("$dir/$file");
                else unlink("$dir/$file");
            }
            rmdir($dir);
        }catch (Exception $exception){
            return true;
        }
    }
    public function components(){
        $data = [
            'pageTitle'        => 'Theme Components',
            'pageInfo'         => 'Here you can update your current theme components',
            'formType'         => 'edit',
            'themeInfo'        => Theme::where('activate','true')->first(),
            'formData'         => json_decode(Theme::where('activate','true')->first()->components, true)
        ];
        return view('admin.pages.theme.components',compact('data'));
    }
    public function updateComponents(Request $request){
        try{
            Theme::where('activate','true')->update([
               'components' => json_encode($request->except('_token'),true)
            ]);
            return redirect()->back()->with([
                'status'    => 'success',
                'message'   => 'Theme components updated successfully.'
            ],401);
        }catch (Exception $exception){
            return response()->json([
                'status'    => 'error',
                'message'   => $exception->getMessage()
            ],401);
        }
    }
}
