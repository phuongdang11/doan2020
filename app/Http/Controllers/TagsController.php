<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tags::select('Id_Tag', 'Ten_Tag')->orderBy('Id_Tag','desc')->get();
        return view('quantri.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = new tags([
            'Ten_Tag' => $request->get('Ten_Tag'),
        ]);

        $tags->save();
        session()->put('msg', 'Đã thêm tag thành công');
        return redirect('tags');
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
        $row = tags::find($id);
        return view('quantri.tags.edit', compact('row'));
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
        $tags = tags::find($id);
        $tags -> Ten_Tag = $request->get('Ten_Tag');
        $tags ->save();
        session()->put('msg', 'Đã cập nhật tag thành công');
        return redirect('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = tags::find($id);
        $tags->delete();
        session()->put('msg', 'Đã xóa tag thành công');
        return redirect('tags');
    }
}
