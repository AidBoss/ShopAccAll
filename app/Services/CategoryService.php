<?php

namespace App\Services;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\addCategory;

class CategoryService
{
   public function getAll()
   {
      $cate = Categories::all();
      return $cate;
   }
   public function searchId($any)
   {
      // Tìm người dùng theo ID
      $category = Categories::find($any);
      if (!$category) {
         // trả ra thông báo ko tìm được
         toastr()->error('Loại game này không tồn tại!');
         // Trả về null nếu không tìm thấy
         return null;
      }
      return $category;
   }
   public function AddNewCategory(addCategory $request)
   {
      if ($request->hasFile('avatar')) {
         $existingName = Categories::where('game_type', 'like', "%$request->name;%")->first();
         if ($existingName) {
            // Hiển thị thông báo lỗi
            toastr()->error('Loại game đã có rồi!');
            // Trả về null nếu có lỗi
            return null;
         }
         // Tiếp tục lưu dữ liệu nếu không có lỗi
         $avatar = $request->avatar;
         $avatarName = 'category' . '_' . $avatar->getClientOriginalName();
         // Lưu vào thư mục public/img/category_game
         $avatar->move(public_path('img/category_game'), $avatarName);

         // Lưu dữ liệu vào cơ sở dữ liệu
         $category = new Categories();
         $category->game_type = $request->name;
         $category->image = 'img/category_game/' .  $avatarName; // Lưu đường dẫn tương đối của ảnh
         $category->quantity = $request->quantity;
         $category->save();
         return $category;
      }
   }
   public function update($id, Request $request)
   {
      $category = $this->searchId($id);
      if (!$category) {
         return null; // Trả về null nếu không tìm thấy người dùng
      }
      if ($request->hasFile('avatar')) {
         $avatar = $request->avatar;
         $avatarName = 'category' . '_' . $avatar->getClientOriginalName();
         // Lưu vào thư mục public/img/category_game
         $avatar->move(public_path('img/category_game'), $avatarName);
         // Lưu dữ liệu vào cơ sở dữ liệu
         $category->image = 'img/category_game/' .  $avatarName; // Lưu đường dẫn tương đối của ảnh
      }
      $category->game_type = $request->name;
      $category->quantity = $request->quantity;
      $category->save();
      return $category;
   }
}