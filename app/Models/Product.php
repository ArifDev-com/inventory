<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = [
        // 'current_stock',
    ];
    protected $casts = [
        'wholesale_price' => 'integer',
        'retail_price' => 'integer',
        'price' => 'integer',
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

    // set actiive status query scope by default
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function ($builder) {
            $builder->where('status', 'active');
        });
    }

    public function user()
    {
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

    public function stockUpdates()
    {
        return $this->hasMany(ProductStockUpdate::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function saleReturns()
    {
        return $this->hasMany(SaleReturnItem::class);
    }

    public function approvedSaleReturns()
    {
        return $this->saleReturns()->whereHas('saleReturn', function ($query) {
            $query->where('status', 'received');
        });
    }

    public function getCurrentStockAttribute()
    {
        // add stock from return amount later
        return $this->quantity + $this->stockUpdates()->sum('quantity') + $this->purchaseItems()->sum('quantity') - $this->saleItems()->sum('quantity') + $this->approvedSaleReturns()->sum('quantity');
    }

    public function stockQuantityAtStartOf($date): int
    {
        $purchasesBefore = $this->purchaseItems()
            ->whereDate('created_at', '<', $date)
            ->sum('quantity');

        $salesBefore = $this->saleItems()
            ->whereDate('created_at', '<', $date)
            ->sum('quantity');

        $stockUpdatesBefore = $this->stockUpdates()
            ->whereDate('created_at', '<', $date)
            ->sum('quantity');

        $approvedSaleReturnsBefore = $this->approvedSaleReturns()
            ->whereDate('created_at', '<', $date)
            ->sum('quantity');

        return $this->quantity + $purchasesBefore + $stockUpdatesBefore - $salesBefore + $approvedSaleReturnsBefore;
    }

    public function stockQuantityAtEndOf($date): int
    {
        $purchasesUpToDate = $this->purchaseItems()
            ->whereDate('created_at', '<=', $date)
            ->sum('quantity');

        $salesUpToDate = $this->saleItems()
            ->whereDate('created_at', '<=', $date)
            ->sum('quantity');

        $stockUpdatesUpToDate = $this->stockUpdates()
            ->whereDate('created_at', '<=', $date)
            ->sum('quantity');

        $approvedSaleReturnsUpToDate = $this->approvedSaleReturns()
            ->whereDate('created_at', '<=', $date)
            ->sum('quantity');

        // dump($this->quantity , $purchasesUpToDate , $stockUpdatesUpToDate , $salesUpToDate);
        return $this->quantity + $purchasesUpToDate + $stockUpdatesUpToDate - $salesUpToDate + $approvedSaleReturnsUpToDate;
    }
}
