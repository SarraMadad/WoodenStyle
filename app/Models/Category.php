<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Nécessaire pour que les seeds n'ajoutent pas les champs created_at et updated_at
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];
}
