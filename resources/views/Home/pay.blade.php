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
                    <p id="method_momo">Momo</p>
                    <p id="method_bank">Bank</p>
                    <p id="method_tc">Thẻ cào</p>
                    <p id="method_history">Lịch sử nạp</p>
                </div>
                <div class="content_payment">
                    <div class="momo_pay" id="momo_pay">
                        <div class="left_infor_pay">
                            <h4 id="text-link-header">Chuyển khoản qua Momo</h4>
                            <p>Thông tin tài khoản: DINH DUC ANH</p>
                            <p>Số tài khoản: <span>0343564138</span></p>
                            <p>Nội dung chuyển tiền : <span>asdasdadas</span></p>
                        </div>
                        <div class="right_infor_pay"> <img class="qr_payment"
                                src="../../assets/images/QR_Payment/Qr_momo.jpg" alt=""></div>
                    </div>
                    <div class="bank_pay" id="bank_pay">
                        <div class="left_infor_pay">
                            <h4 id="text-link-header">Chuyển khoản qua ngân hàng</h4>
                            <p>Thông tin tài khoản: DINH DUC ANH</p>
                            <p>Số tài khoản: <span>1020412269</span></p>
                            <p>Nội dung chuyển tiền : <span>asdasdadas</span></p>
                        </div>
                        <div class="right_infor_pay"> <img class="qr_payment"
                                src="../../assets/images/QR_Payment/qr_bank.jpg" alt=""></div>
                    </div>
                    <div class="tc_pay" id="tc_pay">
                        <div class="left_infor_pay">
                            <h4>Nạp thẻ cào</h4>
                            <h4 style="text-align: center;color: red;">Tính năng đang được bảo trì !</h4>
                            <img src="../../assets/images/404/404.jpg" alt="">
                            <!-- <p>Thông tin tài khoản: DINH DUC ANH</p>
                  <p>Số tài khoản: <span>1020412269</span></p>
                  <p>Nội dung chuyển tiền : <span>asdasdadas</span></p> -->
                        </div>
                        <div class="right_infor_pay"></div>
                    </div>
                    <div class="history_pay" id="history_pay">
                        <h4 id="text-link-header">Lịch sử nạp</h4>
                        <table class="list_acc_bought">
                            <tr>
                                <th>Tên acc: </th>
                                <th>Tên email: </th>
                                <th>Phương thức: </th>
                                <th>Giá: </th>
                                <th>Nội dung: </th>
                                <th>Ngày thực hiện: </th>
                            </tr>
                            <tr>
                                <td>Ankdev</td>
                                <td>adminTest1@hehe.vn</td>
                                <td>VCB</td>
                                <td>120.000</td>
                                <td>Nap_01</td>
                                <td>20/6/2024</td>
                            </tr>
                        </table>
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
    <script src="../../assets/Js/pay.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
