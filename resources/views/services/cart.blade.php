@extends('../layoutchild')
	@include('services.backG')
@if (Session::has('khachhang'))
<link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<?php
	$cart = DB::table('giohang')->select('Id_GH', 'Id_SP', 'So_Luong', 'Id_Kh')
	->where('Id_KH', '=', Session::get('khachhang')['Id_KH'])->get();
?>
<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Sản phẩm</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Tổng</th>
						      </tr>
						    </thead>
						    <tbody>
							@foreach ($cart as $c)
								<?php
									$showsp = DB::table('sanpham')->select('Id_SP', 'Ten_SP', 'urlHinh1', 'Gia')->where('Id_SP', '=', $c->Id_SP)->first();
								?>
								<tr class="text-center s">
									<td class="product-remove"><a href="delete/{{ $c->Id_GH }}" onclick="return confirm('Bạn có chắc muốn xóa ?');"><span class="icon-close"></span></a></td>
									
									<td class="image-prod"><div class="img" style="background-image:url(images/{{ $showsp->urlHinh1 }});"></div></td>
									
									<td class="product-name">
										<h3>{{ $showsp->Ten_SP }}</h3>
									</td>
									
									<td class="price">{{ $showsp->Gia }}đ</td>
									<input type="text" class="gia-{{$c->Id_SP}}" value="{{ $showsp->Gia }}" name="" id="" style="display: none;">
									
									<td class="quantity">
										<form action="capnhatsl/{{$c->Id_GH}}" method="POST">
											{{ csrf_field() }}
											<div class="input-group ">
												<input type="text" name="So_LuongCN" class="quantity form-control input-number sl-{{$c->Id_SP}}" value="{{ $c->So_Luong }}" min="1" max="100">
												<button class="btn px-3 py-3 btn-primary h" type="submit"><li class="fas fa-edit"></li></button>
											</div>
										</form>
									</td>
									<td class="total tong-{{$c->Id_SP}}" id="ccc"></td>
							  </tr>
							  <script>
									var sl = document.querySelector('.sl-{{$c->Id_SP}}').value;
									var gia =  document.querySelector('.gia-{{$c->Id_SP}}').value;
									total = sl*gia;
									document.querySelector('.tong-{{$c->Id_SP}}').innerHTML = total + 'đ';
									var str = document.getElementById("ccc").innerHTML;
								</script><!-- END TR-->
							  @endforeach
							  
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
				<div class="row justify-content-end">
					<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
						<div class="cart-total mb-3">
							<h3>Cart Totals</h3>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								<span class="tong-tien"></span>
							</p>
						</div>
						<p class="text-center"><a href="/thanh-toan" class="btn btn-primary py-3 px-4">Thanh toán</a></p>
					</div>
				</div>
				
			</div>
</section>
<script>
	var s = document.querySelectorAll('.total');
	// var totalall = s.innerHTML;
	// var res = totalall.slice(0, -1);
	var sum = 0;
	var ship = 0;
	var disc = 0;

	for (var i = 0; i < s.length; i++) {
		var totalall = s[i].innerHTML;
		var res = totalall.slice(0, -1);
		sum += Number(res);
	}
	document.querySelector('.tong-tien').innerHTML = sum + 'đ';
</script>
@include('product')
@else
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
		<div class="col-md-12 ftco-animate">
			<div class="cart-list">
				<table class="table">
					<thead class="thead-primary">
					  <tr class="text-center">
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Sản phẩm</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Tổng</th>
					  </tr>
					</thead>
					<tbody>
					
					</tbody>
				  </table>
			  </div>
		</div>
	</div>
	</div>
</section>
@include('product')
@endif
<style>
	.fa-edit{
		color: #fff;
	}
	.h{
		border-radius: 10% !important;
	}
	.h:hover{
		border: 1px #c49b63 solid !important;
	}
	.h:hover .fa-edit{
		color: #c49b63 !important;
	}
</style>