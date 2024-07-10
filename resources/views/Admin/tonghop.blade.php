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
            <div class="content_tonghop">
                <div class="SoluongAcc">
                    <div class="sla_honkai">
                        <h4 id="text-link-header">Tổng hợp Honkai</h4>
                        <p><i class="fa-solid fa-crown"></i> Số lượng đã bán:</p>
                        <p><i class="fa-solid fa-warehouse"></i> Số lượng acc còn lại:</p>
                        <p>
                            <i class="fa-solid fa-money-bill-1-wave"></i> số tiền đã bán
                            được:
                        </p>
                    </div>
                    <div class="sla_genshin">
                        <h4 id="text-link-header">Tổng hợp Genshin</h4>
                        <p><i class="fa-solid fa-crown"></i> Số lượng đã bán:</p>
                        <p><i class="fa-solid fa-warehouse"></i> Số lượng acc còn lại:</p>
                        <p>
                            <i class="fa-solid fa-money-bill-1-wave"></i> số tiền đã bán
                            được:
                        </p>
                    </div>
                    <div class="sla_honkai3">
                        <h4 id="text-link-header">Tổng hợp Honkai3</h4>
                        <p><i class="fa-solid fa-crown"></i> Số lượng đã bán:</p>
                        <p><i class="fa-solid fa-warehouse"></i> Số lượng acc còn lại:</p>
                        <p>
                            <i class="fa-solid fa-money-bill-1-wave"></i> số tiền đã bán
                            được:
                        </p>
                    </div>
                    <div class="sla_lq">
                        <h4 id="text-link-header">Tổng hợp Lq</h4>
                        <p><i class="fa-solid fa-crown"></i> Số lượng đã bán:</p>
                        <p><i class="fa-solid fa-warehouse"></i> Số lượng acc còn lại:</p>
                        <p>
                            <i class="fa-solid fa-money-bill-1-wave"></i> số tiền đã bán
                            được:
                        </p>
                    </div>
                </div>
                <div class="doanhThu">
                    <p id="tdt">Tổng doanh thu</p>
                    <p>Số tiền: <span id="tiendt">120.000.000đ</span></p>
                </div>
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="{{ asset('js/admin/qlacc.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
