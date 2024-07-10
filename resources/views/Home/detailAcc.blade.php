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
            <div class="img_detail_acc">
                <img class="image_nik" src="../../assets/images/acc/acc.png" alt="" />
            </div>
            <div class="infor_detail_acc">
                <h4 id="text-link-header">Thông tin tài khoản</h4>
                <div class="detail_acount_buy">
                    <div class="lv_account_buy">
                        <div class="items_detail_acc">
                            <p id="infor_acc_buy">#20204</p>
                        </div>
                        <div>
                            <div class="items_detail_acc">
                                <p>AR:</p>
                                <p id="infor_acc_buy">60</p>
                            </div>
                            <div class="items_detail_acc">
                                <p>Sever: </p>
                                <p id="infor_acc_buy">Asia</p>
                            </div>
                        </div>
                        <div class="items_detail_acc">
                            <p>Giá bán: </p>
                            <p id="infor_acc_buy">120.000 </p>
                        </div>
                        <div class="items_detail_acc">
                            <p>Tình trạng: </p>
                            <p id="infor_acc_buy">Đã bán </p>
                        </div>
                        <button id="btn_buy_now" type="submit">Mua ngay</button>
                    </div>
                </div>
        </section>
        <!-- kết thúc Phần thân trang web -->

        @include('Layout.clineLT.footer')
    </section>

    <!-- link js -->
    <script src="../../assets/Js/signUp.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
