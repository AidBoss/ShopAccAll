<?php

namespace App\Http\Controllers\Home\Account;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\Characters;
use App\Models\Weapons;
use Illuminate\Http\Request;

class CategoryHomeController extends Controller
{
    public function Index(Request $request, $id)
    {
        $query = Accounts::where('account_type_id', $id)->where('status', 1);
        $accounts = $query->with(['characters', 'weapons'])->paginate(6);
        $title = 'trang danh sách tài khoản';
        $characters = Characters::all();
        $weapons = Weapons::all();
        return view('Home.Category.index', compact('title', 'accounts', 'characters', 'weapons'));
    }
    public function search(Request $request, $id)
    {
        $query = Accounts::query();
        if ($request->filled('id_acc')) {
            $query->where('id', $request->input('id_acc'));
        }
        if ($request->filled('characters')) {
            $query->whereHas('characters', function ($q) use ($request) {
                $q->whereIn('id', $request->input('characters'));
            });
        }
        if ($request->filled('weapons')) {
            $query->whereHas('weapons', function ($q) use ($request) {
                $q->whereIn('id', $request->input('weapons'));
            });
        }
        if ($request->filled('ar_acc')) {
            $query->where('ar', $request->input('ar_acc'));
        }
        if ($request->filled('filterByMoney')) {
            $spaceM = $request->filterByMoney;
            if ($spaceM === '2000000+') {
                // Lọc các tài khoản có giá lớn hơn 2,000,000
                $minPrice = 2000000;
                $query->where('price', '>', $minPrice);
            } else {
                // Chia khoảng giá thành min và max
                $priceRange = explode('-', $spaceM);
                $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            }
        }
        if ($request->filled('server_acc')) {
            $query->where('server', $request->input('server_acc'));
        }
        if ($request->filled('upordown')) {
            $sortOrder = $request->input('upordown') === 'tang' ? 'asc' : 'desc';
            $query->orderBy('price', $sortOrder);
        }
        if (!$request->filled('id_acc') && !$request->filled('characters') && !$request->filled('weapons')) {
            $query->where('account_type_id', $id);
        }
        $accounts = $query->with(['characters', 'weapons'])->paginate(6);
        // $accounts = $this->acc->search($request, $id);
        $title = 'trang danh sách tài khoản';
        $characters = Characters::all();
        $weapons = Weapons::all();
        return view('Home.Category.index', compact('title', 'accounts', 'characters', 'weapons'));
    }
}
