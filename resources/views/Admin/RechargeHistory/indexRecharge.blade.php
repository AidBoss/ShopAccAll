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
                <div class="content_manager_user">
                    <table class="table ListUserAccount">
                        <thead>
                            <tr>
                                <th colspan="9" id="text-link-header"
                                    style="text-align: center;text-transform: uppercase;">
                                    Quản lý lịch sử nạp
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
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
                                <th colspan="2">
                                    <a class="btn btn-success" href="{{ route('addrecharge.index') }}">Thêm mới bill</a>
                                </th>
                            </tr>
                            <tr>
                                <th>Id:</th>
                                <th>Mã giao dịch:</th>
                                <th>Ngân Hàng:</th>
                                <th class="HTextTooLong">Nội dung:</th>
                                <th>Số tiền:</th>
                                <th>Người dùng:</th>
                                <th>Sửa:</th>
                                <th>Xóa:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($recharges) && is_object($recharges))
                                @foreach ($recharges as $recharge)
                                    <tr id="chinh_sua">
                                        <td scope="row">#{{ $recharge->id }}</td>
                                        <td class="HTextTooLong">
                                            {{ $recharge->transaction_code }}
                                        </td>
                                        <td class="HTextTooLong">
                                            {{ $recharge->bank_name }}
                                        </td>
                                        <td class="HTextTooLong">{{ $recharge->content_recharge }}</td>
                                        <td class="HTextTooLong">{{ number_format($recharge->amount) }}</td>
                                        <td class="HTextTooLong">{{ $recharge->user->username }}</td>
                                        <td>
                                            <a href="{{ route('rechargeUpdate.index', $recharge->id) }}"
                                                id="edit_infor_users" type="button">Sửa</a>
                                        </td>
                                        <td>
                                            <a class="btn_delete_category"
                                                href="{{ route('recharge.delete', $recharge->id) }}"
                                                id="remove_infor_users" type="button">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="phantrang" style="margin: auto">
                {{ $recharges->appends(request()->input())->links('pagination::bootstrap-4') }}
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
