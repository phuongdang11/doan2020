@extends('layoutchild')
	@include('services.backG')
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
					<div class="show">
						<img src="images/{{ $sanpham->urlHinh1 }}" class="img-fluid" alt="Colorlib Template">
						<img src="images/{{ $sanpham->urlHinh2 }}" class="img-fluid" alt="Colorlib Template">
						<img src="images/{{ $sanpham->urlHinh3 }}" class="img-fluid" alt="Colorlib Template">
					</div>
					<div class="down">
						<img src="images/{{ $sanpham->urlHinh1 }}" class="img-fluid" alt="Colorlib Template">
						<img src="images/{{ $sanpham->urlHinh2 }}" class="img-fluid" alt="Colorlib Template">
						<img src="images/{{ $sanpham->urlHinh3 }}" class="img-fluid" alt="Colorlib Template">
					</div>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					@if (Session::has('khachhang'))
					<?php
					$gh = DB::table('giohang')->select('Id_GH', 'Id_SP', 'So_Luong')->where('Id_SP', '=', $sanpham->Id_SP)->first();	
					?>
					@if ($gh->Id_SP ?? '')
					<form action="capnhatsl/{{$gh->Id_GH}}" method="POST">
						{{ csrf_field() }}
						<div class="chua" style="display: none;">
							<input type="text" name="So_LuongCN" class="form-control input-number cungsp"  id="input"/>
						</div>
						<h3> {{$sanpham->Ten_SP}}</h3>
						<p class="price"><span> {{$sanpham->Gia}} đ </span></p>
						{!! $sanpham->MoTa !!}
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex"></div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" id="minus1"  data-type="minus" data-field="">
										<i class="icon-minus"></i>
									</button>
								</span>
									<input type="text" class="form-control input-number sl1"  id="input1"/>
								<span class="input-group-btn ml-2">
									<button type="button" id="plus1" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="icon-plus"></i>
									</button>
								</span>
							</div>
						</div>
						<button type="submit" class="btn py-3 px-4 btn-primary b" style="color: black !important;"><p>Thêm Giỏ Hàng</p></button>
					</form>
					<script>
						const minusButton = document.getElementById('minus1');
						const plusButton = document.getElementById('plus1');
						const inputField = document.getElementById('input1');
					
						minusButton.addEventListener('click', event => {
						event.preventDefault();
						const currentValue = Number(inputField.value) || 0;
						inputField.value = currentValue - 1;
						});
					
						plusButton.addEventListener('click', event => {
						event.preventDefault();
						const currentValue = Number(inputField.value) || 0;
						inputField.value = currentValue + 1;
						});
					</script>
					<script>
						document.querySelector('.sl1').value = 1;
						let sl = document.querySelector('.sl1').value;
						var slbd = {{ $gh->So_Luong }};
						tongsl = Number(slbd) + Number(sl);
						document.querySelector('.cungsp').value = tongsl;
					</script>
					@else
					<form action="giohang" method="POST">
						{{ csrf_field() }}
						<div class="chua" style="display: none;">
							<input type="text" name="Ten_SP" value="{{$sanpham->Ten_SP}}" id="">
							<input type="text" name="AnHien" value="1" id="">
							<input type="text" name="ThuTu" value="1" id="">
							<input type="text" name="Id_SP" value="{{$sanpham->Id_SP}}" id="">
							<input type="text" name="Id_KH" value="{{ Session::get('khachhang')['Id_KH'] }}" id="">
						</div>
						<h3> {{$sanpham->Ten_SP}}</h3>
						<p class="price"><span> {{$sanpham->Gia}} đ </span></p>
						{!! $sanpham->MoTa !!}
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex"></div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" id="tru"  data-type="tru" data-field="">
										<i class="icon-minus"></i>
									</button>
								</span>
								<input type="text" name="So_Luong" class="form-control input-number sl"  id="it"/>
								<span class="input-group-btn ml-2">
									<button type="button" id="cong" class="quantity-right-plus btn" data-type="cong" data-field="">
										<i class="icon-plus"></i>
									</button>
								</span>
							</div>
						</div>
						<script>
							const minusButton = document.getElementById('tru');
							const plusButton = document.getElementById('cong');
							const inputField = document.getElementById('it');
						
							minusButton.addEventListener('click', event => {
							event.preventDefault();
							const currentValue = Number(inputField.value) || 0;
							inputField.value = currentValue - 1;
							});
						
							plusButton.addEventListener('click', event => {
							event.preventDefault();
							const currentValue = Number(inputField.value) || 0;
							inputField.value = currentValue + 1;
							});
						</script>
						<button type="submit" class="btn py-3 px-4 btn-primary b" style="color: black !important;"><p>Thêm Giỏ Hàng</p></button>
					</form>
					@endif
					@else
					<h3> {{$sanpham->Ten_SP}}</h3>
						<p class="price"><span> {{$sanpham->Gia}} đ </span></p>
						<p> {{$sanpham->MoTa}}</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex"></div>
							</div>
							<div class="w-100"></div>
						</div>
						<h5>Cần <a href="/dang-nhap">Đăng Nhập</a> để thêm vào giỏ hàng</h5>
					@endif
				</div>
    		</div>
		</div>

		@include('danhgia')
</section>

<div class="slider-banner" style="background-image: url(images/BurnCoffee_Banner.jpg);">
      	<div class="overlay"></div>
        
        </div>
      </div>
@include('bestseller');
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="css/slick/slick.js"></script>
<script >
	 $('.show').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.down'
	});
	$('.down').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.show',
		dots: true,
		centerMode: true,
		focusOnSelect: true
	});
</script>
<script>
	document.querySelector('.sl').value = 1;
</script>
<script>
	const minusButton = document.getElementById('tru');
	const plusButton = document.getElementById('cong');
	const inputField = document.getElementById('it');

	minusButton.addEventListener('click', event => {
	event.preventDefault();
	const currentValue = Number(inputField.value) || 0;
	inputField.value = currentValue - 1;
	});

	plusButton.addEventListener('click', event => {
	event.preventDefault();
	const currentValue = Number(inputField.value) || 0;
	inputField.value = currentValue + 1;
	});
</script>
<style>
	.t{
		position: relative;
    	z-index: 999;
	}
	.b:hover{
		border: 1px solid #c49b63 !important;
		background: transparent;
	}
	.b:hover p{
		color: #c49b63 !important;
	}
	.card{
		background-color: unset !important;
	}
	.progress {
		height: 1.3rem !important;
	}
	.progress-bar{
		background-color: #ff9f02 !important;
	}
</style>