<?php

namespace App\Http\Controllers\Home\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RechargeHistory extends Controller
{
    public function index($id)
    {
        $title = "Trang lịch sử nạp";
        $user = User::findOrFail($id);
        if (!$user) {
            toastr()->error('Bạn chưa đăng nhập');
            return redirect()->route('login.index');
        }
        $rechargeHistory = $user->rechargeHistories()->get();
        return view('Home.User.rechargeHistory', compact('title', 'user', 'rechargeHistory'));
    }
}
