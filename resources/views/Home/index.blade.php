<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.clineLT.head')
</head>

<body>
    <section class="wrapper">
        <!-- đầu trang web -->
        @include('Layout.clineLT.header')
        <!-- kết thúc đầu trang  -->
        <!-- phần thân trang chứa silder tiêu đề trang web -->
        <section class="contents">
            <!-- slider -->
            <div class="header_slider">
                <a href="#" class="control_prev"><i class="fa-solid fa-angle-left"></i></a>
                <a href="#" class="control_next"><i class="fa-solid fa-angle-right"></i></a>
                <ul class="list_slider" id="list_slider">
                    <img src="{{ asset('img/sliders/header1.jpg') }}" class="header_slider_img" id="slider_img_home"
                        alt="" />
                    <img src="{{ asset('img/sliders/header2.jpg') }}" class="header_slider_img" id="slider_img_home"
                        alt="" />
                    <img src="{{ asset('img/sliders/header3.jpg') }}" class="header_slider_img" id="slider_img_home"
                        alt="" />
                    <img src="{{ asset('img/sliders/header4.jpg') }}" class="header_slider_img" id="slider_img_home"
                        alt="" />
                    <img src="{{ asset('img/sliders/header5.jpg') }}" class="header_slider_img" id="slider_img_home"
                        alt="" />
                </ul>
            </div>
            <div class="contents-Infour">
                <div class="contents-slogan">
                    <h3 id="slogan">
                        Chào mừng bạn đến với shop Nơi cung cấp acc <br />
                        Genshin impact - Honkai Start Rall - Liên quân
                        <br />
                        <span style="color: #fc0000">Giá Cực Rẻ</span>
                    </h3>
                </div>
            </div>
            <!-- top nap -->
            <div class="top_money_video">
                <div class="top_recharge">
                    <div class="title_top_recharge">
                        <h5 style="margin: 5px">TOP NẠP THÁNG</h5>
                    </div>
                    @php
                        $n = 1;
                    @endphp
                    <div class="list_people_top_recharge">
                        @if (isset($topUsers) && is_object($topUsers))
                            @foreach ($topUsers as $user)
                                <div class="people_item">
                                    <div class="item-icon_position">{{ $n }}</div>
                                    <div class="item_avata">
                                        {{-- <img src="{{ asset('img/avata/avata.jpg') }}" alt="" /> --}}
                                        <img src="{{ $user->avatar }}" alt="" />
                                    </div>
                                    <div class="item-userName">{{ $user->username }}</div>
                                    <div class="item-title">Nạp: {{ number_format($user->balance) }} đ</div>
                                </div>
                                @php
                                    $n++;
                                @endphp
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="banner_reacharge">
                    <div class="cs_img">
                        <img style="width: 100%" src="{{ asset('img/banner sale/banner_sale.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- phần các loại acc game  -->
        <section class="list_category_acc">
            <h4 id="name_service">Danh Sách tài khoản VIP</h4>
            <div class="list_category_acc_game">
                @if (isset($category) && is_object($category))
                    @foreach ($category as $category)
                        <div class="list_category_acc_game_a1">
                            <div class="title_list_category_acc_game">
                                <h5 id="slogan">{{ $category->game_type }}</h5>
                            </div>
                            <div class="img_list_category_acc_game">
                                <img style="width: 100%" src="{{ asset($category->image) }}" alt="" />
                            </div>
                            <div class="moreAccGS">
                                <a href="{{ route('categoryHome.index', $category->id) }}" id="moreAccGS"
                                    style="--clr: #00ffff">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- phần loại ramdom acc game -->
        <section class="list_category_acc_radom">
            <h4 id="name_service">Các Loại Acc RANDOM</h4>
            <div class="list_category_acc_game">
                @if (isset($catRandom) && is_object($catRandom))
                    @foreach ($catRandom as $cat)
                        <div class="list_category_acc_game_a1">
                            <div class="title_list_category_acc_game">
                                <h5 id="slogan">{{ $cat->game_type }}</h5>
                            </div>
                            <div class="img_list_category_acc_game">
                                <img style="width: 100%" src="{{ asset($cat->image) }}" alt="" />
                            </div>
                            <div class="moreAccGS">
                                <a href="listAcc.html" id="moreAccGS" style="--clr: #00ffff">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <section class="cacTienIch">
            <div class="cacTienIch_bank">
                <h5>Hỗ trợ các phương thức nạp:</h5>
                <div id="link_bank">
                    <i class="fa-solid fa-money-check"></i>
                    <span> Ngân hàng </span>
                </div>
                <div id="link_bank">
                    <img width="20px" src="{{ asset('img/logo/momo.png') }}" alt="" />
                    <span>Momo</span>
                </div>
            </div>
            <div class="list_tienIch">
                <div class="column_list_tienIch" id="color_text_gradient">
                    <i style="font-size: 50px" class="fa-solid fa-bag-shopping"></i>
                    <span>Sản phẩm đa dạng, cập nhật liên tục.</span>
                </div>
                <div class="column_list_tienIch" id="color_text_gradient">
                    <i style="font-size: 50px" class="fa-regular fa-circle-check"></i>
                    <span>khách hàng tin tưởng, ủng hộ.</span>
                </div>
                <div class="column_list_tienIch" id="color_text_gradient">
                    <i style="font-size: 50px" class="fa-solid fa-mobile"></i>
                    <span> Trung tâm hỗ trợ nhanh chóng, tận tình. </span>
                </div>
                <div class="column_list_tienIch" id="color_text_gradient">
                    <i style="font-size: 50px" class="fa-solid fa-heart"></i>
                    <span>Giá rẻ, uy tín, chất lượng nhất thị trường.
                    </span>
                </div>
            </div>
        </section>

        <!-- kết thúc thân trang -->

        <!-- chân trang -->
        @include('Layout.clineLT.footer')
        <!-- kết thúc thân trang -->
    </section>
    <!-- script silder home-->
    <script src="{{ asset('js/home.js') }}"></script>
    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
