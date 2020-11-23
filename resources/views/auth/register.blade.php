<?php
    $quan = DB::table('Quan')->select('Id_Q', 'Ten_Quan')->where('AnHien','=','1')->get();
?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@extends('../layoutchild')
    @include('services.backG')
<section class="ftco-section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8  ftco-animate">
                    <form method="POST" class="billing-form ftco-bg-dark p-3 p-md-5" action="{{ route('register') }}">
                        @csrf
                        <h3 class="mb-4 billing-heading">{{ __('Đăng ký thành viên') }}</h3>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số Điện Thoại</label>
                                    <input type="text" id="phone" class="form-control" placeholder="">
                                    <span class="form-message"></span>
                                </div>
                            </div> -->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label ">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="DienThoai" class="col-md-12 col-form-label ">{{ __('Dien Thoai') }}</label>

                                <div class="col-md-12">
                                    <input id="DienThoai" type="text" class="form-control" name="DienThoai" required autocomplete="new-DienThoai">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
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
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="DiaChi" class="col-md-12 col-form-label ">{{ __('Dia Chi') }}</label>

                                <div class="col-md-12">
                                    <input id="DiaChi" type="text" class="form-control" name="DiaChi" required autocomplete="new-DiaChi">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
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
                        <div class="col-md-12">
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
                        
                        <div class="col-md-12">
                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary px-4 py-3">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
</section>
<style>
    .fl{
        float: left;
    }
</style>
<script>
    function getWard() { 
    var e = document.getElementById("Quan");
    var select_zone_id = e.options[e.selectedIndex].value;
    $.ajax({ url : '/dang-ky-' + select_zone_id});
    }
</script>
