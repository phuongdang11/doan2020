<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\sp_to_dm;
class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds = sanpham::select('Id_SP', 'Ten_SP', 'MoTa', 'Gia', 'Gia_KM', 'urlHinh1', 'urlHinh2', 'urlHinh3', 'So_Luong', 'AnHien', 'ThuTu', 'Id_LoaiSP', 'Tags')
        ->orderBy('Id_SP','desc')->get();
        return view('quantri.sanpham.index', compact('ds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.sanpham.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanpham = new sanpham([
            'Ten_SP' => $request->get('Ten_SP'),
            'MoTa' => $request->get('MoTa'),
            'Gia' => $request->get('Gia'),
            'Gia_KM' => $request->get('Gia_KM'),
            'urlHinh1' => $request->get('urlHinh1'),
            'urlHinh2' => $request->get('urlHinh2'),
            'urlHinh3' => $request->get('urlHinh3'),
            'So_luong' => $request->get('So_luong'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
            'Id_LoaiSP' => $request->get('Id_LoaiSP'),
            'Tags' => $request->get('Tags'),
        ]);


        if ($request->hasfile('urlHinh1')) {
            $file = $request->file('urlHinh1');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('images/', $filename);
            $sanpham->urlHinh1 = $filename;
        }else{
            return $request;
            $sanpham->urlHinh1 = '';
        }

        if ($request->hasfile('urlHinh2')) {
            $file = $request->file('urlHinh2');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('images/', $filename);
            $sanpham->urlHinh2 = $filename;
        }else{
            return $request;
            $sanpham->urlHinh2 = '';
        }

        if ($request->hasfile('urlHinh3')) {
            $file = $request->file('urlHinh3');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('images/', $filename);
            $sanpham->urlHinh3 = $filename;
        }else{
            return $request;
            $sanpham->urlHinh3 = '';
        }
        
        $sanpham->save();

        $Id_DMs = $request->get('Id_DM');
        foreach ($Id_DMs as $key => $Id_DM) {
            $sp_to_dm = new sp_to_dm([
                'Id_SP' => $sanpham->Id_SP,
                'Id_DM' => $Id_DM,
            ]);
            
            $sp_to_dm->save();
        }
        session()->put('msg', 'Đã thêm sản phẩm thành công');
        return redirect('/sanpham');
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
        $row = sanpham::find($id);
        return view('quantri.sanpham.edit', compact('row'));
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
        $sanpham = sanpham::find($id);

                $sanpham->Ten_SP = $request->get('Ten_SP');
                $sanpham->MoTa = $request->get('MoTa');
                $sanpham->Gia = $request->get('Gia');
                $sanpham->Gia_KM = $request->get('Gia_KM');
                $sanpham->So_Luong = $request->get('So_Luong');
                $sanpham->ThuTu = $request->get('ThuTu');
                $sanpham->AnHien = $request->get('AnHien');
                $sanpham->Id_LoaiSP = $request->get('Id_LoaiSP');
                $sanpham->Tags = $request->get('Tags');

                if ($request->hasfile('urlHinh1')) {
                    $file = $request->file('urlHinh1');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() .'.'. $extension;
                    $file->move('images/', $filename);
                    $sanpham->urlHinh1 = $filename;
                }

                if ($request->hasfile('urlHinh2')) {
                    $file = $request->file('urlHinh2');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() .'.'. $extension;
                    $file->move('images/', $filename);
                    $sanpham->urlHinh2 = $filename;
                }

                if ($request->hasfile('urlHinh3')) {
                    $file = $request->file('urlHinh3');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() .'.'. $extension;
                    $file->move('images/', $filename);
                    $sanpham->urlHinh3 = $filename;
                }
        
            $sanpham ->save();

            $sp_to_dm = sp_to_dm::where('Id_SP', '=', $sanpham->Id_SP);
            $sp_to_dm->delete();

            $Id_DMs = $request->get('Id_DM');
            foreach ($Id_DMs as $key => $Id_DM) {
                $sp_to_dm = new sp_to_dm([
                    'Id_SP' => $sanpham->Id_SP,
                    'Id_DM' => $Id_DM,
                ]);
            
            $sp_to_dm->save();
        }
            session()->put('msg', 'Đã cập nhật sản phẩm thành công');
            return redirect('/sanpham');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = sanpham::find($id);
        $sanpham->delete();
        session()->put('msg', 'Đã xóa sản phẩm thành công');
        return redirect('/sanpham');
    }
}
