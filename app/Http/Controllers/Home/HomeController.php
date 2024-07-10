<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Models\Categories;
use App\Models\User;

class HomeController extends Controller
{
    protected $category;
    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $topUsers = User::orderBy('balance', 'desc')->take(6)->get();
        $category = Categories::take(4)->get();
        $catRandom = Categories::take(4)->get();
        $title = 'Trang chủ';
        return view('Home.index', compact('title', 'category', 'catRandom', 'topUsers'));
    }
}