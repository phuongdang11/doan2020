<?php    
$uservote = DB::table('danhgia')->select('Id_KH', 'Id_SP')->where('Id_SP', '=', $sanpham->Id_SP)->get();
$userv = count($uservote);
?>
{{-- @if (Session::has('khachhang')) --}}
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all"> 
<div class="container mt-5 t">

<div class="card">
    <div class="card-header">
        <h3>Đánh giá</h3>
        <div class="select-wrap">
            <div class="stars">
                @if (Session::has('khachhang'))
                <?php
                    $danhgia = DB::table('danhgia')->select('Id_DG', 'Danh_Gia', 'Id_SP', 'Id_KH')
                    ->where('Id_KH', '=',Session::get('khachhang')['Id_KH'])
                    ->where('Id_SP', '=', $sanpham->Id_SP)->first();
                ?>
                    @if ( $danhgia->Id_DG ?? '')
                        <form action="suadanhgia/{{$danhgia->Id_DG}}" method="POST">
                            {{ csrf_field() }}
                            <input class="star star-5" value="5" id="star-5" @if ($danhgia->Danh_Gia == 5)  checked @endif type="radio" name="Danh_Gia"/>
                                <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" value="4" id="star-4" @if ($danhgia->Danh_Gia == 4)  checked @endif type="radio" name="Danh_Gia"/>
                                <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" value="3" id="star-3" @if ($danhgia->Danh_Gia == 3)  checked @endif type="radio" name="Danh_Gia"/>
                                <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" value="2" id="star-2" @if ($danhgia->Danh_Gia == 2)  checked @endif type="radio" name="Danh_Gia"/>
                                <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" value="1" id="star-1" @if ($danhgia->Danh_Gia == 1)  checked @endif type="radio" name="Danh_Gia"/>
                                <label class="star star-1" for="star-1"></label>
                            <div style="display: none;">
                                <input class="star star-1" value="{{ $sanpham->Id_SP }}"  type="text" name="Id_SP"/>
                                <input class="star star-1" value="{{Session::get('khachhang')['Id_KH']}}"  type="text" name="Id_KH"/>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 px-5">Đánh giá</button>
                        </form>
                    @else
                        <form action="danh-gia" method="POST">
                            {{ csrf_field() }}
                            <input class="star star-5" value="5" id="star-5" type="radio" name="Danh_Gia"/>
                                <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" value="4" id="star-4" type="radio" name="Danh_Gia"/>
                                <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" value="3" id="star-3" type="radio" name="Danh_Gia"/>
                                <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" value="2" id="star-2" type="radio" name="Danh_Gia"/>
                                <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" value="1" id="star-1" type="radio" name="Danh_Gia"/>
                                <label class="star star-1" for="star-1"></label>
                            <div style="display: none;">
                                <input class="star star-1" value="{{ $sanpham->Id_SP }}"  type="text" name="Id_SP"/>
                                <input class="star star-1" value="{{Session::get('khachhang')['Id_KH']}}"  type="text" name="Id_KH"/>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 px-5">Đánh giá</button>
                        </form>
                    @endif
                @else
                    <p>Cần <a href="/dang-nhap" class="active">Đăng Nhập</a> để đánh giá</p> 
                @endif
                          
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <h1 class="text-center mt-3 tb2" id="totalRate"></h1>
            <div class="card tb">
                <form action="" class="vn" method="POST">
                    <input class="star star-5" value="5" id="rate-5" type="radio" />
                        <label class="star star-5" ></label>
                    <input class="star star-4" value="4" id="rate-4" type="radio" />
                        <label class="star star-4" ></label>
                    <input class="star star-3" value="3" id="rate-3" type="radio" />
                        <label class="star star-3" ></label>
                    <input class="star star-2" value="2" id="rate-2" type="radio" />
                        <label class="star star-2" ></label>
                    <input class="star star-1" value="1" id="rate-1" type="radio" />
                        <label class="star star-1" ></label>
                </form>
            </div>
            <h4 class="text-center vc"><li class="fas fa-user"></li> User <strong>{{ $userv }}</strong></h4>
        </div>
        <div class="col-lg-8">
            <div class="card-body">
                <p class="muted">Tổng quát 
                    <strong>Đánh Giá</strong> của người dùng :</p>
                <div class="progress mb-3">
                    <p class="kl">Tỉ lệ 5 sao</p>
                    <div class="progress-bar bg-success" id="vt5" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress mb-3">
                    <p class="kl">Tỉ lệ 4 sao</p>
                    <div class="progress-bar bg-info" id="vt4" role="progressbar"  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress mb-3">
                    <p class="kl">Tỉ lệ 3 sao</p>
                    <div class="progress-bar bg-warning" id="vt3" role="progressbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress mb-3">
                    <p class="kl">Tỉ lệ 2 sao</p>
                    <div class="progress-bar " role="progressbar" id="vt2"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress mb-3">
                    <p class="kl">Tỉ lệ 1 sao</p>
                    <div class="progress-bar bg-danger" id="vt1" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    $sall = DB::table('danhgia')->select('Danh_Gia', 'Id_SP')->where('Id_SP', '=', $sanpham->Id_SP)->get();
?>
<script>
    var totalrate = 0;
    var sum = 0;
    var arr = {!!$sall!!};
    for (let i = 0; i < arr.length; i++) {
        sum += parseFloat(arr[i]['Danh_Gia']);
    }
    var avg = sum/arr.length;
    this.totalrate = parseFloat(avg.toFixed(1));
    var bar1 = 0;
    var bar2 = 0;
    var bar3 = 0;
    var bar4 = 0;
    var bar5 = 0;
    for (let j = 0; j < arr.length; j++) {
        if (parseFloat(arr[j]['Danh_Gia']) == '1') {
            bar1 +=1;
        }
        if (parseFloat(arr[j]['Danh_Gia']) == '2') {
            bar2 +=1;
        }
        if (parseFloat(arr[j]['Danh_Gia']) == '3') {
            bar3 +=1;
        }
        if (parseFloat(arr[j]['Danh_Gia']) == '4') {
            bar4 +=1;
        }
        if (parseFloat(arr[j]['Danh_Gia']) == '5') {
            bar5 +=1;
        }
        $('#vt5').css('width', bar5+'%');
        $('#vt4').css('width', bar4+'%');
        $('#vt3').css('width', bar3+'%');
        $('#vt2').css('width', bar2+'%');
        $('#vt1').css('width', bar1+'%');
    }
    document.querySelector('#totalRate').innerHTML = totalrate;
    var rate = Math.floor(totalrate);
    document.querySelector('#rate-5').innerHTML = rate;
    if(rate == 5){var sid = $('#rate-5'); sid.attr('checked','checked');}
    if(rate == 4){var sid = $('#rate-4'); sid.attr('checked','checked');}
    if(rate == 3){var sid = $('#rate-3'); sid.attr('checked','checked');}
    if(rate == 2){var sid = $('#rate-2'); sid.attr('checked','checked');}
    if(rate == 1){var sid = $('#rate-1'); sid.attr('checked','checked');}
    
</script>

<style>
    .progress-bar { 
        font-weight: 600;
    }
    h1#totalRate {
        font-size: 100px;
    }
    .vn label.star {
        float: right;
        padding: 10px;
        font-size: 32px;
        color: #444;
        transition: all .2s;
    }
    .tb{
        margin-bottom: -15px;
    }
    .tb2{
        margin-bottom: -42px;
    }
    form.vn {
        margin: 0 auto;
    }
    .kl {
        position: absolute;
        width: 100%;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
    }
    .progress{
        position: relative;
    }   
</style>
