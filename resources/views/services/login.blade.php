@extends('../layoutchild')
    @include('services.backG')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8   ftco-animate">
                <form action="logined" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5" id="form-1">
                    {{ csrf_field() }}
                        <h3 class="mb-4 billing-heading">Đăng nhập thành viên</h3>
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Địa Chỉ Email</label>
                                    <input type="email" id="email" class="form-control" name="email"  required autocomplete="email" placeholder="">
                                    <span class="form-message"></span>
                                </div>
                            </div>

                        <div class="w-100"></div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password" placeholder="">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        @if(session()->get('msg'))
                            <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session()->get('msg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    {{ Session::forget('msg') }}
                                </button>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary py-3 px-4">Đăng nhập</button>
                </form><!-- END -->
            </div>
        </div>
    </div>
</section>
<script src="js/js.js"></script>
  <script>

    Validator({
      form: '#form-1',
      rules:[
        Validator.isEmail('#email'),
        Validator.minLength('#password', 6),
      ]
    });

  </script>