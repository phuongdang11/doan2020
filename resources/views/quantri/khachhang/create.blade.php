@extends('quantri.layoutquantri')
@section('pagetitle', 'THÊM KHÁCH HÀNG') 
@section('main')
<?php
    $quan = DB::table('Quan')->select('Id_Q', 'Ten_Quan')->where('AnHien','=','1')->get();
?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                KHÁCH HÀNG
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('khachhang.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label" for="exampleCheck1">Tên Khách Hàng</label>
                            <input type="text" name="Ten_KH"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label class="form-check-label" for="exampleCheck1">Email</label>
                            <input type="text" name="email"  class="form-control">
                        </div>

                        <div class="col-6">
                            <label class="form-check-label" for="exampleCheck1">Số Điện Thoại</label>
                            <input type="text" name="DienThoai"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label class="form-check-label" for="exampleCheck1">Mật Khẩu</label>
                            <input type="text" name="password"  class="form-control">
                        </div>

                        <div class="col-6">
                            <label for="Gioi_Tinh" class="form-check-label ">{{ __('Gioi tinh') }}</label>
                                    <select name="Gioi_Tinh" id="Gioi_Tinh" class="form-control q">
                                        
                                            <option class="q"  value="1">Nam</option>
                                            <option class="q"  value="2">Nữ</option>                                 
                                         
                                    </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label" for="exampleCheck1">Địa Chỉ</label>
                            <input type="text" name="DiaChi"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="Quan" class="form-check-label">Quận</label>
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
                        </div>

                        <div class="col-6">
                            <label for="Phuong" class="form-check-label">Phường</label>
                                    <select name="Phuong" id="Phuong" class="form-control">
                                        <option id="0" value="0">Chọn Phường</option>
                                    </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-20">Thêm</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    <style>
        .ml-20{
            margin-left: 20px;
        }
        .mt-20{
            margin-top: 20px
        }
        .fl{
            float: left;
        }
    </style>

@endsection