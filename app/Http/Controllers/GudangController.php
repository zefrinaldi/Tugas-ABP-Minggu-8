<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;
use DataTables;

class GudangController extends Controller
{
    public function index(Request $req){
        $list = Gudang::with('product.brand')->get();
        // return view("gudang.index", compact('list'));

        if ($req->ajax()) {
  
            $list = Gudang::with('product.brand')->get();
  
            return Datatables::of($list)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detilModal-'.$row->id.'">Detail</a>';

   
                           $btn = $btn. ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editGudang">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteGudang">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('gudang.index',compact('list'));

    }

    public function create(){
        return view("gudang.create");
    }

    public function store(Request $req){

        // $gudang = new Gudang();
        // $gudang->nama_gudang = $req->nama_gudang;
        // $gudang->alamat_gudang = $req->alamat_gudang;
        // $gudang->save();

        // return redirect("gudang");

        Gudang::updateOrCreate([
            'id' => $req->gudang_id
        ],
        [
            'nama_gudang' => $req->nama_gudang, 
            'alamat_gudang' => $req->alamat_gudang,
        ]);        

        return response()->json([
            'success'=>'Gudang saved successfully.'
        ]);
    }

    public function edit($id){
        //$detail = Product::where("id", $id)->first();
        // $detail = Gudang::find($id);

        // return view("gudang.edit", compact('detail'));

        $gudang = Gudang::find($id);
        return response()->json($gudang);
    }

    public function update($id,Request $req){

        $cek = Gudang::find($id);

        if($cek){
            $cek->nama_gudang = $req->nama_gudang;
            $cek->alamat_gudang = $req->alamat_gudang;
            $cek->save();
            return redirect("/gudang");
        } else {
            echo "Data Tidak ditemukan";
        }
    }

    public function delete($id){

        // $cek = Gudang::find($id);

        // if($cek) {
        //     $cek->delete();
        //     return redirect("/gudang");

        // } else {

        //     echo "Data Tidak ditemukan";
        // }

        Gudang::find($id)->delete();
      
        return response()->json([
            'success'=>'Gudang deleted successfully.'
        ]);
    }
}
