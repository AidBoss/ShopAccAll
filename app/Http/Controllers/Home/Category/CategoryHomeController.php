<?php

namespace App\Http\Controllers\Home\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Characters;
use App\Models\Weapons;

class CategoryHomeController extends Controller
{
    public function Index($id)
    {
        //with(['characters', 'weapons']) được sử dụng để tải quan hệ char và weap cho các tài khoản.
        $accounts = Accounts::where('account_type_id', $id)->with(['characters', 'weapons'])->paginate(6);
        $title = 'trang danh sách tài khoản';
        return view('Home.Category.index', compact('title', 'accounts'));
    }
}
