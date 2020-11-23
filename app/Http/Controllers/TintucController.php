<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\tt_to_tag;
class TintucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tt = tintuc::select('Id_TT', 'Tieu_De', 'Ngay_Dang', 'urlHinh', 'ND_dai', 'ND_ngan', 'ThuTu', 'AnHien', 'Tags', 'Id_NV')
        ->orderby('Id_TT', 'desc')->get();
        return view('quantri.tintuc.index', compact('tt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.tintuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tintuc = new tintuc([
            'Tieu_De' => $request->get('Tieu_De'),
            'Ngay_Dang' => $request->get('Ngay_Dang'),
            'urlHinh' => $request->get('urlHinh'),
            'ND_dai' => $request->get('ND_dai'),
            'ND_ngan' => $request->get('ND_ngan'),
            'AnHien' => $request->get('AnHien'),
            'ThuTu' => $request->get('ThuTu'),
            'Id_NV' => $request->get('Id_NV'),
            'Tags' => $request->get('Tags'),
        ]);


        if ($request->hasfile('urlHinh')) {
            $file = $request->file('urlHinh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('images/', $filename);
            $tintuc->urlHinh = $filename;
        }else{
            return $request;
            $tintuc->urlHinh = '';
        }
        $tintuc->save();

        $Id_Tags = $request->get('Id_Tag');
        foreach ($Id_Tags as $key => $Id_Tag) {
            $tt_to_tag = new tt_to_tag([
                'Id_TT' => $tintuc->Id_TT,
                'Id_Tag' => $Id_Tag,
            ]);
            
            $tt_to_tag->save();
        }
        session()->put('msg', 'Đã thêm tin tức thành công');
        return redirect('tintuc');
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
        $row = tintuc::find($id);
        return view('quantri.tintuc.edit', compact('row'));
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
        $tintuc = tintuc::find($id);

            $tintuc->Tieu_De = $request->get('Tieu_De');
            $tintuc->Ngay_Dang = $request->get('Ngay_Dang');
            $tintuc->ND_dai = $request->get('ND_dai');
            $tintuc->ND_ngan = $request->get('ND_ngan');
            $tintuc->ThuTu = $request->get('ThuTu');
            $tintuc->AnHien = $request->get('AnHien');
            $tintuc->Id_NV = $request->get('Id_NV');
            $tintuc->Tags = $request->get('Tags');

            if ($request->hasfile('urlHinh')) {
                $file = $request->file('urlHinh');
                $extension = $file->getClientOriginalExtension();
                $filename = time() .'.'. $extension;
                $file->move('images/', $filename);
                $tintuc->urlHinh = $filename;
            }
            $tintuc ->save();

        $tt_to_tag = tt_to_tag::where('Id_TT', '=', $tintuc->Id_TT);
        $tt_to_tag->delete();

        $Id_Tags = $request->get('Id_Tag');
        foreach ($Id_Tags as $key => $Id_Tag) {
            $tt_to_tag = new tt_to_tag([
                'Id_TT' => $tintuc->Id_TT,
                'Id_Tag' => $Id_Tag,
            ]);
        
        $tt_to_tag->save();
        }
        session()->put('msg', 'Đã cập nhật tin tức thành công');
        return redirect('tintuc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc = tintuc::find($id);
        $tintuc->delete();
        session()->put('msg', 'Đã xóa tin tức thành công');
        return redirect('tintuc');
    }
}
