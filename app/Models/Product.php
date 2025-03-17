<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'product_size',
        'user_id',
        'category_id',
        'subCategory_id',
        'brand_id',
        'unit_id',
        'warehouse_id',
        'supplier_id',
        'product_code',
        'min_qty',
        'quantity',
        'tax',
        'discount',
        'purchase_price',
        'price',
        'description',
        'product_slug',
        'image',
        'barcode_url',
        'status',
        'code',
        'wholesale_price',
        'retail_price',
        'alert_quantity',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
