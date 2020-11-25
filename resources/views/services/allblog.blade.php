<?php
  $tintuc = DB::table('tintuc')->select('Id_TT', 'Tieu_De', 'Ngay_Dang', 'urlHinh', 'ND_ngan', 'Id_NV')
  ->orderby('ThuTu', 'asc')
  ->where('AnHien', 1)->limit(6)->get();
?>
@extends('../layoutchild')
	@include('services.backG')
  <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
              <h2 class="mb-4">tin tức và các bài viết</h2>
              <p>Cà phê luôn là nguồn cảm hứng cho mọi luồng năng lượng tích cực. Sở hữu một ly cà phê như được sống lại một con người bùng tỏa năng lượng.</p>
            </div>
          </div>
        <div class="row d-flex">
        @foreach($tintuc as $tin)
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="{{action("BlogController@blogdetail",['Id_TT'=>$tin->Id_TT])}}" class="block-20" style="background-image: url('images/{{ $tin->urlHinh }}');">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
                  <div><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tin->Id_TT])}}">{{ $tin->Ngay_Dang }}</a></div>
                  <?php
                    $nv = DB::table('nhanvien')->select('Id_NV', 'Ten_NV')
                    ->where('Id_NV','=',$tin->Id_NV)->first();
                  ?>
                  <?php
                    $bl = DB::table('binhluan')->select('Id_BL')->where('Id_TT', '=', $tin->Id_TT)->get();
                    $countbl = count($bl);
                  ?>
                  <div><a href="#">{{ $nv->Ten_NV }}</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> {{ $countbl }}</a></div>
                </div>
                <h3 class="heading mt-2" ><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tin->Id_TT])}}">{{ $tin->Tieu_De }}</a></h3>
                <div class="content-short">
                {!! $tin->ND_ngan !!}
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
<style>
    .ftco-section .slick-slide{
      padding: 10px;
    }
    .slick-prev {
      left: -25px;
      top: 40%;
    }
    .slick-next {
      right: -25px;
      top: 40%;
    }
</style>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="css/slick/slick.js"></script>
    
    