<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dm = danhmuc::select('Id_DM', 'Ten_DM', 'AnHien', 'ThuTu', 'updated_at')->orderBy('Id_DM','desc')->get();
        return view('quantri.danhmuc.index', compact('dm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dm = new danhmuc([
            'Ten_DM' => $request->get('Ten_DM'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
        ]);

        $dm->save();
        
        session()->put('msg', 'Đã thêm danh mục thành công');
        return redirect('danhmuc');
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
        $row = danhmuc::find($id);
        return view('quantri.danhmuc.edit', compact('row'));
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
        $dm = danhmuc::find($id);
        $dm -> Ten_DM = $request->get('Ten_DM');
        $dm -> ThuTu = $request->get('ThuTu');
        $dm -> AnHien = $request->get('AnHien');
        $dm ->save();
        session()->put('msg', 'Đã cập nhật danh mục thành công');
        return redirect('danhmuc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dm = danhmuc::find($id);
        $dm->delete();
        session()->put('msg', 'Đã xóa danh mục thành công');
        return redirect('danhmuc');
    }
}
