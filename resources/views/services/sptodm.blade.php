@extends('../layoutchild')
  @include('services.backG')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
          <span class="subheading" style="margin-bottom: 5px">Burn Coffee</span>
        <h2 class="mb-4">Thức uống ưa thích</h2>
        <p>Được trải nghiệm nhiều loại thức uống, nhưng khách hàng vẫn ưa thích những món nước này. Đó là nguyên nhân Burn Coffee luôn cuốn hút và giữ chân khách hàng</p>
      </div>
    </div>
    <div class="row border-box">
      <?php
        foreach($sp_to_dm as $dm){
            $sanpham = DB::table('sanpham')->select('Id_SP', 'Ten_SP', 'urlHinh1', 'Gia')->where("Id_SP", '=' ,$dm->Id_SP )->get();
            foreach ($sanpham as $key => $p) {
              echo"
                <div class='col-md-3'>
                    <div class='menu-entry'>
                          <a href='san-pham-$p->Id_SP' class='img' style='background-image: url(images/$p->urlHinh1);'></a>
                          <div class='text text-center pt-4'>
                              <h3><a href='san-pham-$p->Id_SP'> $p->Ten_SP </a></h3>
                              <p class='price'><span> $p->Gia  đ</span></p>
                              <p><a href='#' class='btn btn-primary btn-outline-primary'>Add to Cart</a></p>
                          </div>
                      </div>
                </div>
              ";
            }
          }
      ?>
    </div>
    </div>
</section>

<section>
	<div class="slider-banner" style="background-image: url(images/BurnCoffee_Banner.jpg);">
      	<div class="overlay"></div>
        
        </div>
      </div>
	</section>