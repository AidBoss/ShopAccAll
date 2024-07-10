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
            <div class="manager_acc">
                <div class="left_management_acc close">
                    <a class="Species_one" id="Species_one">Quản lý acc Honkai</a>
                    <a class="Species_two" id="Species_two">Quản lý acc Genshin</a>
                    <a class="Species_three" id="Species_three">
                        Quản lý acc Honkai3
                    </a>
                    <a class="Species_four" id="Species_four">Quản lý acc LQ</a>
                </div>
                <div class="right_management_acc">
                    <table class="table ListUserAccount" id="ql_honkai">
                        <thead>
                            <tr>
                                <th rowspan="1" colspan="6">
                                    <p id="title_ql">Quản lý acc Honkai</p>
                                </th>
                                <th colspan="3">
                                    <input type="search" name="" id="search_infor_acc" />
                                    <button type="submit" id="btn_search_ifa">Tìm kiếm</button>
                                </th>
                            </tr>
                            <tr>
                                <th>Id:</th>
                                <th>Sever:</th>
                                <th>Tên tài khoản:</th>
                                <th>Mật khẩu</th>
                                <th>Nội dung mô tả:</th>
                                <th>Nhân vật:</th>
                                <th>Vũ khí:</th>
                                <th>Giá:</th>
                                <th style="text-align: center">Chọn:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">#01</td>
                                <td id="server_acc">N/A</td>
                                <td id="tk_acc">admin001</td>
                                <td id="mk_acc">ankdevpass</td>
                                <td>
                                    <p id="mota_acc">
                                        amsdaisdasjdoajoajsodjaosdaosdkoasjdoasjdoasjdojifjaosdisniaj
                                    </p>
                                </td>
                                <td>
                                    <select id="sonv_acc" name="">
                                        <option value="1">asdasdasdasd</option>
                                        <option value="2">a</option>
                                        <option value="3">a</option>
                                        <option value="4">a</option>
                                        <option value="5">a</option>
                                        <option value="6">a</option>
                                        <option value="7">a</option>
                                        <option value="8">a</option>
                                        <option value="9">a</option>
                                        <option value="10">a</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="sovk_acc">
                                        <option value="1">a</option>
                                        <option value="2">a</option>
                                        <option value="3">a</option>
                                        <option value="4">a</option>
                                        <option value="5">a</option>
                                        <option value="6">a</option>
                                        <option value="7">a</option>
                                        <option value="8">a</option>
                                        <option value="9">a</option>
                                        <option value="10">a</option>
                                    </select>
                                </td>
                                <td>120.000đ</td>
                                <td>
                                    <button id="edit_infor_user" type="button">Sửa</button>
                                    <button id="remove_infor_user" type="button">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="{{ asset('admin/qlacc.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
