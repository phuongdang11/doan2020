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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Sản Phẩm
                <small>
                    <code>*</code>
                </small>
            </div>
            
                <form action="{{ route('sanpham.update', $row->Id_SP) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {!! method_field('patch') !!}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nội dung</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Danh mục</a>
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
                                        <label class="form-check-label mb-2" for="exampleCheck1">Tên Loại Sản Phẩm</label>
                                        <input type="text" name="Ten_SP" value="{{ $row->Ten_SP }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Mô tả sản phẩm</label>
                                        <textarea class="form-control" value="{{ $row->MoTa }}" height="50px" name="MoTa" id="" cols="15" rows="9">{{ $row->MoTa }}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Giá sản phẩm</label>
                                        <input type="text" name="Gia" value="{{ $row->Gia }}"  class="form-control">
                                    </div>
            
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Giá khuyễn mãi</label>
                                        <input type="text" name="Gia_KM" value="{{ $row->Gia_KM }}"  class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Hình 1</label>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="urlHinh1" value="{{ $row->urlHinh1}}"  name="urlHinh1" class="form-control-file">
                                            <img src="images/{{ $row->urlHinh1}}" alt="">
                                        </div>
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Hình 2</label>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="urlHinh2" name="urlHinh2"  value="{{ $row->urlHinh2 }}" class="form-control-file">
                                            <img src="images/{{ $row->urlHinh2}}" alt="">
                                        </div>
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Hình 3</label>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="urlHinh3" name="urlHinh3" value="{{ $row->urlHinh3 }}" class="form-control-file">
                                            <img src="images/{{ $row->urlHinh3}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Số lượng</label>
                                        <input type="number" name="So_Luong" value="{{ $row->So_Luong }}"  class="form-control">
                                    </div>
            
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Thứ tự</label>
                                        <input type="number" value="{{ $row->ThuTu }}" name="ThuTu"  class="form-control">
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
                                <?php
                                    $loaisp = DB::table('loaisp')->select('Id_LoaiSP', 'Ten_LoaiSP')->get();
                                ?>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Loại Sản Phẩm</label>
                                        <select name="Id_LoaiSP" value="{{ $row->Id_LoaiSP }}" id="select" class="form-control">
                                        <?php
                                            $loaisptoid = DB::table('loaisp')->select('Id_LoaiSP', 'Ten_LoaiSP')->where('Id_LoaiSP', '=',  $row->Id_LoaiSP )->get();
                                        ?>
                                            @foreach($loaisptoid as $ltid)
                                            <option value="{{ $row->Id_LoaiSP }}">{{ $ltid->Ten_LoaiSP }}</option>
                                            @endforeach
                                            @foreach($loaisp as $l)
                                                <option value="{{ $l->Id_LoaiSP }}">{{ $l->Ten_LoaiSP }}</option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="col-6">
                                        <label class="form-check-label mb-2" for="exampleCheck1">Tags</label>
                                        <input type="text" name="Tags" value="{{ $row->Tags }}"  class="form-control">
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Danh mục</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <?php
                                            $arr = array();
                                                $danhmucs = DB::table('sp_to_dm')->select('Id_DM')->where('Id_SP', '=', $row->Id_SP )->get();
                                                foreach ($danhmucs as $key => $danhmuc) {
                                                    $arr[] = $danhmuc->Id_DM;
                                                }
                                                $danhmuc = DB::table('danhmuc')->select('Id_DM', 'Ten_DM')->get();    
                                            ?>
                                            @foreach ($danhmuc as $dm)
                                            <?php $checked = "";?>
                                            <?php
                                                if (in_array($dm->Id_DM, $arr)) {
                                                    $checked = "checked=\"checked\"";
                                                }
                                            ?>
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="checkbox" style="margin-right: 20px;"  class='check_invoice' id="myCheck" name="Id_DM[]" value="{{ $dm->Id_DM }}" class="form-check-input" <?=$checked;?> />{{ $dm->Ten_DM }}
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
                        <button type="submit" class="btn btn-primary px-4 py-2">Sửa</button>
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