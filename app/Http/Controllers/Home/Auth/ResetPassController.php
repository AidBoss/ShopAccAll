<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPassRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ResetPassController extends Controller
{
    public function index($id)
    {
        $title = "Trang đổi mật khẩu";
        return view('Login.resetPass', compact('title', 'id'));
    }
    public function resetPass(Request $request, $id)
    {
        // Tìm kiếm người dùng theo $id
        $user = User::find($id);
        $pass = $user->password;
        // Kiểm tra nếu không tìm thấy người dùng
        if (!$user) {
            abort(404); // Hoặc xử lý lỗi theo cách bạn muốn
        }
        // Kiểm tra mật khẩu cũ
        $passOld = $request->passOld;
        if (!Hash::check($passOld, $pass)) {
            throw ValidationException::withMessages(['passOld' => 'Mật khẩu cũ không đúng']);
        }
        // Kiểm tra mật khẩu mới không trùng với mật khẩu cũ
        $passNew = $request->passNew;
        if (Hash::check($passNew, $pass)) {
            throw ValidationException::withMessages(['password' => 'Mật khẩu mới không được trùng với mật khẩu cũ']);
        }
        // Cập nhật mật khẩu mới cho người dùng
        $user->password = Hash::make($passNew);
        $user->save();
        toastr()->success('Bạn đã đổi mật khẩu thành công');
        // Xóa tất cả token của người dùng để đăng xuất khỏi các thiết bị khác
        $user->tokens()->delete();
        // Đăng xuất người dùng hiện tại
        Auth::logout();
        return redirect()->route('login.index');
    }
}
