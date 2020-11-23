@extends('quantri.layoutquantri')
@section('pagetitle', 'THÊM DANH MỤC') 
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
                Tags
                <small>
                    <code>*</code>
                </small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('tags.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-12">
                            <label class="form-check-label mb-2" for="exampleCheck1">Tên Tags</label>
                            <input name="Ten_Tag" type="text" class="form-control" >
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