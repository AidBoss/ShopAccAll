<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargeHistory extends Model
{
    use HasFactory;
    protected $table = 'account_recharge_history';

    protected $fillable = [
        'transaction_code',
        'bank_name',
        'content_recharge',
        'amount',
        'user_id'
    ];

    // Một bản ghi nạp tiền thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Gọi phương thức boot của lớp cha (Illuminate\Database\Eloquent\Model) 
    // để đảm bảo rằng tất cả các chức năng mặc định của Laravel Eloquent vẫn hoạt động.

    protected static function boot()
    {
        parent::boot();
        // Xử lý sự kiện sau khi tạo mới lịch sử nạp tiền
        //Đăng ký một hàm xử lý sự kiện cho sự kiện created. Sự kiện này sẽ được gọi mỗi khi một bản ghi mới của model được tạo và lưu vào cơ sở dữ liệu
        static::created(function ($rechargeHistory) {
            // Lấy thông tin người dùng liên quan đến lịch sử nạp tiền.
            //  Giả sử model RechargeHistory có mối quan hệ với model User, 
            // phương thức user sẽ trả về đối tượng người dùng liên quan.
            $user = $rechargeHistory->user;
            // Tăng số dư của người dùng lên một lượng tương ứng với số tiền nạp (amount).
            $user->balance += $rechargeHistory->amount; // Tăng số dư của người dùng
            $user->save(); // Lưu lại số dư đã cập nhật vào cơ sở dữ liệu
        });
    }
}
