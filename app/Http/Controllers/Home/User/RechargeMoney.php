<?php

namespace App\Http\Controllers\Home\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RechargeHistory;

class RechargeMoney extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        if (!$user) {
            toastr()->error('Không tìm thấy tài khoản');
            return redirect()->back();
        }
        $title = 'Trang nạp tiền';
        return view('Home.User.rechargeMoney', compact('title', 'user'));
    }
    public function RechargeVnpay(Request $request)
    {
        (int) $sotiennap = $request->selected_amount;
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/user/vnpay-return";
        $vnp_TmnCode = "EX0UQEX1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "Q3555ZFV2IS1KSC8YD216LK5772AYHUI"; //Chuỗi bí mật
        $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng.
        $vnp_OrderInfo = $request->ndck;
        $vnp_OrderType = $request->ndck;
        $vnp_Amount = (int) $sotiennap * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function handleVnpayReturn(Request $request)
    {
        $vnp_HashSecret = "Q3555ZFV2IS1KSC8YD216LK5772AYHUI"; // Chuỗi bí mật của bạn
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                // Thanh toán thành công
                $transaction_id = $inputData['vnp_TxnRef'];
                $amount = $inputData['vnp_Amount'] / 100; // Đơn vị của vnp_Amount là VND, chia cho 100 để chuyển về đơn vị tiền tệ
                $order_id = $inputData['vnp_OrderInfo'];
                // $payment_date = $inputData['vnp_PayDate']; // Ngày thanh toán
                $bank_name = $inputData['vnp_BankCode']; // Tên ngân hàng
                // Cập nhật thông tin thanh toán vào hệ thống của bạn
                RechargeHistory::create([
                    'transaction_code' => $transaction_id,
                    'bank_name' => $bank_name, // Tên ngân hàng
                    'content_recharge' => $order_id,
                    'amount' => $amount,
                    'user_id' => auth()->user()->id // Lấy ID người dùng đang đăng nhập
                ]);
                Toastr()->success('Thanh toán thành công!', 'Success');
                return redirect()->route('home.index'); // Điều hướng về trang chủ hoặc trang mong muốn
            } else {
                // Thanh toán thất bại
                Toastr()->error('Thanh toán thất bại!', 'Error');
                return redirect()->route('home.index'); // Điều hướng về trang chủ hoặc trang mong muốn
            }
        } else {
            // Chữ ký không hợp lệ
            Toastr()->error('Chữ ký không hợp lệ!', 'Error');
            return redirect()->route('home.index'); // Điều hướng về trang chủ hoặc trang mong muốn
        }
    }
    // hàm trả về khi thanh toán thành công

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function RechargeMomo(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = (int)$request->selected_amount;;
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/user/momo-return";
        $ipnUrl = "http://127.0.0.1:8000/user/momo-return";
        $extraData = "";
        $orderInfo = $request->ndck;
        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        if ($result === false) {
            toastr()->error('Có lỗi xảy ra khi gửi yêu cầu đến MoMo.');
            return redirect()->back();
        }
        $jsonResult = json_decode($result, true);
        $jsonResult = json_decode($result, true);
        if (isset($jsonResult['payUrl'])) {
            return redirect($jsonResult['payUrl']);
        } else {
            toastr()->error('payUrl không có trong phản hồi.');
            return redirect()->back();
        }
    }
    public function handleMomoReturn(Request $request)
    {
        $momo_SecretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa"; // Chuỗi bí mật
        $inputData = $request->all();
        $momo_SecureHash = $inputData['signature'];
        unset($momo_SecureHash);
        ksort($inputData);
        // Dữ liệu cần mã hóa
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
        }
        // xóa các đối tượng & trong chuỗi 
        $hashData = rtrim($hashData, '&');
        // tạo một mã băm của một chuỗi bằng cách sử dụng thuật toán HMAC (Hash-based Message Authentication Code). 
        $secureHash = hash_hmac('sha256', $hashData, $momo_SecretKey);
        if ($inputData['resultCode'] == '0') {
            $transaction_id = $inputData['orderId'];
            $amount = $inputData['amount']; // Đơn vị của vnp_Amount là VND, chia cho 100 để chuyển về đơn vị tiền tệ
            $order_id = $inputData['orderInfo'];
            $bank_name = $inputData['paymentOption']; // Tên ngân hàng
            // Cập nhật thông tin thanh toán vào hệ thống của bạn
            RechargeHistory::create([
                'transaction_code' => $transaction_id,
                'bank_name' => $bank_name, // Tên ngân hàng
                'content_recharge' => $order_id,
                'amount' => $amount,
                'user_id' => auth()->user()->id // Lấy ID người dùng đang đăng nhập
            ]);
            Toastr()->success('Thanh toán thành công!', 'Success');
            return redirect()->route('home.index');
        } else {
            // Thanh toán thất bại
            Toastr()->error('Thanh toán thất bại!', 'Error');
            return redirect()->route('home.index'); // Điều hướng về trang chủ hoặc trang mong muốn
        }
    }
}
