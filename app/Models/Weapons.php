<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'category_id'
    ];
    // Một Weapon có thể thuộc về nhiều Account
    public function accounts()
    {
        return $this->belongsToMany(Accounts::class, 'account_weapon')
            ->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
