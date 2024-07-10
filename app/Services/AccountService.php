<?php

namespace App\Services;

use App\Http\Requests\AccountRequest;
use App\Models\Accounts;
use Illuminate\Http\Request;

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
    {
        // Tạo tài khoản mới
        $account = Accounts::create([
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'server' => $request->input('server'),
            'ar' => $request->input('ar'),
            'status' => $request->input('status'),
            'account_type_id' => $request->input('category_id'),
        ]);
        // Gắn các nhân vật vào tài khoản mới, đảm bảo không có giá trị trùng lặp
        $account->characters()->sync($request->characters);
        // Gắn các vũ khí vào tài khoản mới, đảm bảo không có giá trị trùng lặp
        $account->weapons()->sync($request->weapons);
        return $account;
    }
    public function UpdateAccount(AccountRequest $request, $id)
    {
        $account = $this->searchId($id);
        // cập nhập tài khoản
        $account = Accounts::create([
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'server' => $request->input('server'),
            'status' => $request->input('status'),
            'account_type_id' => $request->input('category_id'),
        ]);
        // Gắn các nhân vật vào tài khoản mới, đảm bảo không có giá trị trùng lặp
        $account->characters()->sync($request->characters);
        // Gắn các vũ khí vào tài khoản mới, đảm bảo không có giá trị trùng lặp
        $account->weapons()->sync($request->weapons);
        return $account;
    }
}
