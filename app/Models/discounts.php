<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discounts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'percentage',
        'start_date',
        'end_date',
        'account_type_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'account_type_id');
    }
}
