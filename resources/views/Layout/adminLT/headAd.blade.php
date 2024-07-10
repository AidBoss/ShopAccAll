<section class="header">
    <!-- logo -->
    <div class="header-upper-half">
        <nav class="navbar navbar-expand-lg bg-transparent p-0">
            <div class="container container_home">
                <a class="navbar-brand" href="{{ route('home.index') }}" style="height: 70px"><img id="logo_web"
                        src="{{ asset('img/logo/logo-white.png') }}" alt="" /></a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            Aidboss
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body flex-column d-flex p-lg-0 flex-lg-row p-4 justify-content-between">
                        <ul class="lists_sd navbar-nav justify-content-around fs-6 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" id="text-link-header" aria-current="page"
                                    href="{{ route('dashboad.index') }}">Quản lý tài khoản</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" id="navbarDropdown" aria-current="page"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"
                                    style="
                                           background: linear-gradient(
                                               to bottom right,
                                               #ff1493,
                                               #00bfff
                                           );
                                           -webkit-background-clip: text;
                                           background-clip: text;
                                           color: transparent;
                                       ">Quản
                                    lý tài khoản game</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a href="{{ route('category.index') }}" class="dropdown-item"
                                            id="text-link-header">Loại Tài Khoản Game</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('account.index') }}" class="dropdown-item"
                                            id="text-link-header">Danh Sách Tài Khoản</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('char.index') }}" class="dropdown-item"
                                            id="text-link-header">Danh Sách Nhân Vật</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('weapon.index') }}" class="dropdown-item"
                                            id="text-link-header">Danh Sách Vũ Khí</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="text-link-header" aria-current="page"
                                    href="{{ route('recharge.index') }}">Quản lý Lịch sử nạp</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="text-link-header" aria-current="page"
                                    href="tonghop.html">Tổng hợp</a>
                            </li>
                        </ul>
                        <div class="login-header d-flex flex-lg-row justify-content-center align-items-center gap-3">
                            @if (Auth::check())
                                <div class="item_avata_login">
                                    <img src="{{ asset('img/avata/avata.jpg') }}" alt="" />
                                    <div class="actions">
                                        <div class="half_actions">
                                            <p id="name_acc">{{ Auth::user()->username }}</p>
                                            {{-- <p id="name_acc">Số tiền: <span
                                                    style="color: red">{{ Auth::user()->balance }}đ</span></p> --}}
                                            <a style="color: red" href="{{ route('logout') }}">Đăng
                                                xuất</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @else
                        <!-- Nếu chưa đăng nhập -->
                        <a href="{{ route('login.index') }}" id="btn-sign a"
                            class="btn-sign text-black text-decoration-none px-3 py-1 rounded-4">Login</a>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </nav>
    </div>
    <!-- menu header -->
    <!-- <nav class="menu-header"></nav> -->
</section>
