@extends('quantri.layoutquantri')
@section('pagetitle', 'CHỈNH LOẠI SẢN PHẨM') 
@section('main')
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
<?php
    $quan = DB::table('Quan')->select('Id_Q', 'Ten_Quan')->where('AnHien','=','1')->get();
?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Khách Hàng
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('khachhang.update', $row->Id_KH) }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                {!! method_field('patch') !!}
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label" for="exampleCheck1">Tên Khách Hàng</label>
                            <input type="text" name="Ten_KH" value="{{ $row->Ten_KH }}"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label class="form-check-label" for="exampleCheck1">Email</label>
                            <input type="text" name="email" value="{{ $row->email }}" class="form-control">
                        </div>

                        <div class="col-6">
                            <label class="form-check-label" for="exampleCheck1">Số Điện Thoại</label>
                            <input type="text" name="DienThoai" value="{{ $row->DienThoai }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label class="form-check-label" for="exampleCheck1">Mật Khẩu</label>
                            <input type="text" name="password" value="{{ $row->password }}" class="form-control">
                        </div>

                        <div class="col-6">
                            <label for="Gioi_Tinh" class="form-check-label ">{{ __('Gioi tinh') }}</label>
                                    <select name="Gioi_Tinh" id="Gioi_Tinh" value="{{ $row->Gioi_Tinh }}" class="form-control q">
                                        @if($row->Gioi_Tinh == 1)
                                            <option class="q"  value="{{ $row->Gioi_Tinh }}">Nam</option>                                
                                        @else
                                            <option class="q"  value="{{ $row->Gioi_Tinh }}">Nữ</option>
                                        @endif
                                            <option class="q"  value="1">Nam</option>
                                            <option class="q"  value="2">Nữ</option> 
                                    </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label" for="exampleCheck1">Địa Chỉ</label>
                            <input type="text" name="DiaChi" value="{{ $row->DiaChi }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            
                            <label for="Quan" class="form-check-label">Quận</label>
                                    <select name="Quan" id="Quan"  class="form-control">
                                        <?php
                                            $quan1 = DB::table('quan')->select('Id_Q', 'Ten_Quan')->where('Id_Q', '=', $row->Quan)->first();
                                        ?>
                                    <option  value="{{ $row->Quan }}">{{ $quan1->Ten_Quan }}</option>
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
                        <?php
                            $phuong = DB::table('phuong')->select('Id_P', 'Ten_Phuong')->where('Id_P', '=', $row->Phuong)->first();
                        ?>
                        <div class="col-6">
                            <label for="Phuong" class="form-check-label">Phường</label>
                                    <select name="Phuong" id="Phuong"  class="form-control">
                                        <option value="{{ $row->Phuong }}" id="0" value="0">{{ $phuong->Ten_Phuong }}</option>
                                    </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-20">Sửa</button>
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