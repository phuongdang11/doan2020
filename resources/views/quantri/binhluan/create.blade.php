@extends('quantri.layoutquantri')
@section('pagetitle', 'THÊM BÌNH LUẬN') 
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Bình Luận
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('binhluan.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label mb-2" for="exampleCheck1">Nội Dung</label>
                            <input name="Noi_Dung" type="text" class="form-control" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label class="form-check-label mb-2" for="exampleCheck1">Thứ tự</label>
                            <input type="number" name="ThuTu"  class="form-control">
                        </div>

                        <div class="col-6">
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
                    <?php
                        $kh = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->get();
                        $tt = DB::table('tintuc')->select('Id_TT', 'Tieu_De')->get();
                    ?>
                    <div class="row form-group">
                        <div class="col-6">
                            <label class="form-check-label mb-2" for="exampleCheck1">Khách hàng Đăng</label>
                            <select name="Id_KH" id="select" class="form-control">
                                <option value=""></option>
                                @foreach($kh as $k)
                                    <option value="{{ $k->Id_KH }}">{{ $k->Ten_KH }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="form-check-label mb-2" for="exampleCheck1">Tin được bình luận</label>
                            <select name="Id_TT" id="select" class="form-control">
                                <option value=""></option>
                                @foreach($tt as $t)
                                    <option value="{{ $t->Id_TT }}">{{ $t->Tieu_De }}</option>
                                @endforeach
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