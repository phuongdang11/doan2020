@extends('layoutchild')
  @include('services.backG')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">{{ $tintuc->Tieu_De }}</h2>
            {{-- Chuyển thành dạng Html {{}} -> {!! !!} --}}
            {!! $tintuc->ND_dai !!}
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <?php
                  $ttt = DB::table('tt_to_tag')->select('Id_Tag', 'Id_TT')->where("Id_TT", '=' , $tintuc->Id_TT)->get();
                ?>
                @foreach ($ttt as $tag)
                  <?php
                    $tags = DB::table('tags')->select('Id_Tag', 'Ten_Tag')->where('Id_Tag', '=', $tag->Id_Tag)->get();
                  ?>
                  @foreach ($tags as $t)
                    <a href="#" class="tag-cloud-link">{{ $t->Ten_Tag }}</a>
                  @endforeach  
                @endforeach
                
                <a href="#" class="tag-cloud-link">{{ $tintuc->Tags ?? '' }}</a>
              </div>
            </div>

            <div class="pt-5 mt-5">
              <h3 class="mb-5">Bình luận</h3>
              <ul class="comment-list">
              @foreach($binhluan as $ykien)
                <?php
                    $nv = DB::table('khachhang')->select('Id_KH', 'Ten_KH')
                    ->where('Id_KH','=',$ykien->Id_KH)->first();
                ?>
                <li class="comment"  >
                  <div class="vcard bio" >
                    <img src="images/user.png
                    {{-- {{ $ykien->urlHinh ?? 'user.png'}} --}}
                    " alt="Image placeholder">
                  </div>
                  
                  <div class="comment-body" >
                    <h3>{{ $nv->Ten_KH }}</h3>
                    <div class="meta">{{ $ykien->updated_at }}</div>
                      <p>{{ $ykien->Noi_Dung }}</p>
                    @if(Session::has('khachhang') && (Session::get('khachhang')['Id_KH'] == $ykien->Id_KH))
                      <button type="submit" value="{{ $ykien->Id_BL }}" name="edit" class="btn btn-primary reply" data-toggle="modal" data-target="#{{ $ykien->Id_BL }}" data-whatever="@mdo">Sửa</button>
                      <a href="delete/{{ $ykien->Id_BL }}" onclick="return confirm('Bạn có chắc muốn xóa ?');" class="reply">Xóa</a>
                    @else
                      
                    @endif
                    <div class='modal fade' id='{{ $ykien->Id_BL }}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Sửa Bình Luận</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body' >
                              <form action="capnhat/{{ $ykien->Id_BL }}" method="POST">
                                {{ csrf_field() }}
                                <div class='form-group'>
                                  <label for='message-text' class='col-form-label'>Nội Dung :</label>
                                   <input class='form-control' name='Noi_Dung' value='{{ $ykien->Noi_Dung }}' id='message-text'>
                                 </div>
                                  <div class='modal-footer'>
                                   <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                  <button type='submit' class='btn btn-primary'>Cập nhật</button>
                                  </div>
                              </form>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </li>
                
              @endforeach
              <!-- END comment-list -->
              @if(Session::has('khachhang'))
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Phần bình luận</h3>
                <form action="binh-luan" method="POST">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Nội dung</label>
                      <input type="text" name="Noi_Dung" class="form-control">
                    </div>
                    
                    <div class="form-group" style="display: none">
                      <input type="text" name="ThuTu" value="1">
                      <input type="text" name="AnHien" value="1">
                      <input type="text" name="Id_KH" value="{{ Session::get('khachhang')['Id_KH'] }}">
                      <input type="text" name="Id_TT" value="{{ $tintuc->Id_TT }}">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn py-3 px-4 btn-primary">Post Comment</button>
                    </div>
                </form>
              </div>
            </div>
            @else
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Phần bình luận</h3>
                <h5 class="ml-4 red">Cần 
                <a href="{{ url('/dang-nhap') }}" class="active">Đăng Nhập</a>  
                  Để Bình Luận</h5>
              </div>
            </div>
            @endif
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                	<div class="icon">
	                  <span class="icon-search"></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
              </form>
            </div>
            @include('danhmuc')

            @include('blogchild')

            @include('tags')

            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
      </div>
      
      
    </section>
<style>
  .t{
    margin-top: 0.9rem !important;
  }
</style>
