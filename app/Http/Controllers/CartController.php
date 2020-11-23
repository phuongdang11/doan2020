<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = giohang::select('Id_GH', 'Ten_SP', 'So_Luong', 'AnHien', 'ThuTu', 'Id_SP', 'Id_KH')
        ->orderBy('Id_GH','desc')->get();
        return view('quantri.cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.cart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = new giohang([
            'Ten_SP' => $request->get('Ten_SP'),
            'So_Luong' => $request->get('So_Luong'),
            'Id_SP' => $request->get('Id_SP'),
            'Id_KH' => $request->get('Id_KH'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
        ]);

        $cart->save();
        
        session()->put('msg', 'Đã thêm giỏ hàng thành công');
        return redirect('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = giohang::find($id);
        return view('quantri.cart.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = giohang::find($id);
        $cart -> Ten_SP = $request->get('Ten_SP');
        $cart -> So_Luong = $request->get('So_Luong');
        $cart -> Id_SP = $request->get('Id_SP');
        $cart -> Id_KH = $request->get('Id_KH');
        $cart -> ThuTu = $request->get('ThuTu');
        $cart -> AnHien = $request->get('AnHien');
        $cart ->save();
        session()->put('msg', 'Đã cập nhật giỏ hàng thành công');
        return redirect('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = giohang::find($id);
        $cart->delete();
        session()->put('msg', 'Đã xóa giỏ hàng thành công');
        return redirect('cart');
    }
}
