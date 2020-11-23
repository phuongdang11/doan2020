<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhgia;

class DanhgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dg = danhgia::select('Id_DG', 'Danh_Gia', 'Id_SP', 'Id_KH')->orderBy('Id_DG','desc')->get();
        return view('quantri.danhgia.index', compact('dg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.danhgia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dg = new danhgia([
            'Danh_Gia' => $request->get('Danh_Gia'),
            'Id_KH' => $request->get('Id_KH'),
            'Id_SP' => $request->get('Id_SP'),
        ]);

        $dg->save();
        
        session()->put('msg', 'Đã thêm đánh giá thành công');
        return redirect('danhgia');
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
        $row = danhgia::find($id);
        return view('quantri.danhgia.edit', compact('row'));
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
        $dg = danhgia::find($id);
        $dg -> Danh_Gia = $request->get('Danh_Gia');
        $dg -> Id_KH = $request->get('Id_KH');
        $dg -> Id_SP = $request->get('Id_SP');
        $dg ->save();
        session()->put('msg', 'Đã cập nhật đánh giá thành công');
        return redirect('danhgia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dg = danhgia::find($id);
        $dg->delete();
        session()->put('msg', 'Đã xóa đánh giá thành công');
        return redirect('danhgia');
    }
}
