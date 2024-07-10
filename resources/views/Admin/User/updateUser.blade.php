<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.clineLT.head')
</head>

<body>
    <section class="wrapper">
        @include('Layout.adminLT.headAd')

        <!-- Phần thân trang web -->
        <section class="container_section">
            <div class="content_manager_list_user">
                <form action="{{ route('users.update', $users->id) }}" method="post">
                    @csrf
                    {{-- @method('PUT') --}}
                    <h5 style="text-align: center" id="text-link-header">
                        Sửa thông tin tài khoản
                    </h5>
                    <div class="detail_list_users">
                        @if (isset($users) && is_object($users))
                            <div class="half_infor_list_users">
                                <div class="form-group">
                                    <label for="">(*) Id</label>
                                    <input type="text" value="{{ old('idAcc', $users->id) }}" class="form-control"
                                        name="idAcc" id="" disabled placeholder="{{ $users->id }}" />
                                </div>
                                <div class="form-group">
                                    <label for="">(*) Avarta</label>
                                    <div class="detail_avata_login">
                                        <img src="{{ asset('img/avata/avata.jpg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Mail: </label>
                                    <input type="text" value="{{ old('maildetail', $users->email) }}"
                                        class="form-control" placeholder="{{ $users->email }}" name="maildetail"
                                        id="" />
                                    @if ($errors->has('maildetail'))
                                        <span class="error-message">(*) {{ $errors->first('maildetail') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại: </label>
                                    <input type="text" class="form-control"
                                        value="{{ old('sdtdetail', $users->phone) }}" name="sdtdetail" id=""
                                        placeholder="{{ $users->phone }}" />
                                </div>
                            </div>
                            <div class="bottom_infor_list_users">
                                <div class="form-group">
                                    <label for="">Tên tài khoản: </label>
                                    <input type="text" class="form-control"
                                        value="{{ old('userNameDetail', $users->username) }}" name="userNameDetail"
                                        id="" placeholder="{{ $users->username }}" />
                                    @if ($errors->has('userNameDetail'))
                                        <span class="error-message">(*) {{ $errors->first('userNameDetail') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">(*) Tên đăng nhập: </label>
                                    <input disabled type="text"
                                        value="{{ old('accountNameDetail', $users->account_name) }}"
                                        class="form-control" name="accountNameDetail" id=""
                                        placeholder="{{ $users->account_name }}" />
                                </div>
                                <div class="form-group">
                                    <label for="">(*) Mật khẩu: </label>
                                    <input disabled type="text" class="form-control" name="passDetail" id=""
                                        placeholder="******" />
                                </div>
                                <div class="form-group">
                                    <label for=""> Số tiền: </label>
                                    <input type="text" class="form-control"
                                        value="{{ old('moneyDetail', $users->balance) }}" name="moneyDetail"
                                        id="" placeholder="{{ $users->balance }}" />
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="">
                        <button class="btn_detail_lUsers" type="submit">Gửi</button>
                    </div>
                    <div class="go_back">
                        <a href="{{ route('dashboad.index') }}" class="btn btn-light"><i
                                class="fa-solid fa-rotate-left"></i> Trở lại</a>
                    </div>
                </form>
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
