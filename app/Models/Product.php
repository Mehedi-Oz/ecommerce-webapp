<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'featured_status' => 'boolean',
        'is_active' => 'boolean',
        'regular_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
    ];

    /**
     * Relationship: Product has many Product Images.
     */
    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Relationship: Product belongs to a Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: Product belongs to a Subcategory.
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * Relationship: Product belongs to a Brand.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Relationship: Product belongs to a Unit.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
