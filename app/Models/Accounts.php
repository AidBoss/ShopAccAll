<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{

    use HasFactory;
    // Khai báo các thuộc tính có thể gán giá trị hàng loạt
    protected $table = 'accounts'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = [
        'description',
        'price',
        'server',
        'ar',
        'nameAccount',
        'passAccount',
        'status',
        'account_type_id',
    ];
    public function purchaseHistory()
    {
        return $this->belongsTo(PurchaseHistory::class, 'account_id');
    }
    // 1 acc thuộc về 1 loại tài khoản
    public function category()
    {
        return $this->belongsTo(Categories::class, 'account_type_id');
    }
    // mỗi một acc có nhiều ảnh
    public function imagesOfAccount()
    {
        return $this->hasMany(ImageOfAccount::class, 'account_id');
    }
    // Định nghĩa các mối quan hệ
    public function characters()
    {
        return $this->belongsToMany(Characters::class, 'account_character', 'account_id', 'character_id');
    }
    // Một Account có nhiều Weapon
    public function weapons()
    {
        return $this->belongsToMany(Weapons::class, 'account_weapon', 'account_id', 'weapon_id')
            ->withTimestamps();
    }

    // Một Account thuộc về một Discount
    public function discount()
    {
        return $this->belongsTo(Discounts::class);
    }
    // m

    // Một Account thuộc về một Category

}
