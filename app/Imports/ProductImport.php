<?php
namespace App\Imports;

use App\Models\Product;

use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel {
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {
 
       // Check email already exists
      //  $count = Product::where('product_slug',$row[4])->count();
      //  if($count > 0){
      //     return null;
      //  }
       return new Product([
          'name' => $row[0],
         //  'user_id' => $row[1],
         //  'product_slug' => $row[2],
         //  'category_id' => $row[3],
         //  'subCategory_id' => $row[4],
         //  'brand_id' => $row[5],
         //  'unit_id' => $row[6],
         //  'warehouse_id' => $row[7],
         //  'supplier_id' => $row[8],
         //  'product_code' => $row[9],
         //  'min_qty' => $row[10],
         //  'quantity' => $row[11],
         //  'tax' => $row[12],
         //  'discount' => $row[13],
         //  'purchase_price' => $row[14],
         //  'price' => $row[15],
         //  'description' => $row[16],
         //  'image' => $row[17],
            'barcode_url' => $row[1],
         //  'status' => $row[19],
       ]);
    }

}
