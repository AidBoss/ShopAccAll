<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.clineLT.head')
</head>

<body>
    <section class="wrapper">
        @include('Layout.clineLT.header')

        <!-- Phần thân trang web -->
        <section class="container_section">
            <div class="Payment">
                <div class="method_payment">
                    <h4 id="text-link-header">Chọn giao dịch</h4>
                    <p id="method_momo">VnPay</p>
                    <p id="method_bank">Bank</p>
                    <p id="method_tc">Thẻ cào</p>
                    {{-- <p id="method_history">Lịch sử nạp</p> --}}
                </div>
                <div class="content_payment">
                    <div class="momo_pay" id="momo_pay">
                        <form action="{{ route('payAuth', $user->id) }}" method="post">
                            @csrf
                            <div class="left_infor_pay">
                                <h4 id="text-link-header">Thanh toán bằng VnPay</h4>
                                <p>Thông tin tài khoản: DINH DUC ANH</p>
                                <input name="ctk" type="hidden" value="DINH DUC ANH">
                                {{-- <p>Số tài khoản: <span>0343564138</span></p>
                                <input name="stk" type="hidden" value="0343564138"> --}}
                                <p>Nội dung chuyển khoản: <span style="color: red">Nap_{{ $user->username }}</span></p>
                                <input name="ndck" type="hidden" value="Nap_{{ $user->username }}">
                                <p>Chọn mệnh giá nạp</p>
                                <select class="form-select" name="st" id="stn">
                                    <option value="10000">10.000</option>
                                    <option value="20000">20.000</option>
                                    <option value="40000">40.000</option>
                                    <option value="80000">80.000</option>
                                    <option value="100000">100.000</option>
                                    <option value="300000">300.000</option>
                                    <option value="500000">500.000</option>
                                    <option value="1000000">1.000.000</option>
                                    <option value="2000000">2.000.000</option>
                                    <option value="5000000">5.000.000</option>
                                    <option value="10000000">10.000.000</option>
                                </select>
                                <input type="hidden" id="selectSpace" name="selected_amount" value="">
                                <br>
                                <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
                            </div>
                        </form>
                        {{-- <div class="right_infor_pay"> <img class="qr_payment"
                                src="{{ asset('img/QR_Payment/Qr_momo.jpg') }}" alt=""></div> --}}

                    </div>
                    <div class="bank_pay" id="bank_pay">
                        <div class="left_infor_pay">
                            <h4 id="text-link-header">Chuyển khoản qua ngân hàng</h4>
                            <p>Thông tin tài khoản: DINH DUC ANH</p>
                            <p>Số tài khoản: <span>1020412269</span></p>
                            <p>Nội dung chuyển tiền : <span
                                    style="color: red">Nap{{ $user->id }}{{ $user->username }}</span></p>
                        </div>
                        <div class="right_infor_pay"> <img class="qr_payment"
                                src="{{ asset('img/QR_Payment/qr_bank.jpg') }}" alt=""></div>
                    </div>
                    <div class="tc_pay" id="tc_pay">
                        <div class="left_infor_pay">
                            <h4>Nạp thẻ cào</h4>
                            <h4 style="text-align: center;color: red;">Tính năng đang được bảo trì !</h4>
                            <img src="{{ asset('img/404/404.jpg') }}" alt="">
                        </div>
                        <div class="right_infor_pay"></div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="{{ asset('js/pay.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
