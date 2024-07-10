<?php

namespace App\Services;

use App\Models\RechargeHistory;
use Illuminate\Http\Request;
use App\Http\Requests\RechargeHistoryRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RechargeHistoryService
{
    public function GetAll()
    {
        $recharge = RechargeHistory::all();
        return $recharge;
    }
    public function FindRechargeHistory($id)
    {
        $ob = RechargeHistory::find($id);
        if ($ob !== null) {
            return $ob;
        } else {
            return null;
        }
    }
    public function AddNewRecharge(RechargeHistoryRequest $request)
    {
        $exists  = RechargeHistory::where('transaction_code', 'like', "%$request->transaction_code;%")->exists();
        if ($exists) {
            // giao dịch đã tồn tại
            toastr()->error('Giao dịch đã tồn tại!');
            return null;
        } else {
            $RechargeH = RechargeHistory::create([
                'transaction_code' => $request->transaction_code,
                'bank_name' => $request->bank_name,
                'content_recharge' => $request->content_bill,
                'amount' => $request->amount,
                'user_id' => $request->user_id,
            ]);
            return $RechargeH;
        }
    }
    // public function filterUserOfRecharge($selectedCate)
    // {
    //     return RechargeHistory::whereHas('user_id', function ($query) use ($selectedCate) {
    //         $query->where('username', $selectedCate);
    //     });
    // }
    public function UpdateRechargeHistory(RechargeHistoryRequest $request, $id)
    {
        try {
            // Tìm kiếm và cập nhật đối tượng RechargeHistory
            $recharge = RechargeHistory::findOrFail($id);
            // Cập nhật các trường của bản ghi
            $recharge->update([
                'transaction_code' => $request->transaction_code,
                'bank_name' => $request->bank_name,
                'content_recharge' => $request->content_bill, // Tên cột trong cơ sở dữ liệu là content_recharge, chắc chắn rằng tên thuộc tính trong request khớp với tên cột.
                'amount' => $request->amount,
                'user_id' => $request->user_id,
            ]);
            return $recharge;
        } catch (ModelNotFoundException $e) {
            // Xử lý khi không tìm thấy giao dịch
            toastr()->error('Giao dịch không tồn tại!');
            return null;
        }
    }
}