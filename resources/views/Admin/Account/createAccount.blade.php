<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.clineLT.head')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
</head>

<body>
    <section class="wrapper">
        @include('Layout.adminLT.headAd')

        <!-- Phần thân trang web -->
        <section class="container_section">
            <div class="content_manager_list_user">
                <form action="{{ route('account.create') }}" method="post">
                    @csrf
                    <h5 style="text-align: center" id="text-link-header">
                        Thêm mới tài khoản
                    </h5>
                    <div class="detail_list_users">
                        <div class="half_infor_list_users">
                            <div class="form-group">
                                <label for="">Miêu tả acc: </label>
                                <input type="text" class="form-control" name="description" id="" />
                                @if ($errors->has('description'))
                                    <span class="error-message">(*) {{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Giá tiền: </label>
                                <input type="text" class="form-control" name="price" id="" />
                            </div>
                            <div class="form-group">
                                <label for="">AR: </label>
                                <input type="text" class="form-control" name="ar" id="" />
                            </div>
                            <div class="form-group">
                                <label for="server">Server: </label>
                                <select name="server"class="form-control" id="">
                                    <option value="asian">Châu á</option>
                                    <option value="eu">Châu Âu</option>
                                    <option value="uk">Châu Mỹ</option>
                                    <option value="hongkong">Hồng kông</option>
                                </select>
                                @if ($errors->has('server'))
                                    <span class="error-message">(*) {{ $errors->first('server') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái: </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Chưa bán</option>
                                    <option value="2">Đã bán</option>
                                </select>
                            </div>
                        </div>
                        <div class="bottom_infor_list_users">
                            <div class="form-group">
                                <label for="category_id">Thuộc loại game nào: </label>
                                <select name="category_id" id="" class="form-control">
                                    <option hidden value=""></option>
                                    @if (isset($categories) && is_object($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->game_type }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="error-message">(*) {{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="character_id">Nhân vật: </label>
                                <select name="characters[]" id="characters" multiple class="form-control">
                                    <option hidden value=""></option>
                                    @if (isset($characters) && is_object($characters))
                                        @foreach ($characters as $char)
                                            <option value="{{ $char->id }}">{{ $char->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('character_id'))
                                    <span class="error-message">(*) {{ $errors->first('character_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="weapons_id">Vũ khí: </label>
                                <select name="weapons[]" id="weapons" multiple class="form-control">
                                    <option hidden value=""></option>
                                    @if (isset($weapons) && is_object($weapons))
                                        @foreach ($weapons as $weap)
                                            <option value="{{ $weap->id }}">{{ $weap->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('weapons_id'))
                                    <span class="error-message">(*) {{ $errors->first('weapons_id') }}</span>
                                @endif
                            </div>
                        </div>
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
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('characters') // id
        new MultiSelectTag('weapons') // id
    </script>
</body>

</html>
