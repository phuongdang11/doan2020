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
    $kh = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->get();
    $sp = DB::table('sanpham')->select('Id_SP', 'Ten_SP')->get();
?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Đánh giá
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('danhgia.update', $row->Id_DG) }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                {!! method_field('patch') !!}
                <div class="row form-group">
                    <div class="col-12">
                        <label  class="form-check-label ">{{ __('Đánh giá') }}</label>
                            <select name="Danh_Gia" class="form-control">
                                <option value="{{ $row->Danh_Gia }}">{{ $row->Danh_Gia }} SAO</option>
                                <option class="q"  value="1">1 SAO</option>
                                <option class="q"  value="2">2 SAO</option>
                                <option class="q"  value="3">3 SAO</option>
                                <option class="q"  value="4">4 SAO</option>
                                <option class="q"  value="5">5 SAO</option>                                 
                            </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label  class="form-check-label ">{{ __('Khách hàng') }}</label>
                            <select name="Id_KH" class="form-control">
                                <?php $kh1 = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->where('Id_KH', '=', $row->Id_KH)->first(); ?>
                                <option value="{{ $row->Id_KH }}">{{ $kh1->Ten_KH }}</option>
                                @foreach ($kh as $k)
                                    <option class="q"  value="{{ $k->Id_KH }}">{{ $k->Ten_KH }}</option>
                                @endforeach                               
                            </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label  class="form-check-label ">{{ __('Sản phẩm') }}</label>
                            <select name="Id_SP" class="form-control">
                                <?php $sp1 = DB::table('sanpham')->select('Id_SP', 'Ten_SP')->where('Id_SP', '=', $row->Id_SP)->first(); ?>
                                <option value="{{ $row->Id_SP }}">{{ $sp1->Ten_SP }}</option>
                                @foreach ($sp as $s)
                                    <option class="q"  value="{{ $s->Id_SP }}">{{ $s->Ten_SP }}</option>
                                @endforeach                                   
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