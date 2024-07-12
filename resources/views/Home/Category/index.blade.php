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
                <form action="" method="get">
                    @csrf
                    <h4 id="color_text_gradient">Tìm kiếm Acc</h4>
                    <div class="input_box_troll">
                        <label for="id_acc">Tìm theo mã acc</label>
                        <input class="form-control" name="id_acc" type="text" id="id_acc" />
                    </div>
                    <div class="input_box_troll">
                        @if (isset($characters) && is_object($characters))
                            <label for="characters">Nhân vật: </label>
                            <select name="characters[]" id="characters" multiple class="form-control">
                                <option hidden value=""></option>
                                @if (isset($characters) && is_object($characters))
                                    @foreach ($characters as $char)
                                        <option value="{{ $char->id }}">{{ $char->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        @endif
                    </div>
                    <div class="input_box_troll">
                        @if (isset($weapons) && is_object($weapons))
                            <label for="weapons">Vũ khí: </label>
                            <select name="weapons[]" id="weapons" multiple class="form-control">
                                <option hidden value=""></option>
                                @if (isset($weapons) && is_object($weapons))
                                    @foreach ($weapons as $weap)
                                        <option value="{{ $weap->id }}">{{ $weap->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        @endif
                    </div>
                    <div class="input_box_troll">
                        <label for="ar_acc">AR:</label>
                        <input class="form-control" type="text" id="ar_acc" name="ar_acc" />
                    </div>
                    <div class="input_box_troll">
                        <label for="space_price">Sắp xếp giá</label>
                        <select id="filterByMoney" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="10000-50000">10.000đ -> 50.000đ</option>
                            <option value="50000-100000">50.000đđ -> 100.000đ</option>
                            <option value="100000-300000">100.000đ -> 300.000đ</option>
                            <option value="300000-500000">300.000đ -> 500.000đ</option>
                            <option value="500000-2000000 ">500.000đ -> 2.000.000</option>
                            <option value="2000000+"> > 2.000.000</option>
                        </select>
                    </div>
                    <div class="input_box_troll">
                        <label for="server_acc">Sever</label>
                        <select name="server_acc" id="server_acc" class="form-control">
                            <option value=""></option>
                            <option value="Asian">Asian</option>
                            <option value="Us">Us</option>
                            <option value="Eu">Eu</option>
                            <option value="HongKong">HongKong</option>
                        </select>
                    </div>
                    <div class="input_box_troll">
                        <label for="upordown">Sắp xếp theo giá</label>
                        <select name="upordown" id="upordown" class="form-control">
                            <option value=""></option>
                            <option value="tang">Tăng dần</option>
                            <option value="giam">Giảm dần</option>
                        </select>
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
                                <a class="link_detail_acc" href="{{ route('detailAccount.index', $acc->id) }}">
                                    @if ($acc->imagesOfAccount && $acc->imagesOfAccount->isNotEmpty())
                                        <div class="img_acc">
                                            <img src="{{ asset($acc->imagesOfAccount->first()->path) }}"
                                                alt="" />
                                        </div>
                                    @endif
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
                                                <p id="infor_acc">{{ number_format($acc->price) }}</p>
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
            <div class="phantrang">
                {{ $accounts->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>

    <!-- link js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script src="{{ asset('js/admin/category.js') }}"></script>
    <script>
        new MultiSelectTag('characters') // id
        new MultiSelectTag('weapons') // id
    </script>
</body>

</html>
