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
            <div class="content_manager_list_user">
                <form action="{{ route('char.update', $char->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5 style="text-align: center" id="text-link-header">
                        Thêm Nhân vật
                    </h5>
                    <div class="detail_list_users">
                        @if (isset($char) && is_object($char))
                            <div class="half_infor_list_users">
                                <div class="form-group">
                                    <label for="">Ảnh Nhân Vật: </label>
                                    <div class="btn_update_cate">
                                        <img class="update_image_category" alt="" id="imagePreview"
                                            src="{{ asset($char->image) }}" />
                                        <label id="btn_change_avatar" class="btn btn-outline-info" for="avatar">Hình
                                            nhân vật</label>
                                        <input type="file" name="avatar" id="avatar" accept="image/*"
                                            class="hidden_avatar_update">
                                    </div>
                                    @if ($errors->has('avatar'))
                                        <span class="error-message">(*) {{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tên nhân vật: </label>
                                    <input type="text" value="{{ old('name', $char->name) }}" class="form-control"
                                        placeholder="{{ $char->name }}" name="name" id="" />
                                    @if ($errors->has('name'))
                                        <span class="error-message">(*) {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Thuộc loại game nào: </label>
                                    <select name="category_id" id="" class="form-control">
                                        <option hidden value="">Loại game </option>
                                        @if (isset($categories) && is_object($categories))
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $char->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->game_type }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="error-message">(*) {{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="">
                        <button id="btn_update" class="btn_detail_lUsers" type="submit">Gửi</button>
                    </div>
                    <div class="go_back">
                        <a href="{{ route('char.index') }}" class="btn btn-light"><i
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
    <script src="{{ asset('js/admin/category.js') }}"></script>
    {{-- sweet alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/updateAlert.js') }}"></script>
</body>

</html>
