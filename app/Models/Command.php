<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'totalAmount',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
