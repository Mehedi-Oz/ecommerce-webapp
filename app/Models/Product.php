<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'unit_id',
        'name',
        'code',
        'model',
        'stock_amount',
        'regular_price',
        'selling_price',
        'short_description',
        'long_description',
        'image',
        'hit_count',
        'sales_count',
        'featured_status',
        'is_active',
    ];

    protected $casts = [
        'featured_status' => 'boolean',
        'is_active' => 'boolean',
        'regular_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
    ];

    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
