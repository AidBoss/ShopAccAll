<?php

namespace App\Http\Controllers\Home\User;

use App\Http\Controllers\Controller;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseHistoryUser extends Controller
{
   public function index($id)
   {
      $user = User::findOrFail($id);
      if (!$user) {
         abort(404);
      }
      // tên hàm trong PurchaseHistory, hàm đó trả ra thông tin về tài khoản 
      $purchaseHistories = $user->purchaseHistories()->with('account')->get();
      $title = "Trang kiểm lịch sử mua";
      return view('Home.User.purchaseHistory', compact('title', 'user', 'purchaseHistories'));
   }
}
