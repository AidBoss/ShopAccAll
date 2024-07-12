<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;
    protected $table = 'purchase_history';
    protected $primaryKey = 'purchase_history_id';

    // Các thuộc tính có thể gán (mass assignable)
    protected $fillable = [
        'user_id',
        'account_id',
    ];

    /**
     * một lịch sử thuộc về1 tài khoản .
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * một lịch sử có 1 tài khoản.
     */
    public function account()
    {
        return $this->belongsTo(Accounts::class, 'account_id', 'id');
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     // Xử lý sự kiện sau khi tạo mới lịch sử mua hàng
    //     static::created(function ($purchaseHistory) {
    //         // Lấy thông tin người dùng liên quan đến lịch sử mua hàng.
    //         $user = $purchaseHistory->user;
    //         $account = $purchaseHistory->account;
    //         // Trừ số dư của người dùng một lượng tương ứng với số tiền mua (amount).
    //         if ($user->balance >= $account->price) {
    //             $user->balance -= $account->price; // Trừ số dư của người dùng
    //             $user->save(); // Lưu lại số dư đã cập nhật vào cơ sở dữ liệu
    //         } else {
    //             return null;
    //         }
    //     });
    // }
}
