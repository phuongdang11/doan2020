<?php
	$bestseller = DB::table('sanpham')->select('Id_SP', 'Ten_SP', 'urlHinh1', 'urlHinh2', 'urlHinh3', 'MoTa', 'Gia')
	->where('AnHien',1)->limit(4)->get(); 
?>
<section class="ftco-section ">
    	<div class="container no-pr">
    		<div class="row justify-content-center pb-3 ">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading" style="margin-bottom: 5px">Burn Coffee</span>
            <h2 class="mb-4">Thức uống được săn nhiều nhất</h2>
            <p>Được trải nghiệm nhiều loại thức uống, nhưng khách hàng vẫn ưa thích những món nước này. Đó là nguyên nhân Burn Coffee luôn cuốn hút và giữ chân khách hàng</p>
          </div>
        </div>
        <div class="row slider-product  owl-carousel  border-box">
			@foreach($bestseller as $bs)
				<div class="col-md-3 ">
					<div class="menu-entry">
							<a href="{{action("ProductController@detailproduct",['Id_SP'=>$bs->Id_SP])}}" class="img" style="background-image: url(images/{{ $bs->urlHinh1 }});"></a>
							<div class="text text-center pt-4">
								<h3><a href="{{action("ProductController@detailproduct",['Id_SP'=>$bs->Id_SP])}}">{{ $bs->Ten_SP }}</a></h3>
								{{-- <p class="mota">{{ $bs->MoTa }}</p> --}}
								<p class="price"><span>{{ $bs->Gia }} đ</span></p>
								<p><a href="{{action("ProductController@detailproduct",['Id_SP'=>$bs->Id_SP])}}" class="btn btn-primary btn-outline-primary">Chi tiết</a></p>
							</div>
						</div>
				</div>
			@endforeach
		</div>
		</div>
	</section>