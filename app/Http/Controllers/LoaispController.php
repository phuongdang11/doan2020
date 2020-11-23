<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loaisp;
class LoaispController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // $search = $_GET['query'];->where('Ten_LoaiSP', 'like', '%'.$search.'%')
        $ds = loaisp::select('Id_LoaiSP', 'Ten_LoaiSP', 'AnHien', 'ThuTu')->orderBy('Id_LoaiSP','desc')->get();
        return view('quantri.loaisp.index', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.loaisp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loaisp = new loaisp([
            'Ten_LoaiSP' => $request->get('Ten_LoaiSP'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
        ]);
        $loaisp->save();
        session()->put('msg', 'Đã thêm loại sản phẩm thành công');
        return redirect('/loaisp');
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
        $row = loaisp::find($id);
        return view('quantri.loaisp.edit', compact('row'));
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
       $loaisp = loaisp::find($id);
       $loaisp -> Ten_LoaiSP = $request->get('Ten_LoaiSP');
       $loaisp -> ThuTu = $request->get('ThuTu');
       $loaisp -> AnHien = $request->get('AnHien');
       $loaisp ->save();
       session()->put('msg', 'Đã cập nhật loại sản phẩm thành công');
        return redirect('/loaisp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $loaisp = loaisp::find($id);
       $loaisp->delete();
       session()->put('msg', 'Đã xóa loại sản phẩm thành công');
        return redirect('/loaisp');
    }


}
