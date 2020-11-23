@extends('../layoutchild')
	@include('services.backG')
<section class="ftco-section contact-section" style="    background-image: url(../images/vector.png);
    background-size: cover;
    background-repeat: no-repeat;">
		  <h2 style="text-align: center">Liên hệ ngay để được tư vấn </h2>

      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Thông tin cá nhân</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Địa chỉ:</span> 40 Chu Thiên, p. Hiệp Tân, q.Tân Phú</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Số điện thoại :</span> <a href="tel://1234567920">070 8565 9621 </a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:info@yoursite.com">phuong@gmail.com</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Website:</span> <a href="#">burncoffee.com</a></p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="#" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Họ và tên">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Địa chỉ Email">
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Tiêu đề">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Nội dung"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Gửi" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
	</section>
	<div id="map"></div>