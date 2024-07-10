<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeaponRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Models\Weapons;
use App\Services\WeaponService;
use App\Models\Categories;

class WeaponController extends Controller
{
    protected $category;
    protected $weapon;
    public function __construct(CategoryService $category, WeaponService $weapon)
    {
        $this->category = $category;
        $this->weapon = $weapon;
    }
    public function Index(Request $request)
    {
        $weapon = $this->weapon->getAll();
        // nếu không chọn thì mặc định trả ra bảng genshin
        if ($request->selectedCate == "") {
            $query = $this->weapon->filterCategoryOfWeap("Genshin Impact");
        } else {
            $query = $this->weapon->filterCategoryOfWeap($request->selectedCate);
        }
        $weapons = $query->paginate(8);
        $categories = Categories::all();
        $title = 'Trang danh sách vũ khí';
        return view('Admin.Weapon.indexWeapon', compact('title', 'categories', 'weapons'));
    }
    public function IndexAddWeapon()
    {
        $categories = $this->category->getAll();
        $title = 'Trang thêm mới vũ khí';
        return view('Admin.Weapon.createWeapon', compact('title', 'categories'));
    }
    public function AddNewWeapon(WeaponRequest $request)
    {
        $char = $this->weapon->createWeapon($request);
        if ($char !== null) {
            toastr()->success('Thêm mới vũ khí thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function IndexUpdateWeapon(Request $request, $id)
    {
        $title = 'Trang sửa vũ khí';
        $categories = Categories::all();
        $weapon = $this->weapon->searchId($id);
        return view('Admin.Weapon.updateWeapon', compact('title', 'weapon', 'categories'));
    }
    public function UpdateWeapon(Request $request, $id)
    {
        // Kiểm tra dữ liệu request
        $char = $this->weapon->UpdateWeapon($request, $id);
        // Kiểm tra xem $weapon có bị null hay không
        if ($char !== null) {
            toastr()->success('Sửa vũ khí thành công.');
            return redirect()->route('weapon.index');
        } else {
            toastr()->error('Sửa vũ khí thất bại.');
            return redirect()->back();
        }
    }
    public function DeleteWeapon($id)
    {
        $char = $this->weapon->searchId($id);
        // dd($char);
        $char->delete();
        toastr()->success('Bạn đã xóa thành công vũ khí');
        return redirect()->route('weapon.index');
    }
}