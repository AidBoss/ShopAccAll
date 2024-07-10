<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{

    public function index()
    {
        $title = 'Trang đăng ký';
        return view('Login.Register', compact('title'));
    }
    public function register(RegisterRequest $request)
    {
        $existingUser = User::where('username', $request->userName)->first();
        if ($existingUser) {
            toastr()->error('Tên người dùng đã tồn tại!');
            return redirect()->back();
        }
        $existingUser = User::where('account_name', $request->nameAccount)->first();
        if ($existingUser) {
            toastr()->error('Tài khoản đã tồn tại!');
            return redirect()->back();
        }
        $existingEmail = User::where('email', $request->email)->first();
        if ($existingEmail) {
            toastr()->error('Email này đã được sử dụng!');
            return redirect()->back();
        }
        $user = new User();
        $user->username = $request->input('userName');
        $user->account_name = $request->input('nameAccount');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = "1"; // Mặc định là người dùng có vai trò 1(người đăng ký thường)
        $user->balance = "0"; // Mặc định số dư ban đầu là 0
        $user->save();
        toastr()->success('Bạn đã đăng ký thành công!');
        return redirect()->route('login.index');
    }
}
