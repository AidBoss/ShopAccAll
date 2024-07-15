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
            <!-- đổi mật khẩu  -->
            <div class="form_forgetPass" id="form_forgetPass">
                <form action="{{ route('resetPass.doResetPass', $id) }}" method="post" class="forget_form">
                    @csrf
                    <h5 id="text-link-header">Đổi mật khẩu</h5>
                    <h6>Vui lòng nhập đúng mật khẩu cũ!</h6>
                    <div class="input_box_forget">
                        <input type="password" name="passOld" id="passOld" required />
                        <label for="passOld">Mật khẩu cũ</label>
                    </div>
                    @if ($errors->has('password'))
                        <span class="error-message">* {{ $errors->first('password') }}</span>
                    @endif
                    <div class="input_box_forget">
                        <input type="password" name="passNew" id="passNew" required />
                        <label for="passNew">Mật khẩu mới</label>
                    </div>
                    @if ($errors->has('passNew'))
                        <span class="error-message">* {{ $errors->first('passNew') }}</span>
                    @endif
                    <div class="input_box_forget">
                        <input type="password" name="passNew_confirmation" id="passNew_confirmation" required />
                        <label for="passNew_confirmation">Nhập lại mật khẩu mới</label>
                    </div>
                    @if ($errors->has('passNew'))
                        <span class="error-message">* {{ $errors->first('passNew') }}</span>
                    @endif
                    <a href="{{ route('home.index') }}">
                        <span id="goback_login">
                            <p id="text-link-header">Go back login!</p>
                        </span></a>
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
