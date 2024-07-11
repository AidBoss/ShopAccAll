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
        $accounts = Accounts::with('characters', 'weapons', 'category')->paginate(10);
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
        $categories = Categories::all();
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
            'categories' => $categories,
            'characters' => $characters,
            'weapons' => $weapons,
            'characterIds' => $characterIds,
            'weaponIds' => $weaponIds,
        ];
        // Truyền thêm biến $characterIds vào view
        return view('Admin.Account.updateAccount', $data);
    }

    public function UpdateAccount(Request $request, $id)
    {
        $acc = $this->acc->UpdateAccount($request, $id);
        if ($acc !== null) {
            toastr()->success('Bạn đã sửa thành công');
            return redirect()->back();
        } else {
            toastr()->error('Sửa thất bại');
            return redirect()->back();
        }
    }

    public function DeleteAccount($id)
    {
        $acc = $this->acc->searchId($id);
        $acc->delete();
        toastr()->success('Bạn đã xóa thành công tài khoản game');
        return redirect()->route('account.index');
    }
}
