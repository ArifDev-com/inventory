<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Product::all();
        return Product::select('name',
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
        'status')->get();

       
    }


    public function headings(): array
    {
        return [
     
        'name',
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
        'status'
      
        ];
    }


}
