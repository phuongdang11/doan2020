@extends('quantri.layoutquantri')
@section('pagetitle', 'CHỈNH BÌNH LUẬN') 
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
                <form action="{{ route('binhluan.update', $row->Id_BL) }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                {!! method_field('patch') !!}
                <div class="row form-group">
                    <div class="col-12">
                        <label class="form-check-label mb-2" for="exampleCheck1">Nội Dung</label>
                        <input name="Noi_Dung" value="{{ $row->Noi_Dung }}" type="text" class="form-control" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label class="form-check-label mb-2" for="exampleCheck1">Thứ tự</label>
                        <input type="number" value="{{ $row->ThuTu }}" name="ThuTu"  class="form-control">
                    </div>

                    <div class="col-6">
                        <label class="form-check-label mb-2" for="exampleCheck1">Ẩn Hiện Bình Luận</label>
                        <div class="col-12 form-check-inline mt-2 form-check">
                            <label for="inline-radio1" class=" ">
                                <input type="radio" id="inline-radio1" name="AnHien" @if ($row->AnHien == 0)  checked @endif value="0" class="form-check-input">Ẩn
                            </label>
                            <label for="inline-radio2" class=" ml-20">
                                <input type="radio" id="inline-radio2" name="AnHien" @if ($row->AnHien == 1)  checked @endif value="1" class="form-check-input">Hiện
                            </label>
                        </div>
                    </div>
                </div>
                <?php
                    $kh = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->get();
                    $kht = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->where('Id_KH', '=', $row->Id_KH)->first()
                ?>
                <div class="row form-group">
                    <div class="col-6">
                        <label class="form-check-label mb-2" for="exampleCheck1">Khách hàng Đăng</label>
                        <select name="Id_KH" id="select" class="form-control">
                            <option value="{{ $row->Id_KH }}">{{ $kht->Ten_KH }}</option>
                            @foreach($kh as $k)
                                <option value="{{ $k->Id_KH }}">{{ $k->Ten_KH }}</option>
                            @endforeach
                        </select>
                    </div>
                    <?php
                        $tt = DB::table('tintuc')->select('Id_TT', 'Tieu_De')->get();
                        $ttt = DB::table('tintuc')->select('Id_TT', 'Tieu_De')->where('Id_TT', '=', $row->Id_TT)->first();
                    ?>
                    <div class="col-6">
                        <label class="form-check-label mb-2" for="exampleCheck1">Tin được bình luận</label>
                        <select name="Id_TT" id="select" class="form-control">
                            <option value="{{ $row->Id_TT }}">{{ $ttt->Tieu_De }}</option>
                            @foreach($tt as $t)
                                <option value="{{ $t->Id_TT }}">{{ $t->Tieu_De }}</option>
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