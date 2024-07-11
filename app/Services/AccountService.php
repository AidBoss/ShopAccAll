<?php

namespace App\Services;

use App\Http\Requests\AccountRequest;
use App\Models\Accounts;
use App\Models\ImageOfAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountService
{
    public function getAll()
    {
        $accounts = Accounts::all();
        return $accounts;
    }
    public function getCharactersByAccountId($accountId)
    {
        $account = Accounts::findOrFail($accountId);
        $characters = $account->characters()->pluck('name');
        return $characters;
    }
    public function searchId($id)
    {
        // Tìm  theo ID
        $acc = Accounts::find($id);
        if (!$acc) {
            // trả ra thông báo ko tìm được
            toastr()->error('Nhân vật này không tồn tại!');
            // Trả về null nếu không tìm thấy
            return null;
        }
        return $acc;
    }
    public function createAccount(Request $request)
    { // Mở phiên làm việc với database
        DB::beginTransaction();
        try {
            // Tạo mới các bản ghi trong images_of_accounts nếu có file ảnh được tải lên
            $images = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = 'img/imgOfAcc/' . '_' . $image->getClientOriginalName();
                    $image->move(public_path('img/imgOfAcc'), $imageName);
                    // Tạo mới một bản ghi trong bảng images_of_accounts
                    $imageRecord = new ImageOfAccount([
                        'account_id' => null, // Chưa biết account_id ở đây, sẽ cập nhật sau khi tạo tài khoản
                        'path' => 'img/imgOfAcc/' . $imageName,
                    ]);
                    $images[] = $imageRecord;
                }
            }

            // Tạo tài khoản mới
            $account = Accounts::create([
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'server' => $request->input('server'),
                'ar' => $request->input('ar'),
                'status' => $request->input('status'),
                'account_type_id' => $request->input('category_id'),
            ]);
            // Cập nhật account_id cho các bản ghi trong images_of_accounts
            foreach ($images as $image) {
                $image->account_id = $account->id;
                $image->save();
            }
            // Gắn các nhân vật vào tài khoản mới, đảm bảo không có giá trị trùng lặp
            $account->characters()->sync($request->characters);
            // Gắn các vũ khí vào tài khoản mới, đảm bảo không có giá trị trùng lặp
            $account->weapons()->sync($request->weapons);
            // Commit transaction
            DB::commit();
            // Trả về đối tượng tài khoản đã được tạo
            return $account;
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, rollback transaction
            DB::rollBack();
            // Có thể xử lý và trả về thông báo lỗi cho người dùng
            return response()->json(['message' => 'Đã xảy ra lỗi khi tạo tài khoản: ' . $e->getMessage()], 500);
        }
    }
    public function UpdateAccount(Request $request, $id)
    {
        try {
            // mở phiên làm việc với database
            DB::beginTransaction();
            $account = $this->searchId($id);
            // cập nhập tài khoản
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = 'img/imgOfAcc/' . '_' . $image->getClientOriginalName();
                    $image->move(public_path('img/imgOfAcc'), $imageName);
                    // Tạo mới một bản ghi trong bảng images_of_accounts
                    $imageRecord = new ImageOfAccount([
                        'account_id' => $account->id,
                        'path' => $imageName,
                    ]);
                    $images[] = $imageRecord;
                }
                // Cập nhật account_id cho các bản ghi trong images_of_accounts
                foreach ($images as $image) {
                    $image->save();
                }
            }
            $account->update([
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'server' => $request->input('server'),
                'status' => $request->input('status'),
                'account_type_id' => $request->input('category_id'),
            ]);
            if ($request->filled('characters')) {
                // Gắn các nhân vật vào tài khoản mới, đảm bảo không có giá trị trùng lặp
                $account->characters()->sync($request->characters);
            }
            if ($request->filled('weapons')) {
                // Gắn các vũ khí vào tài khoản mới, đảm bảo không có giá trị trùng lặp
                $account->weapons()->sync($request->weapons);
            }
            // Commit transaction
            DB::commit();
            return $account;
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, rollback transaction
            DB::rollBack();
            // Có thể xử lý và trả về thông báo lỗi cho người dùng
            return response()->json(['message' => 'Đã xảy ra lỗi khi tạo tài khoản: ' . $e->getMessage()], 500);
        }
    }
}
