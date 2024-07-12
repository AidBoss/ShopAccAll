<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'account_name',
        'password',
        'email',
        'phone',
        'role',
        'balance',
        'deposit_history_id',
        'purchase_history_id',
    ];
    // có nhiều  lịch sử nạp tiền
    public function rechargeHistories()
    {
        return $this->hasMany(RechargeHistory::class, 'user_id');
    }
    // có nhiều lịch sử mua hàng
    public function purchaseHistories()
    {
        return $this->hasMany(PurchaseHistory::class);
    }
    /**public function account()
    {
        return $this->hasOne(Account::class);
    }
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public static function deduction()
    // {
    //     parent::deduction();
    //     static::created(function ($account) {
    //         // Lấy thông tin người dùng liên quan đến lịch sử nạp tiền.
    //         //  Giả sử model RechargeHistory có mối quan hệ với model User, 
    //         // phương thức user sẽ trả về đối tượng người dùng liên quan.
    //         $user = $account->user;
    //         // Tăng số dư của người dùng lên một lượng tương ứng với số tiền nạp (amount).
    //         $user->balance += $rechargeHistory->amount; // Tăng số dư của người dùng
    //         $user->save(); // Lưu lại số dư đã cập nhật vào cơ sở dữ liệu
    //     });
    // }
}
