@extends('quantri.layoutquantri')
@section('pagetitle', 'THÊM LOẠI SẢN PHẨM') 
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Tin Tức
                <small>
                    <code>*</code>
                </small>
            </div>
            <form action="{{ route('tintuc.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-pencil-square-o"></i>
                            Nội dung
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fas fa-list"></i>
                            Tags
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Khác</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body card-block">
                            
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Tiêu Đề</label>
                                        <input type="text" name="Tieu_De"  class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Ngày Đăng</label>
                                        <input type="date" name="Ngay_Dang"  class="form-control fc-datepicker" placeholder="MM/DD/YY">
                                    </div>
            
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Hình Nền</label>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="urlHinh" class="form-control-file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Nội dung tóm tắt</label>
                                        <textarea class="form-control ndn" height="50px" name="ND_ngan" id="" cols="15" rows="9"></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Thứ tự</label>
                                        <input type="number" name="ThuTu"  class="form-control">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Ẩn Hiện Tin Tức</label>
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
                                    
                                </div>
                                <?php
                                    $nv = DB::table('nhanvien')->select('Id_NV', 'Ten_NV')->get();
                                ?>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Nhân Viên Đăng</label>
                                        <select name="Id_NV" id="select" class="form-control">
                                            @foreach($nv as $n)
                                                <option value="{{ $n->Id_NV }}">{{ $n->Ten_NV }}</option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Tags</label>
                                        <input type="text" name="Tags"  class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Nội dung tổng quát</label>
                                        <textarea class="form-control" name="ND_dai" id="" cols="15" rows="15"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Tags</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <?php
                                            $tags = DB::table('Tags')->select('Id_Tag', 'Ten_Tag')->get();    
                                        ?>
                                        @foreach ($tags as $tag)
                                            <div class="checkbox">
                                                <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" style="margin-right: 20px;"  class='check_invoice' id="myCheck" name="Id_Tag[]" value="{{ $tag->Id_Tag }}" class="form-check-input">{{ $tag->Ten_Tag }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type='checkbox' style="margin-right: 20px; margin-top: 20px;" id='select_all_invoices' onclick="selectAll()"> Chọn tất cả
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary px-4 py-2">Thêm</button>
                </div>
        </form>
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
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    $('#datepickerNoOfMonths').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        numberOfMonths: 2,
    });
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
        .ndn {
            height: 90px;
        }

    </style>

@endsection