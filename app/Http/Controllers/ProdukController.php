<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Gudang;
use DataTables;

class ProdukController extends Controller
{
    public function index(Request $req) {
        $brand = Brand::all();
        $gudang = Gudang::all();

        // $list = Product::with('brand','gudang')->get();
        // return view("product.index", compact('list', 'brand', 'gudang'));
        if ($req->ajax()) {
  
            $list = Product::with('brand','gudang')->get();
  
            return Datatables::of($list)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('product.index', compact('brand', 'gudang'));

    }

    public function create(){
        $brand = Brand::all();
        $gudang = Gudang::all();
        return view("product.create", compact('brand', 'gudang'));
    }

    public function store(Request $req){

        //return $req->all();
        // $product = new Product();
        // $product->nama_produk = $req->nama_produk;
        // $product->stok = $req->stok;
        // $product->harga = $req->harga;
        // $product->brand_id = $req->brand_id;
        // $product->gudang_id = $req->gudang_id;
        // $product->save();

        // return redirect("product");

        Product::updateOrCreate([
            'id' => $req->product_id
        ],
        [
            'nama_produk' => $req->nama_produk, 
            'stok' => $req->stok,
            'harga' => $req->harga,
            'brand_id' => $req->brand_id,
            'gudang_id' => $req->gudang_id,
        ]);        

        return response()->json([
            'success'=>'Product saved successfully.'
        ]);
    }

    public function edit($id){
        //$detail = Product::where("id", $id)->first();
        // $brand = Brand::all();
        // $gudang = Gudang::all();

        // $detail = Product::find($id);
        // return view("product.edit", compact('detail','brand', 'gudang'));
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id,Request $req){

        $cek = Product::find($id);

        if($cek){
            $cek->nama_produk = $req->nama_produk;
            $cek->stok = $req->stok;
            $cek->brand_id = $req->brand_id;
            $cek->gudang_id = $req->gudang_id;
            $cek->save();
            return redirect("/product");
        } else {
            echo "Data Tidak ditemukan";
        }
    }

    public function delete($id){

        // $cek = Product::find($id);

        // if($cek) {
        //     $cek->delete();
        //     return redirect("/product");

        // } else {

        //     echo "Data Tidak ditemukan";
        // }
        Product::find($id)->delete();
      
        return response()->json([
            'success'=>'Product deleted successfully.'
        ]);
    }
}