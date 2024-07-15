<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetAccountMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ForgetPassController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Trang quên mật khẩu';
        return view('Login.forgetPass', compact('title'));
    }
    function PassRandom()
    {
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // độ dài của một chuỗi
        $lengthChar = strlen($char);
        $randomPass = '';
        for ($i = 0; $i < 6; $i++) {
            $randomPass .= $char[rand(0, $lengthChar - 1)];
        }
        return $randomPass;
    }
    public function forgetPass(Request $request)
    {
        $mail = $request->nameEmail;
        $username = $request->userName;
        // tạo mật khẩu random
        $passNew = $this->PassRandom();
        // tạo một khóa duy nhất trong cache để lưu trữ thời gian gửi email cuối cùng của người dùng dựa trên địa chỉ email
        $cacheKey = 'forgetPass_' . $mail;
        // Kiểm tra nếu người dùng đã gửi email trong vòng 5 phút qua
        if (Cache::has($cacheKey)) {
            $lanGuiCuoi = Cache::get($cacheKey);
            $now = Carbon::now();
            $phutDem = $now->diffInMinutes($lanGuiCuoi);
            if ($phutDem < 5) {
                $minutesLeft = 5 - $phutDem;
                toastr()->error('Email đã được gửi, nếu muốn mail lại sau 5 phút nữa');
                return response()->json([
                    'message' => "Vui lòng đợi $minutesLeft phút trước khi gửi lại email."
                ], 429); // 429 Too Many Requests
            }
        }
        $user = User::where('email', $mail)
            ->where('account_name', $username)
            ->first();
        if (!$user) {
            toastr()->error('Email và tài khoản không trùng khớp');
            return redirect()->back();
        }
        // lưu pass vào cơ sở dữ liệu
        $user->password = bcrypt($passNew);
        $user->save();
        // gửi mail cho người dùng
        Mail::to($user->email)->send(new ForgetAccountMail($user, $passNew));
        // hiện thông báo cho người dùng
        toastr()->success('Mật khẩu đã được gửi vào mail bạn đăng ký vui lòng kiểm tra');
        return redirect()->route('login.index');
    }
}
