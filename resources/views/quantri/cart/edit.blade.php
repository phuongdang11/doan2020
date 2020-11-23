@extends('quantri.layoutquantri')
@section('pagetitle', 'CHỈNH SẢN PHẨM') 
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
                <form action="{{ route('cart.update', $row->Id_GH) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {!! method_field('patch') !!}
                    <div class="row form-group">
                        <div class="col-6">
                            <label  class="form-check-label mb-2">{{ __('ID sản phẩm') }}</label>
                                <select name="Id_SP" class="form-control">
                                    <?php $sp1 = DB::table('sanpham')->select('Id_SP', 'Ten_SP')->where('Id_SP', '=', $row->Id_SP)->first()?>
                                    <option value="{{ $sp1->Id_SP }}">{{ $sp1->Ten_SP }}</option>
                                    @foreach ($sp as $s)
                                        <option class="q" value="{{ $s->Id_SP }}">{{ $s->Ten_SP }}</option>
                                    @endforeach                              
                                </select>
                        </div>

                        <div class="col-6">
                            <label  class="form-check-label mb-2">{{ __('ID sản phẩm') }}</label>
                                <select name="Id_KH" class="form-control">
                                    <?php $kh1 = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->where('Id_KH', '=', $row->Id_KH)->first()?>
                                    <option value="{{$row->Id_KH}}">{{ $kh1->Ten_KH }}</option>
                                    @foreach ($kh as $k)
                                        <option class="q"  value="{{ $k->Id_KH }}">{{ $k->Ten_KH }}</option>
                                    @endforeach                              
                                </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label class="form-check-label mb-2" for="exampleCheck1">Số lượng</label>
                            <input type="number" name="So_Luong" value="{{ $row->So_Luong }}"  class="form-control">
                        </div>

                        <div class="col-4">
                            <label class="form-check-label mb-2" for="exampleCheck1">Thứ tự</label>
                            <input type="number" name="ThuTu" value="{{ $row->ThuTu }}" class="form-control">
                        </div>

                        <div class="col-4">
                            <label class="form-check-label mb-2" for="exampleCheck1">Ẩn Hiện</label>
                            <div class="col-12 form-check-inline mt-2 form-check">
                                <label for="inline-radio1" class=" ">
                                    <input type="radio" id="inline-radio1" name="AnHien" @if ($row->AnHien == 0)  checked @endif value="0" class="form-check-input">Ẩn
                                </label>
                                <label for="inline-radio2" class="l ml-20">
                                    <input type="radio" id="inline-radio2" name="AnHien" @if ($row->AnHien == 1)  checked @endif value="1" class="form-check-input">Hiện
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label  class="form-check-label mb-2">{{ __('Tên sản phẩm') }}</label>
                                <select name="Ten_SP" class="form-control">
                                        <option class="q"  value="{{ $row->Ten_SP }}">{{ $row->Ten_SP }}</option>                             
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
                        <button type="submit" class="btn btn-primary px-4 py-2">Sửa</button>
                    </div>
            </form>
            </div>
        </div>
</div>
<script type="text/javascript">
    function selectAll() {
        var blnChecked = document.getElementById("select_all_invoices").checked;
        var check_invoices = document.getElementsByClassName("check_invoice");
        var intLength = check_invoices.length;
        for(var i = 0; i < intLength; i++) {
            var check_invoice = check_invoices[i];
            check_invoice.checked = blnChecked;
        }
    }
</script>
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
        .col-12.col-md-9 img {
            width: 100px;
            margin-top: 20px;
        }
        textarea.form-control {
            height: 90px;
        }
    </style>

@endsection