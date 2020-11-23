<?php
  $tintuc = DB::table('tintuc')->select('Id_TT', 'Tieu_De', 'Ngay_Dang', 'urlHinh', 'Id_NV')
  ->orderby('ThuTu', 'asc')
  ->where('AnHien', 1)->limit(3)->get();
?>
<div class="col-lg-4 col-md-6 mb-5 mb-md-5">
    <div class="ftco-footer-widget mb-4">
      <h2 class="ftco-heading-2">Tin tức</h2>
      @foreach ($tintuc as $tt)
      <div class="block-21 mb-4 d-flex">
        <a class="blog-img mr-4" href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}" style="background-image: url(images/{{ $tt->urlHinh }});"></a>
        <div class="text">
          <h3 class="heading"><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}">{{ $tt->Tieu_De }}</a></h3>
          <div class="meta">
            <div><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}"><span class="icon-calendar"></span> {{ $tt->Ngay_Dang }}</a></div>
            <?php
                $nv = DB::table('nhanvien')->select('Id_NV', 'Ten_NV')->where('Id_NV', '=', $tt->Id_NV)->first();
            ?>
            <div><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}"><span class="icon-person"></span> {{ $nv->Ten_NV }}</a></div>
            <?php
                $bl = DB::table('binhluan')->select('Id_BL')->where('Id_TT', '=', $tt->Id_TT)->get();
                $countbl = count($bl);
            ?>
            <div><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tt->Id_TT])}}"><span class="icon-chat"></span>{{ $countbl }}</a></div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <style>
      .ftco-footer .block-21 .text .heading {
            height: 43px;
            overflow: hidden;
        }
  </style>