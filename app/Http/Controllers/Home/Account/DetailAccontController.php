<?php

namespace App\Http\Controllers\Home\Account;

use App\Events\PurchaseSuccessful;
use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\PucrchaseHistory;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailAccontController extends Controller
{
    public function index($id)
    {
        $title = 'Tang chi tiết sản phẩm';
        $account = Accounts::with('imagesOfAccount')->where('id', $id)->first();
        if ($account) {
            $img = $account->imagesOfAccount->pluck('path');
        } else {
            $img = [];
        }
        return view('Home.Account.detailAccountIndex', compact('title', 'account', 'img'));
    }
    public function purchase($id)
    {
        $idUser = Auth::id();
        // tìm tài khoản game có id trùng 
        $account = Accounts::where('id', $id)->first();
        // lấy ra thông tin người dùng 
        $user = User::where('id', $idUser)->first();
        // kiểm tra trạng thái tài khoản đã bán chưa
        if ($account->status == '2') {
            toastr()->error('Tài khoản đã bị mua');
            return redirect()->route('home.index');
            //kiểm tra tiền trong tài khoản có ít hơn giá game không
        } else if ($user->balance <= $account->price) {
            toastr()->error('Bạn không đủ tiền vui lòng nạp thêm');
            return redirect()->back();
        } else {
            // Bắn sự kiện mua hàng thành công vào hàng đợi
            //Không cần sử dụng onQueue() khi sử dụng dispatch() vì Laravel tự động xử lý việc đưa sự kiện vào hàng đợi nếu bạn đã cấu hình môi trường hàng đợi đúng trong 
            // .env và đã chạy lệnh php artisan queue:table và php artisan migrate để tạo bảng cho hàng đợi.
            PurchaseSuccessful::dispatch($user, $account);;
            // 
            toastr()->success('Mua tài khoản thành công');
            return redirect()->route('home.index');
        }
    }
}
