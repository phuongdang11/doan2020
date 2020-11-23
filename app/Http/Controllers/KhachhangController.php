<?php

namespace App\Http\Controllers;
use Cache;
use Illuminate\Http\Request;
use App\Models\KhachHang;
class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kh = khachhang::select('Id_KH', 'Ten_KH', 'email', 'DienThoai', 'password', 'DiaChi', 'Gioi_Tinh', 'Quan', 'Phuong')->orderBy('Id_KH','desc')->get();
        return view('quantri.khachhang.index', compact('kh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = new khachhang([ 
            'Ten_KH' => $request->get('Ten_KH'),
            'email' => $request->get('email'),
            'DienThoai' => $request->get('DienThoai'),
            'password' => $request->get('password'),
            'DiaChi' => $request->get('DiaChi'),
            'Gioi_Tinh' => $request->get('Gioi_Tinh'),
            'Quan'=> $request->get('Quan'),
            'Phuong' => $request->get('Phuong'),
        ]);

        $created->save();
        session()->put('msg', 'Đã thêm khách hàng thành công');
        return redirect('/khachhang');
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
        $row = khachhang::find($id);
        return view('quantri.khachhang.edit', compact('row'));
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
        $kh = khachhang::find($id);
        $kh -> Ten_KH = $request->get('Ten_KH');
        $kh -> email = $request->get('email');
        $kh -> DienThoai = $request->get('DienThoai');
        $kh -> password = $request->get('password');
        $kh -> DiaChi = $request->get('DiaChi');
        $kh -> Gioi_Tinh = $request->get('Gioi_Tinh');
        $kh -> Quan = $request->get('Quan');
        $kh -> Phuong = $request->get('Phuong');
        $kh ->save();
        session()->put('msg', 'Đã cập nhật khách hàng thành công');
        return redirect('khachhang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kh = khachhang::find($id);
        $kh->delete();
        session()->put('msg', 'Đã xóa khách hàng thành công');
        return redirect('khachhang');
    }
    
}
