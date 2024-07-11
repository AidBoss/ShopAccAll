<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;


use function Laravel\Prompts\search;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    // tìm kiếm người dùng dựa vào id
    public function index(Request $request)
    {
        $search = $request->search;
        $searchRole = $request->selectedRole;
        $priceRange  = $request->selectedSpaceMoney;
        // Sử dụng UserService để lọc dữ liệu người dùng
        $users = $this->userService->filterUsers($search, $searchRole, $priceRange);
        // lọc lấy ra các quyền có trong tài khoản 
        $roles = User::select('role')->distinct()->get();
        $title = 'Quản lý tài khoản';
        return view('Admin.User.userIndex', compact('title', 'users', 'roles'));
    }
    public function edit($id)
    {
        // tìm kiếm id có tồn tại hay không
        $users = $this->userService->searchId($id);
        $title = 'Chỉnh sửa thông tin';
        return view('Admin.User.updateUser', compact('title', 'users'));
    }
    public function doEdit(Request $request, $id)
    {
        // truyền tham số id của tài khoản và thông tin update
        $user = $this->userService->updateUser($request, $id);
        //kiểm tra tồn tại của user
        if ($user !== null) {
            return redirect()->route('dashboad.index');
        } else {
            return redirect()->back();
        }
    }

    public function deleteUsers($id)
    {
        $user = $this->userService->searchId($id);
        $user->delete();
        return redirect()->back();
    }
    // cập nhập nạp tiền 

}
