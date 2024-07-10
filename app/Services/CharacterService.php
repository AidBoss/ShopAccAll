<?php

namespace App\Services;

use App\Http\Requests\AddNewCharacterRequest;
use App\Models\Characters;
use Illuminate\Http\Request;

class CharacterService
{
    public function getAll()
    {
        $char = Characters::all();
        return $char;
    }
    public function searchId($any)
    {
        // Tìm người dùng theo ID
        $char = Characters::find($any);
        if (!$char) {
            // trả ra thông báo ko tìm được
            toastr()->error('Nhân vật này không tồn tại!');
            // Trả về null nếu không tìm thấy
            return null;
        }
        return $char;
    }
    // hàm thêm mới nhân vật
    public function createCharacter(AddNewCharacterRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $existingName = Characters::where('name', 'like', "%$request->name;%")->first();
            if ($existingName) {
                // Hiển thị thông báo lỗi
                toastr()->error('Tên nhân vật đã tồn tại!');
                // Trả về null nếu có lỗi
                return null;
            }
            // Tiếp tục lưu dữ liệu nếu không có lỗi
            $imageName = $request->avatar;
            $avatarName = 'img/Characters/' . 'character' . '_' . $imageName->getClientOriginalName();
            // Lưu vào thư mục public/img/Characters
            $imageName->move(public_path('img/Characters'), $avatarName);
            // lưu vào database
            $char = Characters::create([
                'name' => $request->name,
                'image' => $avatarName, // Sử dụng tên file mới
                'category_id' => $request->category_id,
            ]);
            return $char;
        } else {
            toastr()->error('Vui lòng tải lên ảnh nhân vật.');
            return redirect()->back();
        }
    }

    public function filterCategoryOfAcc($selectedCate)
    {
        return Characters::whereHas('category', function ($query) use ($selectedCate) {
            $query->where('game_type', $selectedCate);
        });
    }
    // hàm chỉnh sửa thông tin nhân vật 
    public function UpdateCharacter(Request $request, $id)
    {
        $char = $this->searchId($id);
        if (!$char) {
            return null; // Trả về null nếu không tìm thấy nhân vật
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = 'Character_' . $avatar->getClientOriginalName();
            // Lưu vào thư mục public/img/Character
            $avatar->move(public_path('img/Character'), $avatarName);
            // Lưu đường dẫn tương đối của ảnh vào cơ sở dữ liệu
            $char->image = 'img/Character/' . $avatarName;
        }
        // Cập nhật các thuộc tính khác
        $char->name = $request->name;
        $char->category_id = $request->category_id;
        $char->save();
        return $char;
    }
}