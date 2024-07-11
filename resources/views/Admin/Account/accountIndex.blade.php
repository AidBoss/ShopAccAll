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
            <div class="content_manager_user">
                <table class="table ListUserAccount">
                    <thead>
                        <tr>
                            <th colspan="9" id="text-link-header" style="text-align: center;text-transform: uppercase;">
                                Quản lý tài khoản game
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <form action="{{ route('account.index') }}" method="get" id="filterFormMoney">
                                    <select id="filterByMoney" class="form-control">
                                        <option hidden selected>Lọc theo khoảng giá</option>
                                        <option value="">Tất cả</option>
                                        <option value="10000-50000">10.000đ -> 50.000đ</option>
                                        <option value="50000-100000">50.000đđ -> 100.000đ</option>
                                        <option value="100000-300000">100.000đ -> 300.000đ</option>
                                        <option value="300000-500000">300.000đ -> 500.000đ</option>
                                        <option value="500000+"> > 500.000đ</option>
                                        <input type="hidden" name="selectedSpaceMoney" id="selectedSpaceMoney">
                                    </select>
                                </form>
                            </th>
                            <th colspan="2">
                                <form action="{{ route('account.index') }}" method="get" id="filterFormCate">
                                    <select id="filterByCate" class="form-control">
                                        <option hidden selected>Lọc theo loại game</option>
                                        <option value="">Tất cả</option>
                                        @if (isset($categories) && is_object($categories))
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->game_type }}">
                                                    {{ $cate->game_type }}</option>
                                            @endforeach
                                        @endif
                                        <input type="hidden" name="selectedCate" id="selectedCate">
                                    </select>
                                </form>
                            </th>
                            <th colspan="2">
                                <form action="" method="get">
                                    <input type="search" value="{{ request('search') }}" name="search"
                                        id="search_infor_acc" placeholder="search" />
                                    <button type="submit" id="btn_search_ifa">Tìm kiếm</button>
                                </form>
                            </th>
                            <th colspan="1">
                                <a class="btn btn-info" href="{{ route('addAccount.index') }}">Thêm mới tài
                                    khoản</a>
                            </th>
                        </tr>
                        <tr>
                            <th class="HTextTooLong">Miêu tả</th>
                            <th>Server:</th>
                            <th>Giá tiền:</th>
                            <th class="HTextTooLong">Trạng thái:</th>
                            <th class="HTextTooLong">Nhân vật:</th>
                            <th class="HTextTooLong">Vũ khí:</th>
                            <th>Loại game:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($accounts) && is_object($accounts))
                            @foreach ($accounts as $acc)
                                <tr id="chinh_sua">
                                    <td scope="row">{{ $acc->description }}</td>
                                    <td>{{ $acc->price }}</td>
                                    <td>{{ $acc->server }}</td>
                                    <td>{{ $acc->status }}</td>
                                    <td>
                                        @foreach ($acc->characters as $character)
                                            {{ $character->name }},
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($acc->weapons as $weapon)
                                            {{ $weapon->name }},
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="HTextTooLong">{{ $acc->category->game_type }}</span>
                                    </td>
                                    <td id="formluachon">
                                        <a href="{{ route('accountUpdate.index', $acc->id) }}" id="edit_infor_users"
                                            type="button">Sửa</a>
                                        <a class="btn_delete_category" href="{{ route('account.delete', $acc->id) }}"
                                            id="remove_infor_users" type="button">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="phantrang">
                {{ $accounts->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="{{ asset('js/admin/qltk.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- sweet alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/deleteAlert.js') }}"></script>

</body>

</html>
