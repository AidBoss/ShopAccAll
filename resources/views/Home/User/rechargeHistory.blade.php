<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.clineLT.head')
</head>

<body>
    <section class="wrapper">
        @include('Layout.clineLT.header')

        <!-- Phần thân trang web -->
        <section class="container_section">
            <div class="AccBought">
                <div class="content_accBought">
                    <h4 id="text-link-header">Lịch sử nạp tiền</h4>
                    <div class="history_buy_acc" id="history_buy_acc">
                        <table class="list_acc_bought" id="text_table">
                            <tr>
                                <th>Mã giao dịch: </th>
                                <th>Ngân hàng: </th>
                                <th>Nội dung: </th>
                                <th>Số tiền: </th>
                                <th>Nạp vào tài khoản: </th>
                                <th>Ngày nạp: </th>
                            </tr>
                            @if (isset($user) && is_object($user))
                                @foreach ($rechargeHistory as $history)
                                    <tr>
                                        <td>{{ $history->transaction_code }}</td>
                                        <td>{{ $history->bank_name }}</td>
                                        <td>{{ $history->content_recharge }}</td>
                                        <td>{{ number_format($history->amount) }}</td>
                                        <td>{{ $user->account_name }}</td>
                                        <td>{{ $history->updated_at->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </section>
        <!-- kết thúc Phần thân trang web -->
        @include('Layout.clineLT.footer')
    </section>
    <!-- link js -->
    <script src="../../assets/Js/pay.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
