<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                

                <li>
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('backend')); ?>/img/icons/dashboard.svg"
                            alt="img"><span> <?php echo e(trans('sidebar.dashboard.menu_name')); ?></span> </a>
                </li>

                
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/products') || request()->is('admin/barcode') || request()->is('admin/products-import') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/product.svg" alt="img"><span> <?php echo e(trans('sidebar.product.menu_name')); ?> </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('product.index')); ?>"
                                class="<?php echo e(request()->is('admin/products') ? 'active' : ''); ?>">Active Product List</a></li>
                        <li><a href="<?php echo e(route('product.inactive')); ?>"
                                class="<?php echo e(request()->is('admin/products/inactive') ? 'active' : ''); ?>">Inactive Product List</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/reports/datewise-stock') || request()->is('admin/reports/product-list') || request()->is('admin/products/low-stock') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/settings.svg" alt="img"><span> Stock </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('reports.product-list')); ?>"
                            class="<?php echo e(request()->is('admin/reports/product-list') ? 'active' : ''); ?>">Product List</a></li>
                        <li><a href="<?php echo e(route('product.low.stock')); ?>"
                            class="<?php echo e(request()->is('admin/products/low-stock') ? 'active' : ''); ?>">Stock Low</a></li>
                        <?php if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'superadmin'): ?>
                            <?php if(auth()->user()->user_role == 'superadmin'): ?>
                            <li><a href="<?php echo e(route('product.stock')); ?>"
                                    class="<?php echo e(request()->is('admin/product/stock') ? 'active' : ''); ?>">Stock Update</a>
                            </li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('product.stock.history')); ?>"
                                    class="<?php echo e(request()->is('admin/product/stock/history') ? 'active' : ''); ?>">Stock History</a>
                            </li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('reports.datewise-stock')); ?>"
                                class="<?php echo e(request()->is('admin/reports/datewise-stock') ? 'active' : ''); ?>">Date Wise Stock </a></li>

                    </ul>
                </li>

                
                <?php if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'superadmin'): ?>
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/purchases') || request()->is('admin/purchase/create') || request()->is('admin/suppliers') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/purchase1.svg" alt="img"><span> <?php echo e(trans('sidebar.purchase.menu_name')); ?></span> <span class="menu-arrow"></span></a>
                    <ul>
                        <?php if(auth()->user()->user_role == 'superadmin'): ?>
                        <li><a href="<?php echo e(route('purchase.create')); ?>"
                                class="<?php echo e(request()->is('admin/purchase/create') ? 'active' : ''); ?>">Add Purchase</a>
                        </li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('purchase.index')); ?>"
                                class="<?php echo e(request()->is('admin/purchases') ? 'active' : ''); ?>"><?php echo e(trans('sidebar.purchase.purchase_list')); ?></a></li>
                        <li><a href="<?php echo e(route('supplier.index')); ?>"
                            class="<?php echo e(request()->is('admin/suppliers') ? 'active' : ''); ?>">Supplier</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/sale/create') || request()->is('admin/sales') || request()->is('admin/return-reports') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/sales1.svg" alt="img"><span> <?php echo e(trans('sidebar.sale.menu_name')); ?></span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('sale.create')); ?>"
                                class="<?php echo e(request()->is('admin/sale/create')  ? 'active' : ''); ?>">Add Sale</a></li>
                        <li><a href="<?php echo e(route('sale.index')); ?>"
                                class="<?php echo e(request()->is('admin/sales') ? 'active' : ''); ?>"><?php echo e(trans('sidebar.sale.sale_list')); ?></a></li>
                    </ul>
                </li>
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/sale/return') || request()->is('admin/sale/return') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/sales1.svg" alt="img"><span>
                                Returns </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('sale.return')); ?>"
                                class="<?php echo e(request()->is('admin/sale/return')  ? 'active' : ''); ?>">Add Return</a></li>
                        <li><a href="<?php echo e(route('return.report')); ?>"
                                class="<?php echo e(request()->is('admin/return-reports') ? 'active' : ''); ?>">
                                Return List
                            </a></li>
                    </ul>
                </li>

                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/quotations') || request()->is('admin/quotations') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/sales1.svg" alt="img"><span>
                            Quoations</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('quotation.index')); ?>"
                                class="<?php echo e(request()->is('admin/quotations')  ? 'active' : ''); ?>">Quotation List</a></li>
                        </li>
                    </ul>
                </li>


                <?php if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'superadmin'): ?>
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/customer/create') || request()->is('admin/customers') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/users1.svg" alt="img"><span>Customer</span> <span
                            class="menu-arrow"></span></a>
                    <ul>

                        <li><a href="<?php echo e(route('customer.create')); ?>"
                                class="<?php echo e(request()->is('admin/customer/create') ? 'active' : ''); ?>">Add Customer</a>
                        </li>
                        <li><a href="<?php echo e(route('customer.index')); ?>"
                                class="<?php echo e(request()->is('admin/customers') ? 'active' : ''); ?>">Customer List</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e((request()->is('admin/advance-payments') || request()->is('admin/advance-balance')) ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/users1.svg" alt="img"><span>Advance Payment</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('advance.index')); ?>"
                            class="<?php echo e(request()->is('admin/advance-payments') ? 'active' : ''); ?>">Advance History</a>
                        </li>
                        <li><a href="<?php echo e(route('advance.create')); ?>"
                            class="<?php echo e(request()->is('admin/advance-payment/create') ? 'active' : ''); ?>">Add Advance Payment</a>
                        </li>
                        <li><a href="<?php echo e(route('advance.balance')); ?>"
                            class="<?php echo e(request()->is('admin/advance-balance') ? 'active' : ''); ?>">Advance Balance</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e((request()->is('admin/customer/due/pay') || request()->is('admin/customer/due/list') || request()->is('admin/customer/due/added/history') || request()->is('admin/customer/due/pay/list/customers')) ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/users1.svg" alt="img"><span>Due Payment</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('due.payment')); ?>"
                            class="<?php echo e(request()->is('admin/customer/due/pay') ? 'active' : ''); ?>">Due Payment</a>
                        </li>
                        <li><a href="<?php echo e(route('due.list')); ?>"
                            class="<?php echo e(request()->is('admin/customer/due/list/customers') ? 'active' : ''); ?>">Due Report</a>
                        </li>
                        <li><a href="<?php echo e(route('due.payments')); ?>"
                            class="<?php echo e(request()->is('admin/customer/due/pay/list') ? 'active' : ''); ?>">Due Payment List</a>
                        </li>
                        <li><a href="<?php echo e(route('due.added.history')); ?>"
                            class="<?php echo e(request()->is('admin/customer/due/added/history') ? 'active' : ''); ?>">Due Added History</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/customer/bulk-sms') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/users1.svg" alt="img"><span>Bulk SMS</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('customer.bulk.sms')); ?>"
                            class="<?php echo e(request()->is('admin/customer/bulk-sms') ? 'active' : ''); ?>">Send SMS</a>
                        </li>
                    </ul>
                </li>

                
                <?php if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'superadmin'): ?>
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/expense/create') || request()->is('admin/expenses') || request()->is('admin/expenseCategory/create') || request()->is('admin/expenseCategories')  ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/expense1.svg" alt="img"><span> <?php echo e(trans('sidebar.expense.menu_name')); ?></span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('expense.category.index')); ?>"
                                class="<?php echo e(request()->is('admin/expenseCategories') ? 'active' : ''); ?>"><?php echo e(trans('sidebar.expense.expense category list')); ?></a></li>

                        <li><a href="<?php echo e(route('expense.index')); ?>"
                                class="<?php echo e(request()->is('admin/expenses') ? 'active' : ''); ?>"><?php echo e(trans('sidebar.expense.expense_list')); ?></a></li>
                    </ul>
                </li>
                <?php endif; ?>


                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/reports/datewise-sale') || request()->is('admin/reports/product-wise') || request()->is('admin/report/return-list') || request()->is('admin/reports/product-added-report') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/settings.svg" alt="img"><span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('reports.datewise-sale')); ?>"
                                class="<?php echo e(request()->is('admin/reports/datewise-sale') ? 'active' : ''); ?>">Date Wise Sale Report</a></li>
                        <li><a href="<?php echo e(route('reports.product-wise')); ?>"
                                class="<?php echo e(request()->is('admin/reports/product-wise') ? 'active' : ''); ?>">Specific Product Report</a></li>
                        <li><a href="<?php echo e(route('product.added.report')); ?>"
                                class="<?php echo e(request()->is('admin/reports/product-added-report') ? 'active' : ''); ?>">Product Added Report</a></li>
                        <li><a href="<?php echo e(route('return.report')); ?>"
                                class="<?php echo e(request()->is('admin/report/return-list') ? 'active' : ''); ?>">Return Report</a></li>
                    </ul>
                </li>
                <?php if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'superadmin'): ?>
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="<?php echo e(request()->is('admin/shopDocuments') || request()->is('admin/warehouses') || request()->is('admin/warehouse/create') || request()->is('admin/categories') || request()->is('admin/category/create')  || request()->is('admin/subCategories') || request()->is('admin/subCategory/create') || request()->is('admin/brands') || request()->is('admin/brand/create') || request()->is('admin/units') || request()->is('admin/unit/create') || request()->is('admin/users') || request()->is('admin/user/create') ? 'active' : ''); ?>"><img
                            src="<?php echo e(asset('backend')); ?>/img/icons/settings.svg" alt="img"><span> Settings </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="<?php echo e(route('shopDocument.index')); ?>"
                                class="<?php echo e(request()->is('admin/shopDocuments') ? 'active' : ''); ?>">Shop Setup </a></li>
                            <li><a href="<?php echo e(route('user.index')); ?>"
                                class="<?php echo e(request()->is('admin/users')  ? 'active' : ''); ?>">Users List</a></li>
                        <li><a href="<?php echo e(route('user.create')); ?>"
                                class="<?php echo e(request()->is('admin/user/create') ? 'active' : ''); ?>">Add User</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>