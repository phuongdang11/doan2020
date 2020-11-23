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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Loại Sản Phẩm
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('loaisp.update', $row->Id_LoaiSP) }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                {!! method_field('patch') !!}
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label mb-2" for="exampleCheck1">Tên Loại Sản Phẩm</label>
                            <input name="Ten_LoaiSP" value="{{ $row->Ten_LoaiSP }}" type="text" class="form-control" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label mb-2" for="exampleCheck1">Thứ tự</label>
                            <input name="ThuTu" value="{{ $row->ThuTu }}" type="number" class="form-control" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label class="form-check-label mb-2" for="exampleCheck1">Ẩn Hiện</label>
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