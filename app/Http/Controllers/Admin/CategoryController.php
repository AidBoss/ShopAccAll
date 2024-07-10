<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\addCategory;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }
    public function index()
    {

        $title = 'Loại tài khoản';
        $cate = Categories::all();
        return view('Admin.Category.indexCategory', compact('title', 'cate'));
    }
    public function indexAdd()
    {
        $title = 'Thêm loại tài khoản';
        return view('Admin.Category.addCategory', compact('title'));
    }
    public function addCatagory(addCategory $request)
    {
        $category = $this->category->AddNewCategory($request);
        if ($category !== null) {
            toastr()->success('Thêm loại game thành công.');
            return redirect()->route('category.index');
        } else {
            return redirect()->back();
        }
    }
    public function indexUpdate($id)
    {
        $category = $this->category->searchId($id);
        $title = 'Trang sửa loại game';
        return view('Admin.Category.updateCategory', compact('title', 'category'));
    }
    public function updateCategory(Request $request, $id)
    {
        $category = $this->category->update($id, $request);
        if ($category !== null) {
            toastr()->success('Sửa loại game thành công.');
            return redirect()->route('category.index');
        } else {
            return redirect()->back();
        }
    }
    public function deleteCategory($id)
    {
        $user = $this->category->searchId($id);
        $user->delete();
        toastr()->success('Xóa thành công!');
        return redirect()->back();
    }
}
