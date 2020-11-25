<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">

                <a class="navbar-brand" href="{{ url('/qt') }}">
                    <div class="logo">
                        <img src="logoburncoffee3.png" alt="" />
                    </div>
                </a>

                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{ url('/qt') }}">
                        <i class="fas fa-chart-bar"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('loaisp.index')}}">
                        <i class="fas fa-bookmark"></i>Loại Sản Phẩm</a>
                </li>
                <li>
                    <a href="{{ route('danhmuc.index')}}">
                        <i class="fas fa-list"></i>Danh Mục</a>
                </li>
                <li>
                    <a href="{{ route('tags.index')}}">
                        <i class="fas fa-tags"></i>Tags</a>
                </li>
                <li>
                    <a href="{{ route('sanpham.index')}}">
                        <i class="fas fa-coffee"></i>Sản phẩm</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>Tài khoản</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ route('nhanvien.index')}}">Nhân viên</a>
                        </li>
                        <li>
                            <a href="{{ route('khachhang.index')}}">Khách hàng</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('tintuc.index')}}">
                        <i class="far  fa-credit-card"></i>Tin tức</a>
                </li>
                <li>
                    <a href="{{ route('binhluan.index')}}">
                        <i class="fas fa-comment"></i>Bình luận</a>
                </li>
                <li>
                    <a href="{{ route('danhgia.index')}}">
                        <i class="fas fa-star"></i>Đánh giá</a>
                </li>
                <li>
                    <a href="{{ route('cart.index')}}">
                        <i class="fas fa-star"></i>Giỏ hàng</a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-copy"></i>Hóa đơn</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ url('/qt') }}">
            <div class="logo-img">
                <img src="logoburncoffee3.png" alt="" />
            </div>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active ">
                    <a href="{{ url('/qt') }}">
                        <i class="fas fa-chart-bar"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('loaisp.index')}}">
                        <i class="fas fa-bookmark"></i>Loại Sản Phẩm</a>
                </li>
                <li>
                    <a href="{{ route('danhmuc.index')}}">
                        <i class="fas fa-list"></i>Danh Mục</a>
                </li>
                <li>
                    <a href="{{ route('tags.index')}}">
                        <i class="fas fa-tags"></i>Tags</a>
                </li>
                <li>
                    <a href="{{ route('sanpham.index')}}">
                        <i class="fas fa-coffee"></i>Sản phẩm</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>Tài khoản</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('nhanvien.index')}}">Nhân viên</a>
                        </li>
                        <li>
                            <a href="{{ route('khachhang.index')}}">Khách hàng</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('tintuc.index')}}">
                        <i class="far  fa-credit-card"></i>Tin tức</a>
                </li>
                <li>
                    <a href="{{ route('binhluan.index')}}">
                        <i class="fas fa-comment"></i>Bình luận</a>
                </li>
                <li>
                    <a href="{{ route('danhgia.index')}}">
                        <i class="fas fa-star"></i>Đánh giá</a>
                </li>
                <li>
                    <a href="{{ route('cart.index')}}">
                        <i class="fas fa-shopping-cart"></i>Giỏ hàng</a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-copy"></i>Hóa đơn</a>
                </li>

            </ul>
        </nav>
    </div>
</aside>