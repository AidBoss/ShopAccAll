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
            <div class="AccBought">
                <div class="content_accBought">
                    <h4 id="text-link-header">Lịch sử mua hàng</h4>
                    <div class="history_buy_acc" id="history_buy_acc">
                        <table class="list_acc_bought" id="text_table">
                            <tr>
                                <th>Mã tài acc: </th>
                                <th>Tên tài khoản: </th>
                                <th>Mật khẩu: </th>
                                <th>Sever: </th>
                                <th>Giá: </th>
                                <th>Ngày mua: </th>
                            </tr>
                            <tr>
                                <td>Ankdev</td>
                                <td>adminTest1@hehe.vn</td>
                                <td>VCB</td>
                                <td>120.000</td>
                                <td>Nap_01</td>
                                <td>20/6/2024</td>
                            </tr>
                            <tr>
                                <td>Ankdev</td>
                                <td>adminTest1@hehe.vn</td>
                                <td>VCB</td>
                                <td>120.000</td>
                                <td>Nap_01</td>
                                <td>20/6/2024</td>
                            </tr>
                            <tr>
                                <td>Ankdev</td>
                                <td>adminTest1@hehe.vn</td>
                                <td>VCB</td>
                                <td>120.000</td>
                                <td>Nap_01</td>
                                <td>20/6/2024</td>
                            </tr>
                            <tr>
                                <td>Ankdev</td>
                                <td>adminTest1@hehe.vn</td>
                                <td>VCB</td>
                                <td>120.000</td>
                                <td>Nap_01</td>
                                <td>20/6/2024</td>
                            </tr>
                            <tr>
                                <td>Ankdev</td>
                                <td>adminTest1@hehe.vn</td>
                                <td>VCB</td>
                                <td>120.000</td>
                                <td>Nap_01</td>
                                <td>20/6/2024</td>
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
