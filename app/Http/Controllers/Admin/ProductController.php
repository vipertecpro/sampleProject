<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ProductController extends Controller
{
    public function __construct(){

    }
    /*
     * Def : List of all product
     * */
    public function index(Builder $builder){
        try{
            if (request()->ajax()) {
                return DataTables::of(Product::latest()->get())
                        ->addIndexColumn()
                        ->editColumn('product_name',function(Product $product){
                            return Str::words($product->product_name,5);
                        })
                        ->editColumn('user_id',function(Product $product){
                            return $product->user->firstName.' '.$product->user->lastName;
                        })
                        ->addColumn('action',function(Product $product){
                            return ' <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-sm btn-primary view" data-url="'.route('admin.product.show',$product->id).'" title="View Product">
                                            <i class="uil uil-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning edit" data-url="'.route('admin.product.edit',$product->id).'" title="Edit Product">
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger remove" data-url="'.route('admin.product.remove').'" data-id="'.$product->id.'" title="Remove Product">
                                            <i class="uil uil-trash"></i>
                                            </button>
                                    </div>';
                        })
                        ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'S.No.','width' => '50px'],
                ['data' => 'user_id', 'name' => 'user_id', 'title' => 'Created By','width' => '150px'],
                ['data' => 'product_name', 'name' => 'product_name', 'title' => 'Name','width' => '300px'],
                ['data' => 'product_price', 'name' => 'product_price', 'title' => 'Price','width' => '100px'],
                ['data' => 'product_in_stock', 'name' => 'product_in_stock', 'title' => 'InStock','width' => '50px'],
                ['data' => 'product_sku', 'name' => 'product_sku', 'title' => 'SKU','width' => '50px'],
                ['data' => 'action', 'name' => 'action', 'title' => '&nbsp','width' => '50px','sortable' => false],
            ])->parameters([
                'dom'           => 'Blfrtip',
                'processing'    => true,
                'responsive'    => true,
                'bAutoWidth'    => false,
                'lengthMenu'    => [[5 ,10, 25, 50, -1], [5, 10, 25, 50, 'All']],
                'buttons'       => [
                    [
                        'extend'    => 'excelHtml5',
                        'title'     => 'Product_Data_'.date('Y-m-d_h-i-s')
                    ],
                    [
                        'extend'    => 'pdfHtml5',
                        'title'     => 'Product_Data_'.date('Y-m-d_h-i-s')
                    ],
                    'copy', 'print'
                ],
            ]);
            $data = [
                'pageType'      => 'product',
                'createBtnUrl'  => route('admin.product.create'),
                'pageTitle'     => 'Product Listing',
                'pageInfo'      => 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer.',
                'pageData'      => $html,
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
                 'productTitle'        => 'Product Create',
                 'productInfo'         => 'Create product',
                 'formType'            => 'create',
                 'formData'            => [],
                 'getAllParentList'    => Product::where('type','post')
                                         ->where('parent_id','0')
                                         ->pluck('name','id')
             ];
         }else{
             $data = [
                 'productTitle'         => 'Product Edit',
                 'productInfo'          => 'Update/Edit Product',
                 'formType'             => 'edit',
                 'formData'             => Product::findOrFail($id),
                 'getAllParentList'     => Product::where('type','post')
                                                ->where('id','!=',$id)
                                                ->where('parent_id','0')
                                                ->pluck('name','id')
             ];
         }
        return view('admin.products.product.form',compact('data'));
    }

    public function createUpdateRequest(Request $request, $id = 0){
        try{
            DB::table('users')->updateOrInsert([

            ]);
            return response()->json([
                'status'     => 'success',
                'message'    => 'Product Updated Successfully'
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
            Product::findOrFail($request->get('id'))->delete();
            return response()->json([
                'status'     => 'success',
                'message'    => 'Product removed successfully'
            ],200);
        }
        $data = [
            'productTitle'        => 'View Product',
            'productInfo'         => 'Here you can view the details of product.',
            'formData'            => Product::findOrFail($id),
            'getAllParentList'    => []
        ];
        return view('admin.products.product.view',compact('data'));
    }
}
