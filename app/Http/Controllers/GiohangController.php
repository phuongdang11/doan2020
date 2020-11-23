<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
class GiohangController extends Controller
{
    function index(){
        $d=array('title'=>'Giỏ hàng');
        return view("services.cart", $d);
    }

    public function addcart(Request $request){
        $gh = new giohang([
            'Ten_SP' => $request->get('Ten_SP'),
            'So_Luong' => $request->get('So_Luong'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
            'Id_SP' => $request->get('Id_SP'),
            'Id_KH' => $request->get('Id_KH'),
        ]);
        $gh->save();
        return redirect('/gio-hang');
    }

    public function updateSL(Request $request, $id){
        $gh = giohang::find($id);
        $gh->So_Luong = $request->get('So_LuongCN');
        $gh->save();
        return redirect('/gio-hang');
    }

    public function delete(Request $request, $id){
        $gh = giohang::find($id);
        $gh->delete();
        return redirect('/gio-hang');
    }
}
