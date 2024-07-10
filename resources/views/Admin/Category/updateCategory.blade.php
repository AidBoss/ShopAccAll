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
                @if (isset($category) && is_object($category))
                    <form action="{{ route('updateCate.doCate', $category->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <h5 style="text-align: center" id="text-link-header">
                            Thêm mới loại tài khoản
                        </h5>
                        <div class="detail_list_users">
                            <div class="half_infor_list_users">
                                <div class="form-group">
                                    <label for="">Ảnh loại game: </label>
                                    <div class="btn_update_cate">
                                        <img class="update_image_category" src="{{ asset($category->image) }}"
                                            alt="" id="imagePreview" />
                                    </div>
                                    @if ($errors->has('avatar'))
                                        <span class="error-message">(*) {{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                <div class="form-roup">
                                    <label id="btn_change_avatar" class="btn btn-outline-info" for="avatar">Thay đổi
                                        hình game</label>
                                    <input type="file" value="{{ $category->image }}" name="avatar" id="avatar"
                                        accept="image/*" class="hidden_avatar_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Loại game: </label>
                                    <input type="text" value="{{ old('name', $category->game_type) }}"
                                        class="form-control" placeholder="" name="name" id=""
                                        placeholder ="{{ $category->game_type }}" />
                                    @if ($errors->has('name'))
                                        <span class="error-message">(*) {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Số lượng: </label>
                                    <input type="text"value="{{ old('quantity', $category->quantity) }}"
                                        class="form-control" name="quantity" id=""
                                        placeholder ="{{ $category->quantity }}" />
                                    @if ($errors->has('quantity'))
                                        <span class="error-message">(*) {{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button id="btn_update" class="btn_detail_lUsers" type="submit">Gửi</button>
                        </div>
                        <div class="go_back">
                            <a href="{{ route('category.index') }}" class="btn btn-light"><i
                                    class="fa-solid fa-rotate-left"></i> Trở lại</a>
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
    <script src="{{ asset('js/admin/category.js') }}"></script>
    {{-- sweet alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/updateAlert.js') }}"></script>
</body>

</html>
