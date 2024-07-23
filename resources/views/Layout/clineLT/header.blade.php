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
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle"role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" id="navbarDropdown" aria-current="page" href="#"
                            style="background: linear-gradient(
                                       to bottom right,
                                       #ff1493,
                                       #00bfff
                                   );
                                   -webkit-background-clip: text;
                                   background-clip: text;
                                   color: transparent;">Liên
                            hệ</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item"
                                    href="https://www.messenger.com/login.php?next=https%3A%2F%2Fwww.messenger.com%2Ft%2F100039476863072%2F"
                                    id="text-link-header">Messenger</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="https://www.facebook.com/profile.php?id=100039476863072"
                                    id="text-link-header">Facebook</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="https://zalo.me/0343564138"
                                    id="text-link-header">Zalo</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        @if (Auth::check())
                            <a class="nav-link active" href="{{ route('rechargeMoney.index', Auth::id()) }}"
                                id="text-link-header" aria-current="page" href="#">Nạp
                                tiền</a>
                        @else
                            <a class="nav-link active" href="{{ route('login.index') }}" id="text-link-header"
                                aria-current="page" href="#">Nạp
                                tiền</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="text-link-header" aria-current="page" href="#">Uy tín</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="text-link-header" aria-current="page">Bản tin shop</a>
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
                                                    style="color: red">{{ number_format(Auth::user()->balance) }}đ</span>
                                            </p>
                                        </div>
                                        <div class="bottom_actions">
                                            <i id="text-link-header" class="fa-solid fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user_infor_login" style="margin-top: 10px;">
                                <li>
                                    <a class="dropdown-item" href="{{ route('rechargeHistories', Auth::id()) }}"
                                        id="text-link-header">
                                        <img width="25" height="25"
                                            src="https://img.icons8.com/office/16/money--v1.png" alt="money--v1" />
                                        Lịch
                                        sử nạp</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('purchaseHistory.index', Auth::id()) }}"
                                        id="text-link-header">
                                        <img width="25" height="25"
                                            src="https://img.icons8.com/arcade/64/activity-history.png"
                                            alt="activity-history" /> Lịch sử mua</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('resetPass.index', Auth::id()) }}"
                                        id="text-link-header">
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
