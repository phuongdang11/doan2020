<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nv = nhanvien::select('Id_NV', 'Ten_NV', 'email', 'DienThoai', 'password', 'Gioi_Tinh')->orderBy('Id_NV','desc')->get();
        return view('quantri.nhanvien.index', compact('nv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.nhanvien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = new nhanvien([ 
            'Ten_NV' => $request->get('Ten_NV'),
            'email' => $request->get('email'),
            'DienThoai' => $request->get('DienThoai'),
            'password' => $request->get('password'),
            'Gioi_Tinh' => $request->get('Gioi_Tinh'),
        ]);

        $created->save();
        session()->put('msg', 'Đã thêm nhân viên thành công');
        return redirect('nhanvien');
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
        $row = nhanvien::find($id);
        return view('quantri.nhanvien.edit', compact('row'));
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
        $nv = nhanvien::find($id);
        $nv -> Ten_NV = $request->get('Ten_NV');
        $nv -> email = $request->get('email');
        $nv -> DienThoai = $request->get('DienThoai');
        $nv -> password = $request->get('password');
        $nv -> Gioi_Tinh = $request->get('Gioi_Tinh');
        $nv ->save();
        session()->put('msg', 'Đã cập nhật khách hàng thành công');
        return redirect('nhanvien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nv = nhanvien::find($id);
        $nv->delete();
        session()->put('msg', 'Đã xóa khách hàng thành công');
        return redirect('nhanvien');
    }
}
