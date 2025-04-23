<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', // This stores the category name
        'name',
        'price',
        'photo'
    ];

    // Define inverse relationship using category name
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'name');
    }
}
