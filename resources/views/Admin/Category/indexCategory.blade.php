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
                <div class="doanhThu">
                    <p id="tdt">Thêm mới loại sản phẩm</p>
                    <div class="btn_category">
                        <a href="{{ route('addcategory.index') }}" class="btn btn-info">Thêm mới </a>
                    </div>
                </div>
                <div class="category_acc">
                    @if (isset($cate) && is_object($cate))
                        @foreach ($cate as $cate)
                            <div class="sla_honkai">
                                <h4 id="text-link-header">{{ $cate->game_type }}</h4>
                                <img style="width: 100%" src="{{ asset($cate->image) }}" alt="" />
                                <p id="quantity_acc"><i class="fa-solid fa-warehouse"></i> Số lượng acc:
                                    {{ $cate->quantity }}</p>
                                <div class="btn_category">
                                    <a id="btn_edit_category" href="{{ route('updateCate.doCate', $cate->id) }}"
                                        class="btn btn-outline-warning">Sửa</a>
                                    <a href="{{ route('category.delete', $cate->id) }}"
                                        class="btn btn-outline-danger btn_delete_category">Xóa</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="{{ asset('js/admin/deleteAlert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- sweet alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/deleteAlert.js') }}"></script>
</body>

</html>
