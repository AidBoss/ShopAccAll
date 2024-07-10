<?php

namespace App\Services;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserService
{

   public function getAll()
   {
      $user = User::all();
      return $user;
   }
   public function searchId($any)
   {
      // Tìm người dùng theo ID
      $user = User::find($any);
      if (!$user) {
         // trả ra thông báo ko tìm được
         toastr()->error('Người dùng không tồn tại!');
         // Trả về null nếu không tìm thấy
         return null;
      }
      return $user;
   }
   // hàm tìm kiếm người dùng theo yêu cầu
   public function tkYeuCau($canTim, $canSS, $id,)
   {
      $result = User::where($canTim, $canSS)
         ->where('id', '!=', $id)
         ->first();
      return $result;
   }
   public function searchUser($search)
   {
      // Trả về một query builder thay vì collection
      return User::where(function ($query) use ($search) {
         $query->where('username', 'like', "%$search%")
            ->orWhere('account_name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%");
      });
   }
   // lọc sản phẩm theo yêu cầu 
   public function filterUsers($search, $searchRole, $priceRange)
   {
      if ($search) {
         // Gọi searchUser để trả về query builder và sau đó phân trang
         $usersQuery = $this->searchUser($search);
         $users = $usersQuery->paginate(10);
      } elseif ($priceRange !== null) {
         // nếu biến truyền vào chỉ có 1 tham số 
         if ($priceRange === '500000+') {
            $minPrice = 500000;
            // tìm kiếm các khoảng giá lớn hơn 500
            $users = User::where('balance', '>', $minPrice)->paginate(10);
         } else {
            // các khoảng giá có min và max
            $priceRangeParts = explode('-', $priceRange);
            $minPrice = $priceRangeParts[0];
            $maxPrice = $priceRangeParts[1];
            $users = User::whereBetween('balance', [$minPrice, $maxPrice])->paginate(10);
         }
      } elseif ($searchRole !== null) {
         // tìm kiếm các user có quyền như đã truyền vào 
         $users = User::where('role', $searchRole)->paginate(10);
      } else {
         // Nếu không có tìm kiếm, lấy danh sách người dùng và phân trang
         $users = User::paginate(10);
      }
      return $users;
   }
   public function updateUser(Request $request, $id)
   {
      $user = $this->searchId($id);
      if (!$user) {
         return null; // Trả về null nếu không tìm thấy người dùng
      }
      // Kiểm tra xem username mới có bị trùng không 
      $existingName = $this->tkYeuCau('username', $request->userNameDetail, $id);
      if ($existingName) {
         toastr()->error('Tên người đã được sử dụng!');
         return null; // Trả về null nếu có lỗi
      }
      // Kiểm tra xem email mới có bị trùng không 
      $existingEmail = $this->tkYeuCau('email', $request->maildetail, $id);
      if ($existingEmail) {
         toastr()->error('Email này đã được sử dụng!');
         return null; // Trả về null nếu có lỗi
      }
      // Cập nhật thông tin người dùng
      $user->username = $request->input('userNameDetail', $user->username);
      $user->email = $request->input('maildetail', $user->email);
      $user->phone = $request->input('sdtdetail', $user->phone);
      $user->balance = $request->input('moneyDetail', $user->balance);
      $user->save();
      return $user; // Trả về đối tượng người dùng sau khi cập nhật thành công
   }
   public function addToBalance(User $user, $amount)
   {
      $user->balance += $amount; // Cập nhật số dư của người dùng
      $user->save(); // Lưu lại số dư đã cập nhật vào cơ sở dữ liệu
   }
}