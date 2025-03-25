<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/client/register', [App\Http\Controllers\AdminController::class, 'clientRegister'])->name('client.register');
Route::post('/client/register/store', [App\Http\Controllers\AdminController::class, 'clientRegisterStore'])->name('client.register.store');

// SMS Testing
// Route::get('/sms',[App\Http\Controllers\LoginController::class,'smsTest'])->name('sms');

Route::get('/', function () {
    return view('admin.signin');
});

Route::get('/otp/new/password', function () {
    return view('admin.new_password');
});

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [App\Http\Controllers\LoginController::class, 'loginForm'])->name('login');
    Route::get('/register', [App\Http\Controllers\LoginController::class, 'registerForm'])->name('register');

    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('store.register');

    // Forgot Password Route
    Route::get('/forgot/password', [App\Http\Controllers\LoginController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/otp/new/password', [App\Http\Controllers\LoginController::class, 'updateOtp'])->name('update.otp');
    Route::post('/reset/password', [App\Http\Controllers\LoginController::class, 'updateResetPassword'])->name('update.reset.password');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
    Route::get('/super/dashboard', [App\Http\Controllers\AdminController::class, 'superDashboard'])->name('super.home');

    Route::get('/reports-summary', function () {
        return view('admin.reports_summary');
    })->name('reportssummary');

    Route::get('/dashboard-two', function () {
        return view('admin.dashboard-two');
    });

    Route::get('/dashboard-three', function () {
        return view('admin.dashboard-three');
    });

    Route::get('/warehouse-one', function () {
        return view('admin.warehouse_one');
    });

    Route::get('/warehouse-two', function () {
        return view('admin.warehouse_two');
    });

    Route::get('/calculator', function () {
        return view('admin.calculator');
    });

    Route::get('/documents', function () {
        return view('admin.documents');
    });

    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    // Category here
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

    // Route::get('/category-all', [App\Http\Controllers\CategoryController::class, 'readData'])->name('category.all');

    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');

    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');

    Route::get('/category/edit/{cat_id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');

    Route::post('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

    Route::delete('/category/delete/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');

    // subCategory here
    Route::get('/subCategories', [App\Http\Controllers\SubCategoryController::class, 'index'])->name('subCategory.index');

    Route::get('/subCategory/create', [App\Http\Controllers\SubCategoryController::class, 'create'])->name('subCategory.create');

    Route::post('/subCategory/store', [App\Http\Controllers\SubCategoryController::class, 'store'])->name('subCategory.store');

    Route::get('/subCategory/edit/{subCat_id}', [App\Http\Controllers\SubCategoryController::class, 'edit'])->name('subCategory.edit');

    Route::post('/subCategory/update/{id}', [App\Http\Controllers\SubCategoryController::class, 'update'])->name('subCategory.update');

    Route::delete('/subCategory/delete/{subCategory}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->name('subCategory.delete');

    // Brand here
    Route::get('/brands', [App\Http\Controllers\BrandController::class, 'index'])->name('brand.index');

    Route::get('/brand/create', [App\Http\Controllers\BrandController::class, 'create'])->name('brand.create');

    Route::post('/brand/store', [App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');

    Route::get('/brand/edit/{br_id}', [App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');

    Route::post('/brand/update/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');

    Route::delete('/brand/delete/{brand}', [App\Http\Controllers\BrandController::class, 'destroy'])->name('brand.delete');

    // Unit here
    Route::get('/units', [App\Http\Controllers\UnitController::class, 'index'])->name('unit.index');

    Route::get('/unit/create', [App\Http\Controllers\UnitController::class, 'create'])->name('unit.create');

    Route::post('/unit/store', [App\Http\Controllers\UnitController::class, 'store'])->name('unit.store');

    Route::get('/unit/edit/{unit_id}', [App\Http\Controllers\UnitController::class, 'edit'])->name('unit.edit');

    Route::post('/unit/update/{id}', [App\Http\Controllers\UnitController::class, 'update'])->name('unit.update');

    Route::delete('/unit/delete/{unit}', [App\Http\Controllers\UnitController::class, 'destroy'])->name('unit.delete');

    // City here
    Route::get('/cities', [App\Http\Controllers\CityController::class, 'index'])->name('city.index');

    Route::get('/city/create', [App\Http\Controllers\CityController::class, 'create'])->name('city.create');

    Route::post('/city/store', [App\Http\Controllers\CityController::class, 'store'])->name('city.store');

    Route::get('/city/edit/{city_id}', [App\Http\Controllers\CityController::class, 'edit'])->name('city.edit');

    Route::post('/city/update/{id}', [App\Http\Controllers\CityController::class, 'update'])->name('city.update');

    Route::delete('/city/delete/{city}', [App\Http\Controllers\CityController::class, 'destroy'])->name('city.delete');

    // Country here
    Route::get('/countries', [App\Http\Controllers\CountryController::class, 'index'])->name('country.index');

    Route::get('/country/create', [App\Http\Controllers\CountryController::class, 'create'])->name('country.create');

    Route::post('/country/store', [App\Http\Controllers\CountryController::class, 'store'])->name('country.store');

    Route::get('/country/edit/{con_id}', [App\Http\Controllers\CountryController::class, 'edit'])->name('country.edit');

    Route::post('/country/update/{id}', [App\Http\Controllers\CountryController::class, 'update'])->name('country.update');

    Route::delete('/country/delete/{country}', [App\Http\Controllers\CountryController::class, 'destroy'])->name('country.delete');

    // Warehouse here
    Route::get('/warehouses', [App\Http\Controllers\WarehouseController::class, 'index'])->name('warehouse.index');

    Route::get('/warehouse/create', [App\Http\Controllers\WarehouseController::class, 'create'])->name('warehouse.create');

    Route::post('/warehouse/store', [App\Http\Controllers\WarehouseController::class, 'store'])->name('warehouse.store');

    Route::get('/warehouse/edit/{whouse_id}', [App\Http\Controllers\WarehouseController::class, 'edit'])->name('warehouse.edit');

    Route::post('/warehouse/update/{id}', [App\Http\Controllers\WarehouseController::class, 'update'])->name('warehouse.update');

    Route::delete('/warehouse/delete/{warehouse}', [App\Http\Controllers\WarehouseController::class, 'destroy'])->name('warehouse.delete');

    // Route::get('/warehouse/details/{id}',[App\Http\Controllers\WarehouseController::class,'details'])->name('warehouse.details');

    // supplier here
    // Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index');

    Route::get('/supplier/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');

    Route::post('/supplier/store', [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');

    // store customer with modal
    Route::post('/supplier/store-modal', [App\Http\Controllers\SupplierController::class, 'storeModal'])->name('supplier.store.modal');

    Route::get('/supplier/edit/{supp_id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');

    Route::post('/supplier/update/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');

    Route::get('/supplier/delete/{supplier}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.delete');

    Route::get('/supplier/details', [App\Http\Controllers\SupplierController::class, 'details'])->name('supplier.details');

    // Route::get('/supplier/details/{id}',[App\Http\Controllers\SupplierController::class,'detailsSup'])->name('supplier.details');

    // Product here
    Route::get('/products/inactive', [App\Http\Controllers\ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

    Route::get('/products/showroom', [App\Http\Controllers\ProductController::class, 'indexShowroom'])->name('product.showroom');

    Route::get('/products/godown', [App\Http\Controllers\ProductController::class, 'indexGodown'])->name('product.godown');

    Route::get('/products/category', [App\Http\Controllers\ProductController::class, 'indexCategory'])->name('product.category');

    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');

    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

    Route::get('/product/edit/{pro_id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

    Route::post('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

    Route::delete('/product/delete/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/product_details/{id}', [App\Http\Controllers\ProductController::class, 'product_details'])->name('product.details');

    Route::get('/products-import', [App\Http\Controllers\ProductController::class, 'import'])->name('product.import');

    Route::get('/products-export', [App\Http\Controllers\ProductController::class, 'export'])->name('product.export');

    Route::post('product/importdata/', [App\Http\Controllers\ProductController::class, 'importData'])->name('product.importdata');

    Route::post('product/validateandimportdata/', [App\Http\Controllers\ProductController::class, 'validateAndImportdata'])->name('product.validateandimportdata');

    Route::get('/product/stock', [App\Http\Controllers\ProductController::class, 'stock'])->name('product.stock');
    Route::post('/product/stock/update', [App\Http\Controllers\ProductController::class, 'stockUpdate'])->name('product.stock.update');

    Route::get('/product/stock/history', [App\Http\Controllers\ProductController::class, 'stockHistory'])->name('product.stock.history');

    Route::get('/barcode-pdf', [App\Http\Controllers\ProductController::class, 'barcodePDF'])->name('barcode.pdf');

    // Language

    // Route::get('lang/home', [LanguageController::class, 'index']);
    Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');

    // Barcode here
    Route::get('/barcode', [App\Http\Controllers\BarcodeController::class, 'barcode'])->name('barcode');

    Route::get('/barcode/create', [App\Http\Controllers\BarcodeController::class, 'createBarcode'])->name('barcode.create');

    // search here
    Route::get('/search-products', [App\Http\Controllers\BarcodeController::class, 'searchProduct'])->name('search.product');

    Route::get('/find-products', [App\Http\Controllers\BarcodeController::class, 'findProducts'])->name('find.products');

    // User here
    Route::get('/customer/bulk-sms', [App\Http\Controllers\CustomerController::class, 'bulkSms'])->name('customer.bulk.sms');
    Route::post('/customer/bulk-sms', [App\Http\Controllers\CustomerController::class, 'sendBulkSms'])->name('customer.bulk.sms.send');
    Route::get('/customer/search', [App\Http\Controllers\CustomerController::class, 'searchCustomer'])->name('customer.search');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');

    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

    Route::get('/user/edit/{user_id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

    Route::post('/user/update/{user_id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

    Route::delete('/user/delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

    Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');

    // Role here
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');

    Route::get('/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create');

    Route::post('/role/store', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');

    Route::get('/role/edit/{user_id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');

    Route::post('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');

    Route::delete('/role/delete/{user}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.delete');

    // Permission here
    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');

    Route::get('/permission/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');

    Route::post('/permission/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');

    Route::get('/permission/edit/{per_id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');

    Route::post('/permission/update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');

    Route::delete('/permission/delete/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.delete');

    // Expense category here
    Route::get('/expenseCategories', [App\Http\Controllers\ExpenseCategoryController::class, 'index'])->name('expense.category.index');

    Route::get('/expenseCategory/create', [App\Http\Controllers\ExpenseCategoryController::class, 'create'])->name('expense.category.create');

    Route::post('/expenseCategory/store', [App\Http\Controllers\ExpenseCategoryController::class, 'store'])->name('expense.category.store');

    Route::get('/expenseCategory/edit/{expCat_id}', [App\Http\Controllers\ExpenseCategoryController::class, 'edit'])->name('expense.category.edit');

    Route::post('/expenseCategory/update/{id}', [App\Http\Controllers\ExpenseCategoryController::class, 'update'])->name('expense.category.update');

    Route::delete('/expenseCategory/delete/{expCategory}', [App\Http\Controllers\ExpenseCategoryController::class, 'destroy'])->name('expense.category.delete');

    // Expense here
    Route::get('/expenses', [App\Http\Controllers\ExpenseController::class, 'index'])->name('expense.index');

    Route::get('/expense/create', [App\Http\Controllers\ExpenseController::class, 'create'])->name('expense.create');

    Route::post('/expense/store', [App\Http\Controllers\ExpenseController::class, 'store'])->name('expense.store');

    Route::get('/expense/edit/{exp_id}', [App\Http\Controllers\ExpenseController::class, 'edit'])->name('expense.edit');

    Route::post('/expense/update/{id}', [App\Http\Controllers\ExpenseController::class, 'update'])->name('expense.update');

    Route::delete('/expense/delete/{expense}', [App\Http\Controllers\ExpenseController::class, 'destroy'])->name('expense.delete');

    // Extra Expense category here
    Route::get('/extra/expenseCategories', [App\Http\Controllers\ExpenseCategoryController::class, 'extraCategoryList'])->name('extra.expense.category.index');
    Route::get('/extra/expenseCategory/create', [App\Http\Controllers\ExpenseCategoryController::class, 'createExtra'])->name('extra.expense.category.create');
    Route::post('/extra/expenseCategory/store', [App\Http\Controllers\ExpenseCategoryController::class, 'storeExtra'])->name('extra.expense.category.store');
    Route::get('/extra/expenseCategory/edit/{id}', [App\Http\Controllers\ExpenseCategoryController::class, 'editExtra'])->name('extra.expense.category.edit');
    Route::post('/extra/expenseCategory/update/{id}', [App\Http\Controllers\ExpenseCategoryController::class, 'updateExtra'])->name('extra.expense.category.update');

    // Extra Expense here
    Route::get('/extra/expenses', [App\Http\Controllers\ExpenseController::class, 'extraExpenseList'])->name('extra.expense.index');
    Route::get('/extra/expense/create', [App\Http\Controllers\ExpenseController::class, 'createExtra'])->name('extra.expense.create');
    Route::post('/extra/expense/store', [App\Http\Controllers\ExpenseController::class, 'storeExtra'])->name('extra.expense.store');
    Route::get('/extra/expense/edit/{id}', [App\Http\Controllers\ExpenseController::class, 'editExtra'])->name('extra.expense.edit');
    Route::post('/extra/expense/update/{id}', [App\Http\Controllers\ExpenseController::class, 'updateExtra'])->name('extra.expense.update');

    // Purchase here

    Route::get('/purchases', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchase.index');

    Route::get('/purchase/create', [App\Http\Controllers\PurchaseController::class, 'create'])->name('purchase.create');

    Route::post('/purchase/store', [App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase.store');

    Route::get('/purchase/edit/{purch_id}', [App\Http\Controllers\PurchaseController::class, 'edit'])->name('purchase.edit');

    Route::post('/purchase/update/{id}', [App\Http\Controllers\PurchaseController::class, 'update'])->name('purchase.update');

    Route::get('/purchase/delete/{purch_id}', [App\Http\Controllers\PurchaseController::class, 'destroy'])->name('purchase.delete');

    Route::get('/purchase-details/{purch_id}', [App\Http\Controllers\PurchaseController::class, 'purchase_details'])->name('purchase.details');

    Route::get('/purchase-pdf/{purchase}', [App\Http\Controllers\PurchaseController::class, 'generatePDF'])->name('purchase.pdf');
    // search here
    Route::get('/search-products', [App\Http\Controllers\PurchaseController::class, 'searchProduct'])->name('search.product');

    Route::get('/find-products-purchase', [App\Http\Controllers\PurchaseController::class, 'findProductsPurchase'])->name('find.products.purchase');

    // pos here

    Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos.index');

    // Quotation here

    Route::get('/quotations', [App\Http\Controllers\QuotationController::class, 'index'])->name('quotation.index');

    Route::get('/quotation/create', [App\Http\Controllers\QuotationController::class, 'create'])->name('quotation.create');

    Route::post('/quotation/store', [App\Http\Controllers\QuotationController::class, 'store'])->name('quotation.store');

    Route::get('/quotation/edit/{quo_id}', [App\Http\Controllers\QuotationController::class, 'edit'])->name('quotation.edit');

    Route::post('/quotation/update/{id}', [App\Http\Controllers\QuotationController::class, 'update'])->name('quotation.update');

    Route::get('/quotation/delete/{quo_id}', [App\Http\Controllers\QuotationController::class, 'destroy'])->name('quotation.delete');

    Route::get('/quotation-pdf/{quotation}', [App\Http\Controllers\QuotationController::class, 'generatePDF'])->name('quotation.pdf');

    Route::get('/move/sale/{id}', [App\Http\Controllers\QuotationController::class, 'move_sale'])->name('quotation.move_sale');

    // Search here

    Route::get('/search-products', [App\Http\Controllers\QuotationController::class, 'searchProduct'])->name('search.product');

    // Route::get('/find-products',[App\Http\Controllers\QuotationController::class,'findProducts'])->name('find.products');

    // Customer here

    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/print', [App\Http\Controllers\CustomerController::class, 'print'])->name('customer.print');
    Route::get('/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::get('/customer/{customer}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');

    Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    // store customer with modal
    Route::post('/customer/store-modal', [App\Http\Controllers\CustomerController::class, 'storeModal'])->name('customer.store.modal');

    Route::get('/customer/edit/{cus_id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');

    Route::post('/customer/update/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');

    Route::get('/customer/delete/{cus_id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.delete');

    Route::get('/customer/details/{customer}', [App\Http\Controllers\CustomerController::class, 'details'])->name('customer.details');

    // Route::get('/customer/due/{customer}', [App\Http\Controllers\CustomerController::class, 'dueResponse'])->name('customer.due');

    Route::get('/customer/due/pay', [App\Http\Controllers\PaymentController::class, 'createDuePay'])->name('due.payment');
    Route::post('/customer/due/pay', [App\Http\Controllers\PaymentController::class, 'duePay']);
    Route::get('/customer/due/pay/list', [App\Http\Controllers\PaymentController::class, 'duePayList'])->name('due.payments');

    Route::post('/customer/sup/pay', [App\Http\Controllers\PaymentController::class, 'supPay'])->name('sup.payment');

    // Sale here
    Route::get('/sales', [App\Http\Controllers\SaleController::class, 'index'])->name('sale.index');

    Route::get('/sale/create', [App\Http\Controllers\SaleController::class, 'create'])->name('sale.create');

    Route::post('/sale/store', [App\Http\Controllers\SaleController::class, 'store'])->name('sale.store');
    Route::get('/sale/cancel/{sale}', [App\Http\Controllers\SaleController::class, 'cancel'])->name('sale.cancel');
    Route::get('/sale/cancel/undo/{sale}', [App\Http\Controllers\SaleController::class, 'cancelUndo'])->name('sale.cancel.undo');
    Route::get('/sale/edit/{sale_id}', [App\Http\Controllers\SaleController::class, 'edit'])->name('sale.edit');

    Route::get('/sale/return/list', [App\Http\Controllers\SaleReturnController::class, 'index'])->name('sale.return.list');
    Route::get('/sale/return/{sale?}', [App\Http\Controllers\SaleReturnController::class, 'create'])
        ->name('sale.return');
    Route::post('/sale/return/store', [App\Http\Controllers\SaleReturnController::class, 'store'])->name('sale.return.store');
    Route::get('/sale/return/pdf/{saleReturn}', [App\Http\Controllers\SaleReturnController::class, 'generatePDF'])->name('sale.return.pdf');
    Route::get('/sale/return/delete/{saleReturn}', [App\Http\Controllers\SaleReturnController::class, 'destroy'])->name('sale.return.delete');
    Route::get('/sale/return/approve/{saleReturn}', [App\Http\Controllers\SaleReturnController::class, 'approve'])->name('sale.return.approve');

    Route::post('/sale/update/{id}', [App\Http\Controllers\SaleController::class, 'update'])->name('sale.update');

    Route::get('/sale/delete/{sale_id}', [App\Http\Controllers\SaleController::class, 'destroy'])->name('sale.delete');

    Route::get('/sale-pdf/{sale}', [App\Http\Controllers\SaleController::class, 'generatePDF'])->name('sale.pdf');
    Route::get('/sale-challan-pdf/{sale}', [App\Http\Controllers\SaleController::class, 'generateChallanPDF'])->name('sale.challan.pdf');

    Route::get('/sale_details/{sale_id}', [App\Http\Controllers\SaleController::class, 'sale_details'])->name('sale.details');
    // search here
    Route::get('/search-products', [App\Http\Controllers\SaleController::class, 'searchProduct'])->name('search.product');

    Route::get('/find-products', [App\Http\Controllers\SaleController::class, 'findProducts'])->name('find.products');

    Route::post('/quotation-store', [App\Http\Controllers\SaleController::class, 'quotation_store'])->name('quotation.store');

    // Transfer here

    Route::get('/transfers', [App\Http\Controllers\TransferController::class, 'index'])->name('transfer.index');

    Route::get('/transfer/create', [App\Http\Controllers\TransferController::class, 'create'])->name('transfer.create');

    Route::post('/transfer/store', [App\Http\Controllers\TransferController::class, 'store'])->name('transfer.store');

    Route::get('/transfer/edit/{trans_id}', [App\Http\Controllers\TransferController::class, 'edit'])->name('transfer.edit');

    Route::post('/transfer/update/{id}', [App\Http\Controllers\TransferController::class, 'update'])->name('transfer.update');

    Route::get('/transfer/delete/{trans_id}', [App\Http\Controllers\TransferController::class, 'destroy'])->name('transfer.delete');

    Route::get('/transfer-pdf/{transfer}', [App\Http\Controllers\TransferController::class, 'generatePDF'])->name('transfer.pdf');
    // Search here
    Route::get('/search-products', [App\Http\Controllers\TransferController::class, 'searchProduct'])->name('search.product');

    // Route::get('/find-products',[App\Http\Controllers\TransferController::class,'findProducts'])->name('find.products');

    // Adjustments here

    Route::get('/adjustments', [App\Http\Controllers\AdjustmentController::class, 'index'])->name('adjustment.index');

    Route::get('/adjustment/create', [App\Http\Controllers\AdjustmentController::class, 'create'])->name('adjustment.create');

    Route::post('/adjustment/store', [App\Http\Controllers\AdjustmentController::class, 'store'])->name('adjustment.store');

    Route::get('/adjustment/edit/{adj_id}', [App\Http\Controllers\AdjustmentController::class, 'edit'])->name('adjustment.edit');

    Route::post('/adjustment/update/{id}', [App\Http\Controllers\AdjustmentController::class, 'update'])->name('adjustment.update');

    Route::delete('/adjustment/delete/{adjustment}', [App\Http\Controllers\AdjustmentController::class, 'destroy'])->name('adjustment.delete');

    // Search here
    Route::get('/search-products', [App\Http\Controllers\AdjustmentController::class, 'searchProduct'])->name('search.product');

    // Route::get('/find-products',[App\Http\Controllers\AdjustmentController::class,'findProducts'])->name('find.products');

    // Damage Product here

    Route::get('/damageProducts', [App\Http\Controllers\DamageProductController::class, 'index'])->name('damage.product.index');

    Route::get('/damageProduct/create', [App\Http\Controllers\DamageProductController::class, 'create'])->name('damage.product.create');

    Route::post('/damageProduct/store', [App\Http\Controllers\DamageProductController::class, 'store'])->name('damage.product.store');

    Route::get('/damageProduct/edit/{daPro_id}', [App\Http\Controllers\DamageProductController::class, 'edit'])->name('damage.product.edit');

    Route::post('/damageProduct/update/{id}', [App\Http\Controllers\DamageProductController::class, 'update'])->name('damage.product.update');

    Route::get('/damageProduct/delete/{daPro_id}', [App\Http\Controllers\DamageProductController::class, 'destroy'])->name('damage.product.delete');

    Route::get('/damageProduct-pdf/{damageProduct}', [App\Http\Controllers\DamageProductController::class, 'generatePDF'])->name('damage.product.pdf');

    // Search here
    Route::get('/search-products', [App\Http\Controllers\DamageProductController::class, 'searchProduct'])->name('search.product');

    // Route::get('/find-products',[App\Http\Controllers\DamageProductController::class,'findProducts'])->name('find.products');

    // Currency here
    Route::get('/currencies', [App\Http\Controllers\CurrencyController::class, 'index'])->name('currency.index');

    Route::get('/currency/create', [App\Http\Controllers\CurrencyController::class, 'create'])->name('currency.create');

    Route::post('/currency/store', [App\Http\Controllers\CurrencyController::class, 'store'])->name('currency.store');

    Route::get('/currency/edit/{curr_id}', [App\Http\Controllers\CurrencyController::class, 'edit'])->name('currency.edit');

    Route::post('/currency/update/{id}', [App\Http\Controllers\CurrencyController::class, 'update'])->name('currency.update');

    Route::delete('currency/delete/{currency}', [App\Http\Controllers\CurrencyController::class, 'destroy'])->name('currency.delete');

    // Sale Return here
    Route::get('/saleReturns', [App\Http\Controllers\SaleReturnController::class, 'index'])->name('saleReturn.index');

    Route::get('/saleReturn/create', [App\Http\Controllers\SaleReturnController::class, 'create'])->name('saleReturn.create');

    Route::post('/saleReturn/store', [App\Http\Controllers\SaleReturnController::class, 'store'])->name('saleReturn.store');

    Route::get('/saleReturn/edit/{saleRet_id}', [App\Http\Controllers\SaleReturnController::class, 'edit'])->name('saleReturn.edit');

    Route::post('/saleReturn/update/{id}', [App\Http\Controllers\SaleReturnController::class, 'update'])->name('saleReturn.update');

    Route::get('/saleReturn/delete/{saleRet_id}', [App\Http\Controllers\SaleReturnController::class, 'destroy'])->name('saleReturn.delete');

    Route::get('/saleReturn-pdf/{saleReturn}', [App\Http\Controllers\SaleReturnController::class, 'generatePDF'])->name('saleReturn.pdf');
    // Search here
    Route::get('/search-products', [App\Http\Controllers\SaleReturnController::class, 'searchProduct'])->name('search.product');

    // Route::get('/find-products',[App\Http\Controllers\SaleReturnController::class,'findProducts'])->name('find.products');

    // Purchase Return here
    Route::get('/purchaseReturns', [App\Http\Controllers\PurchaseReturnController::class, 'index'])->name('purchaseReturn.index');

    Route::get('/purchaseReturn/create', [App\Http\Controllers\PurchaseReturnController::class, 'create'])->name('purchaseReturn.create');

    Route::post('/purchaseReturn/store', [App\Http\Controllers\PurchaseReturnController::class, 'store'])->name('purchaseReturn.store');

    Route::get('/purchaseReturn/edit/{purRet_id}', [App\Http\Controllers\PurchaseReturnController::class, 'edit'])->name('purchaseReturn.edit');

    Route::post('/purchaseReturn/update/{id}', [App\Http\Controllers\PurchaseReturnController::class, 'update'])->name('purchaseReturn.update');

    Route::get('/purchaseReturn/delete/{purRet_id}', [App\Http\Controllers\PurchaseReturnController::class, 'destroy'])->name('purchaseReturn.delete');

    Route::get('/purchaseReturn-pdf/{purchaseReturn}', [App\Http\Controllers\PurchaseReturnController::class, 'generatePDF'])->name('purchaseReturn.pdf');

    // Search here
    Route::get('/search-products', [App\Http\Controllers\PurchaseReturnController::class, 'searchProduct'])->name('search.product');

    // Route::get('/find-products',[App\Http\Controllers\PurchaseReturnController::class,'findProducts'])->name('find.products');

    // Report here
    Route::get('/purchase-orderReports', [App\Http\Controllers\ReportController::class, 'purchaseOrder'])->name('purchase.orderReport');

    Route::get('/purchase-reports', [App\Http\Controllers\ReportController::class, 'purchaseReport'])->name('purchase.report');

    Route::get('/sale-reports', [App\Http\Controllers\ReportController::class, 'saleReport'])->name('sale.report');
    Route::get('/due-reports', [App\Http\Controllers\ReportController::class, 'dueReport'])->name('due.report');

    Route::get('/customer-reports', [App\Http\Controllers\ReportController::class, 'customerReport'])->name('customer.report');

    Route::get('/inventory-reports', [App\Http\Controllers\ReportController::class, 'inventoryReport'])->name('inventory.report');

    Route::get('/warehouse-reports', [App\Http\Controllers\ReportController::class, 'warehouseReport'])->name('warehouse.report');
    Route::get('/warehouse-2-reports', [App\Http\Controllers\ReportController::class, 'warehouse2Report'])->name('warehouse-2.report');

    Route::get('/warehouse-2-product-reports', [App\Http\Controllers\ReportController::class, 'warehouse2productReport'])->name('product.warehouse-2.list');
    Route::get('/warehouse-product-reports', [App\Http\Controllers\ReportController::class, 'warehouseproductReport'])->name('product.warehouse.list');

    Route::get('/supplier-reports', [App\Http\Controllers\ReportController::class, 'supplierReport'])->name('supplier.report');

    Route::get('/invoice-reports', [App\Http\Controllers\ReportController::class, 'invoiceReport'])->name('invoice.report');

    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'report'])->name('total.report');
    Route::get('/return-reports', [App\Http\Controllers\ReportController::class, 'returnReport'])->name('return.report');
    Route::get('/return-reports/print', [App\Http\Controllers\ReportController::class, 'returnReportPrint'])->name('return.report.print');
    Route::get('/profit/loss', [App\Http\Controllers\ReportController::class, 'profitLoss'])->name('profit.loss');

    // Payment Gateway Process Open Link
    Route::get('/payment/gateway/dashboard', [App\Http\Controllers\PaymentGatewayController::class, 'dashboardPaymentGateway'])->name('payment.gateway.dashboard');
    Route::get('/payment/gateway/bkash', [App\Http\Controllers\PaymentGatewayController::class, 'bkashPaymentGateway'])->name('payment.gateway.bkash');
    Route::get('/payment/gateway/nagad', [App\Http\Controllers\PaymentGatewayController::class, 'nagadPaymentGateway'])->name('payment.gateway.nagad');
    Route::get('/payment/gateway/rocket', [App\Http\Controllers\PaymentGatewayController::class, 'rocketPaymentGateway'])->name('payment.gateway.rocket');

    Route::post('/payment/gateway/invoice/store', [App\Http\Controllers\PaymentGatewayController::class, 'storeInvoicePaymentGateway'])->name('store.payment.gateway.invoice');

    Route::post('/payment/gateway/bkash/update/{id}', [App\Http\Controllers\PaymentGatewayController::class, 'updateBkashPaymentGateway'])->name('update.payment.gateway.bkash');
    Route::post('/payment/gateway/nagad/update/{id}', [App\Http\Controllers\PaymentGatewayController::class, 'updateNagadPaymentGateway'])->name('update.payment.gateway.nagad');
    Route::post('/payment/gateway/rocket/update/{id}', [App\Http\Controllers\PaymentGatewayController::class, 'updateRocketPaymentGateway'])->name('update.payment.gateway.rocket');

    // Expense Report
    Route::get('/expense-reports', [App\Http\Controllers\ReportController::class, 'expenseReports'])->name('expense.reports');

    // Customer here

    Route::get('/shopDocuments', [App\Http\Controllers\ShopDocumentController::class, 'index'])->name('shopDocument.index');

    Route::get('/shopDocument/create', [App\Http\Controllers\ShopDocumentController::class, 'create'])->name('shopDocument.create');

    Route::post('/shopDocument/store', [App\Http\Controllers\ShopDocumentController::class, 'store'])->name('shopDocument.store');

    Route::get('/shopDocument/edit/{shopDoc_id}', [App\Http\Controllers\ShopDocumentController::class, 'edit'])->name('shopDocument.edit');

    Route::post('/shopDocument/update/{id}', [App\Http\Controllers\ShopDocumentController::class, 'update'])->name('shopDocument.update');

    Route::delete('/shopDocument/delete/{shopDocument}', [App\Http\Controllers\ShopDocumentController::class, 'destroy'])->name('shopDocument.delete');

    Route::get('/reports/datewise-stock', [App\Http\Controllers\ReportController::class, 'datewiseStockReport'])->name('reports.datewise-stock');
    Route::get('/reports/datewise-sale', [App\Http\Controllers\ReportController::class, 'datewiseSaleReport'])->name('reports.datewise-sale');
    Route::get('/reports/product-wise', [App\Http\Controllers\ReportController::class, 'productWiseReport'])->name('reports.product-wise');
    Route::get('/reports/product-list', [App\Http\Controllers\ReportController::class, 'productList'])->name('reports.product-list');

    Route::get('export/{type}', [App\Http\Controllers\ExportController::class, 'export'])->name('export');
});
