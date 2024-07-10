<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === '0') {
                return redirect()->route('dashboad.index');
            };
        }
        $title = 'Trang đăng nhập';
        return view('Login.signUp', compact('title'));
    }
    public function login(AuthRequest $request)
    {
        $kq = [
            'account_name' => $request->input('userName'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($kq)) {
            toastr()->success('Đăng nhập thành công!');
            return redirect()->route('dashboad.index')->with('sussess', 'Đăng nhập thành công');
        } else {
            toastr()->error('Tài khoản hoặc mật khẩu sai!');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index');
    }
}
