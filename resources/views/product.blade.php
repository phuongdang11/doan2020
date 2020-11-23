<?php
	$loaisp = DB::table('LoaiSP')->select('Id_LoaiSP', 'Ten_LoaiSP')
	->orderby('ThuTu','asc')->where('AnHien','=','1')->get();
?>
<section class="ftco-menu mb-5 pb-5">
    	<div class="container">
		<div class="row justify-content-center">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading" style="margin-bottom: 5px">Burn Coffee</span>
            <h2 class="mb-4">Sản phẩm của chúng tôi</h2>
            <p>Từ hạt cà phê nguyên chất, Burn Coffee mang đến nhiều sự lựa chọn đến khách hàng khi chế biến những thức uống nhằm đem lại cảm giác mới lạ cho khách hàng thưởng thức một cách tuyệt vời nhất.</p>
          </div>
        </div>	
    		<div class="row d-md-flex border-red">
	    		<div class="col-lg-12 ftco-animate ">
		    		<div class="row ">
		          <div class="col-md-12 nav-link-wrap mb-5">
				  
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					@foreach($loaisp as $loai)
						@if ($loop->first)
							<a class="nav-link active" id="v-pills-<?= $loai->Id_LoaiSP ?>-tab" data-toggle="pill" href="#v-pills-<?= $loai->Id_LoaiSP ?>" role="tab" aria-controls="v-pills-<?= $loai->Id_LoaiSP ?>" aria-selected="true"><?= $loai->Ten_LoaiSP ?></a>
						@else
							
							<a class="nav-link" id="v-pills-<?= $loai->Id_LoaiSP ?>-tab" data-toggle="pill" href="#v-pills-<?= $loai->Id_LoaiSP ?>" role="tab" aria-controls="v-pills-<?= $loai->Id_LoaiSP ?>" aria-selected="false"><?= $loai->Ten_LoaiSP ?></a>
						@endif
					@endforeach
		            </div>
				
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate " id="v-pills-tabContent">
				@foreach($loaisp as $loai)
					@if ($loop->first)
					<div class="tab-pane fade show active" id="v-pills-<?= $loai->Id_LoaiSP ?>" role="tabpanel" aria-labelledby="v-pills-<?= $loai->Id_LoaiSP ?>-tab">
		              	<div class="row slider-product owl-carousel">
						  <?php
								$sanpham = DB::table('sanpham')->select('Id_SP', 'Ten_SP', 'urlHinh1', 'urlHinh2', 'urlHinh3' , 'MoTa', 'Gia', 'Id_LoaiSP')
								->where('Id_LoaiSP','=',$loai->Id_LoaiSP)
								->where('sanpham.AnHien','=','1')->get(); 
						  ?>
						  @foreach($sanpham as $showsp)
		              		<div class=" col-md-3">
									<div class="menu-entry">
											<a href="{{action("ProductController@detailproduct",['Id_SP'=>$showsp->Id_SP])}}" class="img" style="background-image: url(images/<?= $showsp->urlHinh1 ?>);"></a>
											<div class="text text-center pt-4">
												<h3><a href="{{action("ProductController@detailproduct",['Id_SP'=>$showsp->Id_SP])}}"><?= $showsp->Ten_SP ?></a></h3>
												{{-- <p class="mota">{{ $showsp->MoTa }}</p> --}}
												<p class="price"><span><?= $showsp->Gia ?> đ</span></p>
												<p><a href="{{action("ProductController@detailproduct",['Id_SP'=>$showsp->Id_SP])}}" class="btn btn-primary btn-outline-primary">Chi tiết</a></p>
											</div>
										</div>
						    </div>
							@endforeach
		              	</div>
		            </div>
					@else
					<div class="tab-pane fade" id="v-pills-<?= $loai->Id_LoaiSP ?>" role="tabpanel" aria-labelledby="v-pills-<?= $loai->Id_LoaiSP ?>-tab">
		              	<div class="row">
						  <?php
								$sanpham = DB::table('sanpham')->select('Id_SP', 'Ten_SP', 'urlHinh1', 'urlHinh2', 'urlHinh3' , 'MoTa', 'Gia', 'Id_LoaiSP')
								->where('Id_LoaiSP','=',$loai->Id_LoaiSP)
								->where('sanpham.AnHien','=','1')->get(); 
						  ?>
						  @foreach($sanpham as $showsp)
		              		<div class="col-md-3">
									<div class="menu-entry">
											<a href="{{action("ProductController@detailproduct",['Id_SP'=>$showsp->Id_SP])}}" class="img" style="background-image: url(images/<?= $showsp->urlHinh1 ?>);"></a>
											<div class="text text-center pt-4">
												<h3><a href="{{action("ProductController@detailproduct",['Id_SP'=>$showsp->Id_SP])}}"><?= $showsp->Ten_SP ?></a></h3>
												{{-- <p class="mota">{{ $showsp->MoTa }}</p> --}}
												<p class="price"><span><?= $showsp->Gia ?> đ</span></p>
												<p><a href="{{action("ProductController@detailproduct",['Id_SP'=>$showsp->Id_SP])}}" class="btn btn-primary btn-outline-primary">Chi tiết</a></p>
											</div>
										</div>
									<span class="ion-ios-arrow-back">
						  			<span class="ion-ios-arrow-forward">
						        </div>
							@endforeach
						  </div>
						  
		            </div>
					
					  @endif
				
				@endforeach
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
	</section>
	<script>
	
	</script>