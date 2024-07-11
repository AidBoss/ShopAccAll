<?php

namespace App\Services;

use App\Models\Accounts;
use Illuminate\Http\Request;

class SearchAccountService
{
    public function search(Request $request, $id)
    {
        $query = Accounts::query();
        if ($request->filled('id_acc')) {
            $query->where('id_acc', $request->input('id_acc'));
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
            $query->where('ar_acc', $request->input('ar_acc'));
        }
        if ($request->filled('filterByMoney')) {
            $spaceM = $request->filterByMoney;
            if ($spaceM === '2000000+') {
                // chỉ có một tham số truyền vào
                $minPrice = 2000000;
                $query->where('price', '>', $minPrice);
            } else {
                // các khoảng giá có min và max
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
        return  $accounts;
    }
}
