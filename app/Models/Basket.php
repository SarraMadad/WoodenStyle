<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
