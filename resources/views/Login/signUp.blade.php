<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.clineLT.head')
</head>

<body>
    <section class="wrapper">
        {{-- Phần đầu trang web --}}
        @include('Layout.clineLT.header')
        <!-- Phần thân trang web -->
        <section class="container_login">
            <div class="logo_login">
                <img src="{{ asset('img/logo/logo-whitew.png') }}" alt="" />
            </div>
            <!-- đăng nhập tài khoản -->
            <div class="form_login" id="form_login">
                <form method="POST" action="{{ route('login.dologin') }}" class="form_login_action">
                    @csrf
                    <h5 id="text_hader_SignUp" style="text-align: center">Đăng nhập</h5>
                    <label id="text-link-header">Tên tài khoản :</label>
                    <input type="text" name="userName" class="items-input" placeholder="Tài khoản..." />
                    @if ($errors->has('userName'))
                        <span class="error-message">* {{ $errors->first('userName') }}</span>
                    @endif
                    </span>
                    <label id="text-link-header" for="">Mật khẩu :</label>
                    <input type="password" name="password" class="items-input" placeholder="Mật khẩu..." />
                    @if ($errors->has('password'))
                        <span class="error-message">* {{ $errors->first('password') }}</span>
                    @endif
                    <div class="agree_security">
                        <a href="{{ route('forgetPass.index') }}" id="text_security">
                            <p id="text-link-header">Quên mật khẩu ?</p>
                        </a>
                    </div>
                    <button class="btn_login_register" id="btn_SignIn" type="submit">
                        Đăng nhập
                    </button>
                    <div class="items_footer_SignUp">
                        <a href="{{ route('home.index') }}" id="text-link-header">
                            <i class="fa-solid fa-house"></i> Trở về trang chủ
                        </a>
                        <span id="change_form_SignUp">
                            <a href="{{ route('register.index') }}" id="text-link-header">
                                <i class="fa-regular fa-registered"></i> Bạn chưa có tài khoản
                            </a>
                        </span>
                    </div>
                </form>
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>

    <!-- link js -->
    <script src="{{ asset('js/signUp.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
