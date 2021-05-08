<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
}
