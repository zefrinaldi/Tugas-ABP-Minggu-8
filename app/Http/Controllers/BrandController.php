<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;

class BrandController extends Controller
{
    public function index(Request $req){
        // $list = Brand::all();
        // return view("brand.index", compact('list'));
        if ($req->ajax()) {
  
            $list = Brand::withCount('product')->withcount(['gudang' => function($query) {
                $query->select(Brand::raw('count(distinct(gudang_id))'));
            }])->get();
  
            return Datatables::of($list)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBrand">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBrand">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('brand.index');

    }

    public function create(){
        return view("brand.create");
    }

    public function store(Request $req){

        // $brand = new Brand();
        // $brand->nama_brand = $req->nama_brand;
        // $brand->save();

        // return redirect("brand");

        Brand::updateOrCreate([
            'id' => $req->brand_id
        ],
        [
            'nama_brand' => $req->nama_brand, 
        ]);        

        return response()->json([
            'success'=>'Brand saved successfully.'
        ]);
    }

    public function edit($id){
        //$detail = Product::where("id", $id)->first();
        // $detail = Brand::find($id);

        // return view("brand.edit", compact('detail'));

        $brand = Brand::find($id);
        return response()->json($brand);
    }

    public function update($id,Request $req){

        $cek = Brand::find($id);

        if($cek){
            $cek->nama_brand = $req->nama_brand;
            $cek->save();
            return redirect("/brand");
        } else {
            echo "Data Tidak ditemukan";
        }
    }

    public function delete($id){

        // $cek = Brand::find($id);

        // if($cek) {
        //     $cek->delete();
        //     return redirect("/brand");

        // } else {

        //     echo "Data Tidak ditemukan";
        // }

        Brand::find($id)->delete();
      
        return response()->json([
            'success'=>'Brand deleted successfully.'
        ]);
    }
}
