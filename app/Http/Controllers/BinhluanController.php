<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
class BinhluanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bl = binhluan::select('Id_BL', 'Noi_Dung', 'created_at', 'AnHien', 'ThuTu', 'Id_KH', 'Id_TT')->orderBy('Id_BL','desc')->get();
        return view('quantri.binhluan.index', compact('bl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.binhluan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bl = new binhluan([
            'Noi_Dung' => $request->get('Noi_Dung'),
            // 'Ngay_Dang' => $request->get('Ngay_Dang'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
            'Id_KH' => $request->get('Id_KH'),
            'Id_TT' => $request->get('Id_TT'),
        ]);

        $bl->save();
        
        session()->put('msg', 'Đã thêm bình luận thành công');
        return redirect('binhluan');
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
        $row = binhluan::find($id);
        return view('quantri.binhluan.edit', compact('row'));
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
        $bl = binhluan::find($id);
        $bl -> Noi_Dung = $request->get('Noi_Dung');
        // $bl -> Ngay_Dang = $request->get('Ngay_Dang');
        $bl -> ThuTu = $request->get('ThuTu');
        $bl -> AnHien = $request->get('AnHien');
        $bl -> Id_KH = $request->get('Id_KH');
        $bl -> Id_TT = $request->get('Id_TT');
        $bl ->save();
        session()->put('msg', 'Đã cập nhật bình luận thành công');
        return redirect('binhluan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bl = binhluan::find($id);
        $bl->delete();
        session()->put('msg', 'Đã xóa bình luận thành công');
        return redirect('binhluan');
    }
}
