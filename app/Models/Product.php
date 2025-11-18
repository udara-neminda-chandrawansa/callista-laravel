<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    // Fillable fields
    protected $fillable = [
        'name',
        'description',
        'old_price',
        'new_price',
        'rating',
        'barcode',
        'color',
        'vendor',
        'type',
        'weight',
        'size',
        'stock_status',
        'tags',
    ];

    // Cast tags JSON to array
    protected $casts = [
        'tags' => 'array',
    ];

    // Relation: A product has many images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
