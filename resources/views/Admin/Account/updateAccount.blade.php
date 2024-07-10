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
                @if (isset($account) && is_object($account))
                    <form action="{{ route('account.update', $account->id) }}" method="post">
                        @csrf
                        <h5 style="text-align: center" id="text-link-header">
                            Sửa thông tin tài khoản
                        </h5>
                        <div class="detail_list_users">
                            <div class="half_infor_list_users">
                                <div class="form-group">
                                    <label for="description">Miêu tả acc: </label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="{{ old('description', $account->description) }}"
                                        placeholder="Miêu tả tài khoản" />
                                    @if ($errors->has('description'))
                                        <span class="error-message">(*) {{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá tiền: </label>
                                    <input type="text" class="form-control" name="price" id="price"
                                        value="{{ old('price', $account->price) }}" placeholder="Giá tiền" />
                                </div>
                                <div class="form-group">
                                    <label for="server">Server: </label>
                                    <select name="server" class="form-control" id="server">
                                        <option value="asian" {{ $account->server == 'asian' ? 'selected' : '' }}>Châu
                                            Á</option>
                                        <option value="eu" {{ $account->server == 'eu' ? 'selected' : '' }}>Châu Âu
                                        </option>
                                        <option value="uk" {{ $account->server == 'uk' ? 'selected' : '' }}>Châu Mỹ
                                        </option>
                                        <option value="hongkong" {{ $account->server == 'hongkong' ? 'selected' : '' }}>
                                            Hồng Kông</option>
                                    </select>
                                    @if ($errors->has('server'))
                                        <span class="error-message">(*) {{ $errors->first('server') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái: </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $account->status == 1 ? 'selected' : '' }}>Chưa bán
                                        </option>
                                        <option value="2" {{ $account->status == 2 ? 'selected' : '' }}>Đã bán
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="bottom_infor_list_users">
                                <div class="form-group">
                                    <label for="category_id">Thuộc loại game: </label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option hidden value=""></option>
                                        @foreach ($category as $cate)
                                            <option value="{{ $cate->id }}"
                                                {{ $account->account_type_id == $cate->id ? 'selected' : '' }}>
                                                {{ $cate->game_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="error-message">(*) {{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="characters">Nhân vật: </label>
                                    <select name="characters[]" id="characters" multiple class="form-control">
                                        <option hidden value=""></option>
                                        @foreach ($characters as $char)
                                            <option value="{{ $char->id }}"
                                                {{ in_array($char->id, $characterIds->toArray()) ? 'selected' : '' }}>
                                                {{ $char->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('characters'))
                                        <span class="error-message">(*) {{ $errors->first('characters') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="weapons">Vũ khí: </label>
                                    <select name="weapons[]" id="weapons" multiple class="form-control">
                                        <option hidden value=""></option>
                                        @if (isset($weapons))
                                            @foreach ($weapons as $weap)
                                                <option value="{{ $weap->id }}"
                                                    {{ in_array($char->id, $weaponIds->toArray()) ? 'selected' : '' }}>
                                                    {{ $weap->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('weapons'))
                                        <span class="error-message">(*) {{ $errors->first('weapons') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button class="btn_detail_lUsers" type="submit">Gửi</button>
                        </div>
                        <div class="go_back">
                            <a href="{{ route('account.index') }}" class="btn btn-light"><i
                                    class="fa-solid fa-rotate-left"></i>
                                Trở lại</a>
                        </div>
                    </form>
                @endif

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
