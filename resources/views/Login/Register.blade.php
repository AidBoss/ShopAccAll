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
            <!-- đăng ký tài khoản -->
            <div class="form_register" id="form_register">
                <form method="POST" action="{{ route('register.doregister') }}" class="form_register_action">
                    @csrf
                    <h5 id="text_hader_SignUp">Sign Up</h5>
                    <label id="text-link-header">Tên người dùng :</label>
                    <input type="text" name="userName" class="items-input" placeholder="Your name..." />
                    @if ($errors->has('userName'))
                        <span class="error-message">* {{ $errors->first('userName') }}</span>
                    @endif
                    <label id="text-link-header">Tên tài khoản :</label>
                    <input type="text" name="nameAccount" class="items-input" placeholder="Your user name..." />
                    @if ($errors->has('nameAccount'))
                        <span class="error-message">* {{ $errors->first('nameAccount') }}</span>
                    @endif
                    <label id="text-link-header" for="">Mật khẩu :</label>
                    <input type="password" name="password" class="items-input" placeholder="Your password..." />
                    @if ($errors->has('password'))
                        <span class="error-message">* {{ $errors->first('password') }}</span>
                    @endif
                    <label id="text-link-header" for="">Email :</label>
                    <input type="email" name="email" class="items-input" placeholder="Your email..." />
                    @if ($errors->has('email'))
                        <span class="error-message">* {{ $errors->first('email') }}</span>
                    @endif
                    <label id="text-link-header" for="">Số điện thoại :</label>
                    <input type="text" name="phone" class="items-input" placeholder="Your phone..." />
                    @if ($errors->has('phone'))
                        <span class="error-message">* {{ $errors->first('phone') }}</span>
                    @endif
                    <button class="btn_login_register" id="btn_SignUp" type="submit">
                        Đăng ký
                    </button>
                    <div class="items_footer_SignUp">
                        <span id="change_form_login">
                            <a href="{{ route('login.index') }}" id="text-link-header"><i
                                    class="fa-solid fa-rotate-left"></i> You have a account</a>
                        </span>
                        <a href="{{ route('home.index') }}" id="text-link-header"><i class="fa-solid fa-house"></i> Go
                            back home</a>
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
