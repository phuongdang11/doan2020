<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\BinhLuan;
class BlogController extends Controller
{
    //
    function blog(){
        $d=array('title'=>'Tin tức');
        return view("services.allblog", $d);
    }

    function blogdetail($Id_TT){
        $d=array('title'=>'Chi Tiết Tin Tức');
        $kq = DB::table("tintuc")->where("Id_TT", $Id_TT)->where("AnHien",1)->first();
        $binhluan = DB::table("binhluan")->where("Id_TT",$Id_TT)->where("AnHien",1)->orderby('Id_BL', 'desc')->get();
        $data = ["tintuc" => $kq, 'binhluan'=>$binhluan];
        return view('services.blogdetail', $d, $data);
    }

    public function binhluan(Request $request){
        $bl = new binhluan([
            'Noi_Dung' => $request->get('Noi_Dung'),
            // 'Ngay_Dang' => $request->get('Ngay_Dang'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
            'Id_KH' => $request->get('Id_KH'),
            'Id_TT' => $request->get('Id_TT'),
        ]);
        
        $bl->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $bl = binhluan::find($id);
        $bl->delete();
        return redirect()->back();
    }

    public function capnhat(Request $request, $id){
        $bl = binhluan::find($id);
        $bl -> Noi_Dung = $request->get('Noi_Dung');
        $bl ->save();
        return redirect()->back();
    }
}
