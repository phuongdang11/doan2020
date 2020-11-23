<?php
  $tintuc = DB::table('tintuc')->select('Id_TT', 'Tieu_De', 'Ngay_Dang', 'urlHinh', 'Id_NV')
  ->orderby('ThuTu', 'asc')
  ->where('AnHien', 1)->limit(3)->get();
?>

<div class="sidebar-box ftco-animate">
    <h3>Tin tức</h3>
    @foreach($tintuc as $tt)
    <div class="block-21 mb-4 d-flex">
        <a class="blog-img mr-4" href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}" style="background-image: url(images/{{ $tt->urlHinh }});"></a>
        <div class="text">
        <h3 class="heading"><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}">{{ $tt->Tieu_De }}</a></h3>
        <div class="meta">
            <div><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}"><span class="icon-calendar"></span> {{ $tt->Ngay_Dang }}</a></div>
        </div>
        </div>
    </div>
    @endforeach
</div>
