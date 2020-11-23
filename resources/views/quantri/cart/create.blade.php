@extends('quantri.layoutquantri')
@section('pagetitle', 'THÊM GIỎ HÀNG') 
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
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<?php
    $sp = DB::table('sanpham')->select('Id_SP', 'Ten_SP')->get();
    $kh = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->get()
?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Giỏ Hàng
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('cart.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-6">
                            <label  class="form-check-label mb-2">{{ __('ID sản phẩm') }}</label>
                                <select name="Id_SP" class="form-control">
                                    @foreach ($sp as $s)
                                        <option class="q" value="{{ $s->Id_SP }}">{{ $s->Ten_SP }}</option>
                                    @endforeach                              
                                </select>
                        </div>

                        <div class="col-6">
                            <label  class="form-check-label mb-2">{{ __('ID sản phẩm') }}</label>
                                <select name="Id_KH" class="form-control">
                                    @foreach ($kh as $k)
                                        <option class="q"  value="{{ $k->Id_KH }}">{{ $k->Ten_KH }}</option>
                                    @endforeach                              
                                </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label class="form-check-label mb-2" for="exampleCheck1">Số lượng</label>
                            <input type="number" name="So_Luong"  class="form-control">
                        </div>

                        <div class="col-4">
                            <label class="form-check-label mb-2" for="exampleCheck1">Thứ tự</label>
                            <input type="number" name="ThuTu"  class="form-control">
                        </div>

                        <div class="col-4">
                            <label class="form-check-label mb-2" for="exampleCheck1">Ẩn Hiện</label>
                                <div class="col-12 form-check-inline mt-2 form-check">
                                    <label for="inline-radio1" class=" ">
                                        <input type="radio" id="inline-radio1" name="AnHien" value="0" class="form-check-input">Ẩn
                                    </label>
                                    <label for="inline-radio2" class=" ml-20">
                                        <input type="radio" id="inline-radio2" name="AnHien" value="1" class="form-check-input">Hiện
                                    </label>
                                </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label  class="form-check-label mb-2">{{ __('Tên sản phẩm') }}</label>
                                <select name="Ten_SP" class="form-control">
                                        <option class="q"  value=""></option>                             
                                </select>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("[name='Id_SP']").change(function() {
                                var Id_SP = $(this).val();
                                var diachi = '/cart/' + Id_SP;
                            $("[name = 'Ten_SP']").load(diachi);
                            });
                        });
                    </script>
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