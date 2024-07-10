<?php

namespace App\Http\Controllers\ADmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Models\Accounts;
use App\Models\Categories;
use App\Models\Characters;
use App\Models\Weapons;
use App\Services\AccountService;
use App\Services\CategoryService;
use App\Services\UserService;
use App\Services\CharacterService;
use App\Services\WeaponService;

class AccountController extends Controller
{
    protected $acc, $cate, $user, $char, $weap;
    public function __construct(AccountService $account, CategoryService $category, UserService $user, CharacterService $char, WeaponService $weap)
    {
        $this->acc = $account;
        $this->cate = $category;
        $this->user = $user;
        $this->char = $char;
        $this->weap = $weap;
    }
    public function Index()
    {
        $accounts = Accounts::with('characters', 'weapons', 'category')->get();
        $title = 'Danh sách tài khoản';
        $categories = $this->cate->getAll();
        return view('Admin.Account.accountIndex', compact('title', 'accounts', 'categories'));
    }
    public function IndexAddAccount()
    {
        $title = 'Thêm mới tài khoản game';
        $categories = $this->cate->getAll();
        $characters = $this->char->getAll();
        $weapons = $this->weap->getAll();
        $acc = Accounts::all();
        return view('Admin.Account.createAccount', compact('title', 'acc', 'categories', 'characters', 'weapons'));
    }
    public function AddNewAccount(Request $request)
    {
        $acc = $this->acc->createAccount($request);
        if ($acc !== null) {
            toastr()->success('Bạn đã thêm mới thành công');
            return redirect()->back();
        } else {
            toastr()->error('Thêm mới thất bại');
            return redirect()->back();
        }
    }
    public function IndexUpdateAccount($id)
    {
        $account = $this->acc->searchId($id);
        $category = Categories::all();
        $characters = Characters::all();
        $weapons = Weapons::all();
        $title = 'Sửa thông tin acc';
        // Lấy các id của các characters thuộc về account
        $characterIds = $account->characters->pluck('id');
        // Lấy các id của các characters thuộc về account
        $weaponIds = $account->weapons->pluck('id');
        // truyền các biến sang view 
        $data = [
            'account' => $account,
            'title' => $title,
            'category' => $category,
            'characters' => $characters,
            'weapons' => $weapons,
            'characterIds' => $characterIds,
            'weaponIds' => $weaponIds,
        ];
        // Truyền thêm biến $characterIds vào view
        return view('Admin.Account.updateAccount', $data);
    }

    public function UpdateAccount(Request $request)
    {
        dd($request);
        //     // Lấy ID của account cần cập nhật từ route parameters
        //     $accountId = $request->route('id');

        //     // Lấy các dữ liệu đã validate từ request
        //     $validatedData = $request->validated();

        //     // Cập nhật thông tin account trong cơ sở dữ liệu
        //     $account = Accounts::findOrFail($accountId);
        //     $account->description = $validatedData['description'];
        //     $account->price = $validatedData['price'];
        //     $account->server = $validatedData['server'];
        //     $account->status = $validatedData['status'];
        //     $account->account_type_id = $validatedData['account_type_id'];
        //     // Cập nhật các thông tin khác tùy theo logic của bạn

        //     // Lưu lại vào cơ sở dữ liệu
        //     $account->save();

        //     // Redirect về trang danh sách account hoặc trang cần thiết khác sau khi cập nhật thành công
        //     return redirect()->route('account.index')->with('success', 'Cập nhật thông tin account thành công.');
    }

    public function DeleteAccount($id)
    {
        $acc = $this->acc->searchId($id);
        $acc->delete();
        toastr()->success('Bạn đã xóa thành công tài khoản game');
        return redirect()->route('account.index');
    }
}
