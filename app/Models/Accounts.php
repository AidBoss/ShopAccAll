<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    // Khai báo các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'description',
        'price',
        'server',
        'ar',
        'status',
        'account_type_id',
    ];

    // Định nghĩa các mối quan hệ
    // Một Account có nhiều Character
    // Một Account có nhiều Character
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

    // Một Account thuộc về một Category
    public function category()
    {
        return $this->belongsTo(Categories::class, 'account_type_id');
    }

    // mỗi một acc có nhiều ảnh
    public function imagesOfAccount()
    {
        return $this->hasMany(ImageOfAccount::class);
    }
}
