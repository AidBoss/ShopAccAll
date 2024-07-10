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
            <!-- quên mật khẩu  -->
            <div class="form_forgetPass" id="form_forgetPass">
                <form action="" method="post" class="forget_form">
                    <h5 id="text-link-header">Quên mật khẩu</h5>
                    <h6>Vui lòng nhập email và tên tài khoản bạn đã đăng ký</h6>
                    <div class="input_box_forget">
                        <input type="text" id="qmk_userName" />
                        <label for="qmk_userName">Tên tài khoản</label>
                    </div>
                    <div class="input_box_forget">
                        <input type="email" name="" id="qmk_email" />
                        <label for="qmk_email">Email của bạn </label>
                    </div>
                    <span id="goback_login">
                        <p id="text-link-header">Go back login!</p>
                    </span>
                    <div class="input_box_forget">
                        <button type="submit" class="btn_login_register" style="margin: 0 37.5%">
                            Gửi
                        </button>
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
