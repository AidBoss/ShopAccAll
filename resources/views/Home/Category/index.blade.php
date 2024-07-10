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
            <div class="search_acc">
                <form action="">
                    <h4 id="color_text_gradient">Tìm kiếm Acc</h4>
                    <div class="input_box">
                        <input type="text" required id="id_acc" />
                        <label for="id_acc">Tìm theo mã acc</label>
                    </div>
                    <div class="input_box">
                        <input type="text" id="name_char" required />
                        <label for="name_char">Tìm theo nhân vật</label>
                    </div>
                    <div class="input_box">
                        <input type="text" id="name_weapon" required />
                        <label for="name_weapon">Tìm theo vũ khí</label>
                    </div>
                    <div class="input_box">
                        <input type="text" id="lv_char" required />
                        <label for="lv_char">Level nhân vật</label>
                    </div>
                    <div class="input_box">
                        <input type="text" id="price_acc" required />
                        <label for="price_acc">Tìm theo giá</label>
                    </div>
                    <div class="input_box">
                        <input type="text" id="space_price" required />
                        <label for="space_price">Sắp xếp giá</label>
                    </div>
                    <div class="input_box">
                        <input type="text" id="server_acc" required />
                        <label for="server_acc">Sever</label>
                    </div>
                    <div class="input_box">
                        <button type="submit">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <div class="listAcc">
                <div class="row_listAcc">
                    @if (isset($accounts) && is_object($accounts))
                        @foreach ($accounts as $acc)
                            <div class="items_acc">
                                <a class="link_detail_acc" href="detailAcc.html">
                                    <div class="img_acc">
                                        <img src="{{ asset('assets/images/acc/acc.png') }}" alt="" />
                                    </div>
                                    <div class="information_acc">
                                        <div class="title_text_acc">
                                            <p>
                                                {{ $acc->description }}
                                            </p>
                                        </div>
                                        <hr />
                                        <div class="level_server_acc" id="same_form_card">
                                            <div class="level_acc">
                                                <p>AR</p>
                                                <p id="infor_acc">{{ $acc->ar }}</p>
                                            </div>
                                            <div class="server_acc">
                                                <p>Sever</p>
                                                <p id="infor_acc">{{ $acc->server }}</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="code_price_acc" id="same_form_card">
                                            <div class="code_acc">
                                                <p>Mã account</p>
                                                <p id="infor_acc">{{ $acc->id }}</p>
                                            </div>
                                            <div class="price_acc">
                                                <p>Giá bán</p>
                                                <p id="infor_acc">{{ $acc->price }}</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="avata_character" id="same_img_infor_acc">
                                            <p>Nhân vật</p>
                                            <div class="list_char">
                                                @foreach ($acc->characters as $imgchar)
                                                    <img src="{{ asset($imgchar->image) }}" alt="" />
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="weapons" id="same_img_infor_acc">
                                            <p>Vũ khí</p>
                                            <div class="list_weapons">
                                                @foreach ($acc->weapons as $imgweap)
                                                    <img src="{{ asset($imgweap->image) }}" alt="" />
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
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
