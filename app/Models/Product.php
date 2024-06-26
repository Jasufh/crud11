<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'color',
        'category_id',
        'price',
        'img'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
