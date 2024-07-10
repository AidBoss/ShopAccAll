<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.clineLT.head')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <section class="wrapper">
        @include('Layout.adminLT.headAd')
        <!-- Phần thân trang web -->
        <section class="container_section">
            <div class="content_manager_list_user">
                @if (isset($recharge) && is_object($recharge))
                    <form action="{{ route('recharge.update', $recharge->id) }}" method="post">
                        @csrf
                        <h5 style="text-align: center" id="text-link-header">
                            Sửa bill
                        </h5>
                        <div class="detail_list_users">
                            <div class="half_infor_list_users">
                                <div class="control-group">
                                    <label for="">(*) Id</label>
                                    <span style="color: #888" class="form-control" disabled>{{ $recharge->id }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="transaction_code">Mã giao dịch:</label>
                                    <input type="text" name="transaction_code" class="form-control"
                                        value="{{ old('transaction_code', $recharge->transaction_code) }}"
                                        placeholder="{{ $recharge->transaction_code }}">
                                    @if ($errors->has('transaction_code'))
                                        <span class="text-danger">{{ $errors->first('transaction_code') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="bank_name">Tên ngân hàng:</label>
                                    <input type="text" name="bank_name" class="form-control"
                                        value="{{ old('bank_name', $recharge->bank_name) }}"
                                        placeholder="{{ $recharge->bank_name }}">
                                    @if ($errors->has('bank_name'))
                                        <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="ContentBill">Nội dung: </label>
                                    <input type="text" value="{{ old('content_bill', $recharge->content_recharge) }}"
                                        class="form-control" name="content_bill" id="ContentBill"
                                        placeholder="{{ $recharge->content_recharge }}" />
                                    @if ($errors->has('content_bill'))
                                        <span class="error-message">(*) {{ $errors->first('content_bill') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="bottom_infor_list_users">
                                <div class="form-group">
                                    <label for="amount">Số tiền:</label>
                                    <input type="text" name="amount" class="form-control"
                                        value="{{ old('amount', (int) $recharge->amount) }}"
                                        placeholder="{{ (int) $recharge->amount }}">
                                    @if ($errors->has('amount'))
                                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="username_rechager">Tên người dùng: </label>
                                    <select id="username_rechager" class="form-control" name="user_id">
                                        <option hidden value="">Chọn Người Nạp</option>
                                        @if (isset($users) && is_object($users))
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id === $recharge->user_id ? 'selected' : '' }}>
                                                    {{ $user->username }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('user_id'))
                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <button id="btn_update" class="btn_detail_lUsers" type="submit">Gửi</button>
                        </div>
                        <div class="go_back">
                            <a href="{{ route('recharge.index') }}" class="btn btn-light"><i
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

    <script>
        $(document).ready(function() {
            $('#username_rechager').select2({
                placeholder: 'Chọn username người nạp',
                allowClear: true
            });
        });
    </script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
