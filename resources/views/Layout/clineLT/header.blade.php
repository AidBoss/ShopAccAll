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
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-column d-flex p-lg-0 flex-lg-row p-4 justify-content-between">
                <ul class="lists_sd navbar-nav justify-content-around fs-6 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" id="text-link-header" aria-current="page"
                            href="{{ route('home.index') }}">Shop Acc
                            Aidboss</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="text-link-header" aria-current="page" href="#">Liên hệ</a>
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
                               ">Nạp
                            tiền</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" id="text-link-header">Nạp qua ngân hàng</a>
                            </li>
                            <li>
                                <a class="dropdown-item" id="text-link-header">Nạp qua Momo</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="text-link-header" aria-current="page" href="#">Uy tín</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="text-link-header" aria-current="page"
                            href="historyBought.html">Bản tin shop</a>
                    </li>
                </ul>
                <div class="login-header d-flex flex-lg-row justify-content-center align-items-center gap-3">
                    @if (Auth::check())
                        <div class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" id="user_infor_login" aria-current="page"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                <div class="item_avata_login">
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="" />
                                    <div class="actions">
                                        <div class="half_actions">
                                            <p id="name_acc">{{ Auth::user()->username }}</p>
                                            <p id="name_acc">Số tiền: <span
                                                    style="color: red">{{ Auth::user()->balance }}đ</span></p>
                                        </div>
                                        <div class="bottom_actions">
                                            <i id="text-link-header" class="fa-solid fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user_infor_login" style="margin-top: 10px;">
                                <li>
                                    <a class="dropdown-item" id="text-link-header">
                                        <img width="25" height="25"
                                            src="https://img.icons8.com/office/16/money--v1.png" alt="money--v1" /> Lịch
                                        sử nạp</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="text-link-header">
                                        <img width="25" height="25"
                                            src="https://img.icons8.com/arcade/64/activity-history.png"
                                            alt="activity-history" /> Lịch sử mua</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="text-link-header">
                                        <img width="25" height="25"
                                            src="https://img.icons8.com/color/48/change.png" alt="change" /> Đổi mật
                                        khẩu</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="text-link-header">
                                        <img width="25" height="25"
                                            src="https://img.icons8.com/cotton/64/discount--v1.png"
                                            alt="discount--v1" /> Mã giảm giá</a>
                                </li>
                                @if (Auth::check() && Auth::user()->role === '0')
                                    <li>
                                        <a class="dropdown-item" id="text-link-header"
                                            href="{{ route('dashboad.index') }}">
                                            <img width="25" height="25"
                                                src="https://img.icons8.com/ios/50/control-panel--v2.png"
                                                alt="control-panel--v2" /> Trang quản trị</a>
                                    </li>
                                @endif
                                <li>
                                    <hr>
                                    <a class="dropdown-item" style="color: red" href="{{ route('logout') }}"><img
                                            width="30" height="30"
                                            src="https://img.icons8.com/clouds/100/exit.png" alt="exit" />Đăng
                                        xuất</a>
                                </li>
                            </ul>
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
