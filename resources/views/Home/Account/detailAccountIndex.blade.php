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
            @if (isset($account) && is_object($account))
                <div class="slider-container ">
                    <div class="slider">
                        @foreach ($account->imagesOfAccount as $image)
                            <div class="slide">
                                <img src="{{ asset($image->path) }}" alt="Hình ảnh">
                            </div>
                        @endforeach
                    </div>
                    <button class="prev-btn"><i class="fa-solid fa-circle-left"></i></button>
                    <button class="next-btn"><i class="fa-solid fa-circle-right"></i></button>
                </div>
                <div class="infor_detail_acc">
                    <h4 id="text-link-header">Thông tin tài khoản</h4>
                    <form action="{{ route('buyAcc.purchase', $account->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="idAccBuy">
                        <div class="detail_acount_buy">
                            <div class="lv_account_buy">
                                <div class="items_detail_acc">
                                    <p id="infor_acc_buy">{{ $account->id }}</p>
                                </div>
                                <div>
                                    <div class="items_detail_acc">
                                        <p>AR:</p>
                                        <p id="infor_acc_buy">{{ $account->ar }}</p>
                                    </div>
                                    <div class="items_detail_acc">
                                        <p>Sever: </p>
                                        <p id="infor_acc_buy">{{ $account->server }}</p>
                                    </div>
                                </div>
                                <div class="items_detail_acc">
                                    <p>Giá bán: </p>
                                    <p id="infor_acc_buy">{{ number_format($account->price) }}</p>
                                </div>
                                <div class="items_detail_acc">
                                    <p>Tình trạng: </p>
                                    <p id="infor_acc_buy">{{ $account->status == '1' ? 'Chưa bán' : 'Đã bán' }}</p>
                                </div>
                                <button id="btn_buy_now" type="submit">Mua ngay</button>
                            </div>
                        </div>
                    </form>
            @endif
        </section>
        <!-- kết thúc Phần thân trang web -->

        @include('Layout.clineLT.footer')
    </section>

    <!-- link js -->
    <script src="{{ asset('js/sliderDetailAccount.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
