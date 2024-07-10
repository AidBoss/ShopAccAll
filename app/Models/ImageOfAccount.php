<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageOfAccount extends Model
{
    use HasFactory;
    protected $table = 'images_of_accounts';
    protected $fillable = [
        'account_id',
        'path',
    ];
    // mỗi ảnh thuộc về một tài khoản 
    public function account()
    {
        return $this->belongsTo(Accounts::class);
    }
}
