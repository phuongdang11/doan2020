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
                Danh Mục
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('tags.update', $row->Id_Tag) }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                {!! method_field('patch') !!}
                <div class="row form-group">
                    <div class="col-12">
                        <label class="form-check-label mb-2" for="exampleCheck1">Tên Tags</label>
                        <input name="Ten_Tag" value="{{ $row->Ten_Tag }}" type="text" class="form-control" >
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