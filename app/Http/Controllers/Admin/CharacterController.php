<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Characters;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\CharacterService;
use App\Http\Requests\AddNewCharacterRequest;
use App\Models\Categories;

class CharacterController extends Controller
{
    protected $category;
    protected $char;
    public function __construct(CategoryService $category, CharacterService $char)
    {
        $this->category = $category;
        $this->char = $char;
    }
    public function Index(Request $request)
    {
        // nếu không chọn thì mặc định trả ra bảng genshin
        if ($request->selectedCate == "") {
            $query = $this->char->filterCategoryOfAcc("Genshin Impact");
        } else {
            $query = $this->char->filterCategoryOfAcc($request->selectedCate);
        }
        $characters = $query->paginate(8);
        $categories = Categories::all();
        $title = 'Trang danh sách char';
        return view('Admin.Character.indexCharacter', compact('title', 'categories', 'characters'));
    }
    public function IndexAddChar()
    {
        $categories = $this->category->getAll();
        $title = 'Trang thêm mới char';
        return view('Admin.Character.addCharacter', compact('title', 'categories'));
    }
    // thêm mới nhân vật
    public function AddNewChar(AddNewCharacterRequest $request)
    {
        $char = $this->char->createCharacter($request);
        if ($char !== null) {
            toastr()->success('Thêm mới nhân vật thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function IndexUpdate(Request $request, $id)
    {
        $title = 'Trang sửa nhân vật';
        $categories = Categories::all();
        $char = $this->char->searchId($id);
        return view('Admin.Character.updateChar', compact('title', 'char', 'categories'));
    }
    public function UpdateCharacter(Request $request, $id)
    {
        // Kiểm tra dữ liệu request
        $char = $this->char->UpdateCharacter($request, $id);
        // Kiểm tra xem $char có bị null hay không
        if ($char !== null) {
            toastr()->success('Sửa loại game thành công.');
            return redirect()->route('char.index');
        } else {
            toastr()->error('Sửa loại game thất bại.');
            return redirect()->back();
        }
    }
    public function DeleteCharacter($id)
    {
        $char = $this->char->searchId($id);
        $char->delete();
        toastr()->success('Bạn đã xóa thành công nhân vật');
        return redirect()->route('char.index');
    }
}