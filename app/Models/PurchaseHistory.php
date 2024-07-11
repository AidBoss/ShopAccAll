<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;
    protected $table = 'purchase_history';

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
        return $this->hasOne(Accounts::class, 'account_id');
    }
}
