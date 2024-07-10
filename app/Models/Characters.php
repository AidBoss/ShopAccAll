<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'category_id'
    ];
    // Một Character có thể thuộc về nhiều Account
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function accounts()
    {
        return $this->belongsToMany(Accounts::class, 'account_character', 'character_id', 'account_id')
            ->withTimestamps();
    }
}
