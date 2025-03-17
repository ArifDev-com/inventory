<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            'role_id' => 1,
            'permission' => '{"manage_roles":"1","manage_warehouse":"1","manage_products":"1","manage_users":"1","manage_sale":"1","manage_transfer":"1","manage_damage_ptoduct":"1","manage_sub_category":"1","manage_brands":"1","manage_units":"1","manage_suppliers":"1","manage_expense_category":"1","manage_purchase_return":"1","manage_adjustment":"1","manage_city":"1","manage_currency":"1","manage_product_category":"1","manage_customers":"1","manage_expenses":"1","manage_purchase":"1","manage_sale_return":"1","manage_quotations":"1"}'
        ]);
    }
}
