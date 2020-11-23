<?php
    $quan = DB::table('Quan')->select('Id_Q', 'Ten_Quan')->where('AnHien','=','1')->get();
?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@extends('../layoutchild')
    @include('services.backG')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8   ftco-animate">
                <form action="create" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5" id="form-1">
                    {{ csrf_field() }}
                        <h3 class="mb-4 billing-heading">Đăng ký thành viên</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Họ và tên</label>
                                <input type="text" name="Ten_KH" id="fullname" class="form-control" placeholder="">
                                <span class="form-message"></span>
                            </div>
                        </div>

                        <div class="w-100"></div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số Điện Thoại</label>
                                    <input type="text" name="DienThoai" id="phone" class="form-control" placeholder="">
                                    <span class="form-message"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Địa Chỉ Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="">
                                    <span class="form-message"></span>
                                </div>
                            </div>

                        <div class="w-100"></div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="">
                                <span class="form-message"></span>
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Nhập lại mật khẩu</label>
                                <input type="password" id="password_confirm" class="form-control" placeholder="">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        
                        <div class="w-100"></div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Gioi_Tinh" class="col-md-12 col-form-label ">{{ __('Gioi tinh') }}</label>

                                <div class="col-md-12">
                                    <!-- <input id="Gioi_Tinh" type="text" value="1" class="form-control" name="Gioi_Tinh" required autocomplete="new-Gioi_Tinh"> -->
                                    <select name="Gioi_Tinh" id="Gioi_Tinh" class="form-control q">
                                        
                                            <option class="q"  value="1">Nam</option>
                                            <option class="q"  value="2">Nữ</option>                                 
                                         
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="DiaChi" class="col-md-12 col-form-label ">{{ __('Dia Chi') }}</label>

                                <div class="col-md-12">
                                    <input id="DiaChi" type="text" class="form-control" name="DiaChi" required autocomplete="new-DiaChi">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Quan" class="col-md-12 col-form-label ">{{ __('Quan') }}</label>

                                <div class="col-md-12">
                                    <!-- <input id="Quan" type="text" class="form-control" name="Quan" required autocomplete="new-Quan"> -->
                                    
                                    <select name="Quan" id="Quan" class="form-control">
                                        <option  value="0">Chọn Quận</option>
                                        @foreach($quan as $q)
                                           <option value="{{ $q->Id_Q }}">{{ $q->Ten_Quan }} </option>                                 
                                        @endforeach
                                        
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("[name='Quan']").change(function() {
                                                var Id_Q = $(this).val();
                                                var diachi = '/quantophuong/' + Id_Q;
                                            $("[name = 'Phuong']").load(diachi);
                                            });
                                        });
                                    </script>
                                    <?php 
                                    //     $qtp = DB::table('quan_to_phuong')->select('Id_Q', 'Id_P')->where("Id_Q", '=' , $Id_Q)->get();
                                    // ?>
                                </div>

                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Phuong" class="col-md-12 col-form-label ">{{ __('Phuong') }}</label>
                                    <div class="col-md-12">
                                        <!-- <input id="Phuong" type="text" class="form-control" name="Phuong" required autocomplete="new-Phuong"> -->
                                    <select name="Phuong" id="Phuong" class="form-control">
                                        <option id="0" value="0">Chọn Phường</option>
                                    </select>
                                    
                                    </div>
                            </div>
                        </div>

                            <div class="w-100"></div>
                            <div class="form-group mt-4 ml-3">
                                <div class="radio">
                                    <label class="mr-3"><input type="radio" name="optradio"> Tôi đồng ý với những yêu cầu </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 px-4">Đăng ký</button>
                </form><!-- END -->
            </div>
        </div>
    </div>
</section>
<script src="js/js.js"></script>
  <script>

    Validator({
      form: '#form-1',
      rules:[
        Validator.isRequired('#fullname'),
        Validator.isEmail('#email'),
        Validator.minLength('#password', 6),
        Validator.minLength('#phone', 10),
        Validator.minLength('#address', 15),
        Validator.confirm('#password_confirm', function (){
          return document.querySelector('#form-1 #password').value;
        }, 'Mật khẩu nhập lại không chính xác'),
      ]
    });

  </script>