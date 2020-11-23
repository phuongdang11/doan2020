<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\DanhGia;
class ProductController extends Controller
{
    // 
    function product(){
        $d=array('title'=>'Sản phẩm');
        return view("services.allproduct", $d);
    }

    function detailproduct($Id_SP){
        $d=array('title'=>'Chi Tiết Sản Phẩm');
        $kq = DB::table("sanpham")->where("Id_SP", $Id_SP)->where("AnHien",1)->first();
        $data = ["sanpham" => $kq];
        return view("detailproduct", $data, $d);
    }

    function sptodm($Id_DM){
        $dmt = DB::table('danhmuc')->select('Id_DM', 'Ten_DM')->where('Id_DM', '=', $Id_DM)->first();
        $d=array('title'=>$dmt->Ten_DM);
        $std = DB::table('sp_to_dm')->select('Id_SP', 'Id_DM')->where("Id_DM", '=' , $Id_DM)->get();
        $data = ["sp_to_dm" => $std];
        return view("services.sptodm", $data,  $d);
    }

    public function danhgia(Request $request){
        $dg = new danhgia([
            'Danh_Gia' => $request->get('Danh_Gia'),
            'Id_KH' => $request->get('Id_KH'),
            'Id_SP' => $request->get('Id_SP'),
        ]);
        
        $dg->save();
        return redirect()->back();
    }

    public function suadanhgia(Request $request, $id){
        $dg = danhgia::find($id);
        $dg->Danh_Gia = $request->get('Danh_Gia');
        $dg->save();
        return redirect()->back();
    }

}
