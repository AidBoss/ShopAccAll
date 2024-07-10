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
            <div class="manager_char">
                <div class="manager_char_left">
                    <form action="" method="get" id="filterForm">
                        <a class="btn btn-outline-info" data-category="Genshin Impact">Bảng weap genshin</a>
                        <a class="btn btn-outline-info" href="#" data-category="Honkai Star Rail">Bảng char
                            honkai</a>
                        <a class="btn btn-outline-info" href="#" data-category="Wuthering Waves">Bảng weap
                            Wuthering</a>
                        <input type="hidden" name="selectedCate" id="selectedCate">
                    </form>
                </div>
                <div class="content_manager_char">
                    <table class="table ListUserAccount">
                        <thead>
                            <tr>
                                <th colspan="9" id="text-link-header"
                                    style="text-align: center;text-transform: uppercase;">
                                    Quản lý vũ khí
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <form action="" method="get">
                                        <input type="search" value="{{ request('search') }}" name="search"
                                            id="search_infor_acc" placeholder="search" />
                                        <button type="submit" id="btn_search_ifa">Tìm kiếm</button>
                                    </form>
                                </th>
                                <th colspan="2">
                                    <a class="btn btn-success" href="{{ route('addWeap.index') }}">Thêm mới vũ khí</a>
                                </th>
                            </tr>
                            <tr>
                                <th>Id:</th>
                                <th>Avarta:</th>
                                <th>Tên nhân vật:</th>
                                <th class="HTextTooLong">Loại game:</th>
                                <th>Sửa:</th>
                                <th>Xóa:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($weapons) && is_object($weapons))
                                @foreach ($weapons as $weapon)
                                    <tr id="chinh_sua">
                                        <td scope="row">#{{ $weapon->id }}</td>
                                        <td>
                                            <div class="avarta_list_acc">
                                                <img src="{{ asset($weapon->image) }}" alt="">
                                            </div>
                                        </td>
                                        <td class="HTextTooLong">
                                            {{ $weapon->name }}
                                        </td>
                                        <td class="HTextTooLong">{{ $weapon->category->game_type }}</td>
                                        <td>
                                            <a href="{{ route('weaponUpdate.index', $weapon->id) }}"
                                                id="edit_infor_users" type="button">Sửa</a>
                                        </td>
                                        <td>
                                            <a class="btn_delete_category"
                                                href="{{ route('weapon.delete', $weapon->id) }}" id="remove_infor_users"
                                                type="button">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="phantrang" style="margin: auto">
                {{ $weapons->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="{{ asset('js/admin/deleteAlert.js') }}"></script>
    <script src="{{ asset('js/admin/filterCharacter.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
