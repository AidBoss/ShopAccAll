<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RechargeHistoryRequest;
use App\Models\RechargeHistory;
use Illuminate\Http\Request;
use App\Services\RechargeHistoryService;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RechargeHistoryController extends Controller
{
   protected $user;
   protected $recharge;
   public function __construct(UserService $user, RechargeHistoryService $recharge)
   {
      $this->user = $user;
      $this->recharge = $recharge;
   }
   public function Index()
   {
      $recharges = RechargeHistory::paginate(10);
      $title = 'Trang danh sách bill';
      return view('Admin.RechargeHistory.indexRecharge', compact('title', 'recharges'));
   }
   public function IndexAddRecharge()
   {
      $title = "Trang thêm bill";
      $users = $this->user->getAll();
      return view('Admin.RechargeHistory.createRecharge', compact('title', 'users'));
   }
   public function AddNewRecharge(RechargeHistoryRequest $request)
   {
      $recharge = $this->recharge->AddNewRecharge($request);
      if ($recharge !== null) {
         toastr()->success('Bạn tạo thành công!');
         return redirect()->back();
      } else {
         toastr()->error('Tạo không thành công');
         return redirect()->back();
      }
   }
   public function IndexUpdateRecharge($id)
   {
      $title = "Trang sửa lịch sử nạp";
      $recharge = $this->recharge->FindRechargeHistory($id);
      $users = $this->user->getAll();
      return view('Admin.RechargeHistory.updateRecharge', compact('title', 'recharge', 'users'));
   }
   public function UpdateRecharge(RechargeHistoryRequest $request, $id)
   {
      $recharge = $this->recharge->UpdateRechargeHistory($request, $id);
      if ($recharge !== null) {
         toastr()->success('Bạn sửa thành công!');
         return redirect()->back();
      } else {
         toastr()->error('Sửa không thành công');
         return redirect()->back();
      }
   }
   public function DeleteRecharge($id)
   {
      $recharge = $this->recharge->FindRechargeHistory($id);
      try {
         $recharge->deleteOrFail(); // Xóa người dùng và nếu không thành công sẽ ném ra ngoại lệ
         toastr()->success('Đã xóa lịch sử nạp thành công!');
         return redirect()->route('recharge.index');
      } catch (ModelNotFoundException $e) {
         toastr()->error('Không tìm thấy lịch sử nạp để xóa!');
         return redirect()->route('recharge.index');
      } catch (\Exception $e) {
         toastr()->error('Đã xảy ra lỗi khi xóa lịch sử nạp!');
         return redirect()->route('recharge.index');
      }
   }
}