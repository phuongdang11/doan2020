<?php
  $tintuc = DB::table('tintuc')->select('Id_TT', 'Tieu_De', 'Ngay_Dang', 'urlHinh', 'ND_ngan', 'Id_NV')
  ->limit(6)->get();
?>
<section class="ftco-section ">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Tin tức</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>

      <div class="row slick d-flex">
        @foreach($tintuc as $tin)
          <div class=" d-flex ftco-animate">
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
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span>{{ $countbl }}</a></div>
                </div>
                <h3 class="heading mt-2"><a href="{{action("BlogController@blogdetail",['Id_TT'=>$tin->Id_TT])}}">{{ $tin->Tieu_De }}</a></h3>
                {!! $tin->ND_ngan !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
        <!-- <div class="row mt-5">
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
        </div> -->
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
  <script>
    $(".slick").slick({
      // dots: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      infinite:true,
      responsive: [
        {
        breakpoint: 767,
        settings: {
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          }
        },
      ],
    });
  </script>   
    