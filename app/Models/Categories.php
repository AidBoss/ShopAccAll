<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_type',
        'image',
        'quantity'
    ];
    public function accounts()
    {
        return $this->hasMany(Accounts::class, 'account_type_id');
    }
    public function characters()
    {
        return $this->hasMany(Characters::class);
    }
    public function discounts()
    {
        return $this->hasMany(Discounts::class, 'account_type_id');
    }
}