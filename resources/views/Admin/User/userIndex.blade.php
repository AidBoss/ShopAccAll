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
                                Quản lý tài khoản
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <form action="{{ route('dashboad.index') }}" method="get" id="filterForm">
                                    <select id="filterByRole" class="form-control">
                                        <option value="" hidden selected> Lọc theo quyền</option>
                                        <option value="all">Tất cả</option>
                                        @if (isset($roles) && is_object($roles))
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->role }}"
                                                    {{ request()->role == $role->role ? 'selected' : '' }}>
                                                    {{ $role->role == '0' ? 'Quyền Admin' : 'Quyền User' }}
                                                </option>
                                            @endforeach
                                        @endif
                                        <input type="hidden" name="selectedRole" id="selectedRole">
                                    </select>
                                </form>
                            </th>
                            <th>
                                <form action="{{ route('dashboad.index') }}" method="get" id="filterFormMoney">
                                    <select id="filterByMoney" class="form-control">
                                        <option hidden selected>Lọc theo khoảng tiền nạp</option>
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
                            <th colspan="3">
                                <form action="" method="get">
                                    <input type="search" value="{{ request('search') }}" name="search"
                                        id="search_infor_acc" placeholder="search" />
                                    <button type="submit" id="btn_search_ifa">Tìm kiếm</button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <th>Id:</th>
                            <th>Avarta:</th>
                            <th class="HTextTooLong">Tên đăng nhập:</th>
                            <th class="HTextTooLong">Tên tài khoản:</th>
                            <th>Mail:</th>
                            <th class="HTextTooLong">Số điện thoại:</th>
                            <th>Quyền:</th>
                            <th>Tiền:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($users) && is_object($users))
                            @foreach ($users as $user)
                                <tr id="chinh_sua">
                                    <td scope="row">#{{ $user->id }}</td>
                                    <td>
                                        <div class="avarta_list_acc">
                                            <img src="{{ $user->avatar }}" alt="" />
                                        </div>
                                    </td>
                                    <td class="HTextTooLong">{{ $user->username }}</td>
                                    <td>{{ $user->account_name }}</td>
                                    <td><span class="HTextTooLong">{{ $user->email }}</span></td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        {{ (int) $user->balance }}
                                        <span style="color:red">đ</span>
                                    </td>
                                    <td id="formluachon">
                                        <a href="{{ route('detail.index', $user->id) }}" id="edit_infor_users"
                                            type="button">Sửa</a>
                                        <a class="btn_delete_category" href="{{ route('delete', $user->id) }}"
                                            id="remove_infor_users" type="button">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="phantrang">
                {{ $users->appends(request()->input())->links('pagination::bootstrap-4') }}
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
