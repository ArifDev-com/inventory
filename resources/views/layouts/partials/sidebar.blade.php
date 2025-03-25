<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- @if(auth()->user()->user_role == 'admin')
                <li>
                    <a href="{{ route('home') }}"><img src="{{asset('backend')}}/img/icons/dashboard.svg"
                            alt="img"><span> {{ trans('sidebar.dashboard.menu_name') }}</span> </a>
                </li>
                @endif --}}

                <li>
                    <a href="{{ route('home') }}"><img src="{{asset('backend')}}/img/icons/dashboard.svg"
                            alt="img"><span> {{ trans('sidebar.dashboard.menu_name') }}</span> </a>
                </li>


                {{-- // Product // --}}
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/products') || request()->is('admin/product/stock') || request()->is('admin/product/stock/history') || request()->is('admin/barcode') || request()->is('admin/products-import') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/product.svg" alt="img"><span> {{
                            trans('sidebar.product.menu_name') }} </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('product.index') }}"
                                class="{{ request()->is('admin/products') ? 'active' : '' }}">Active Product List</a></li>
                        <li><a href="{{ route('product.low.stock') }}"
                                class="{{ request()->is('admin/products/low-stock') ? 'active' : '' }}">Low Stock Product List</a></li>
                        <li><a href="{{ route('product.inactive') }}"
                                class="{{ request()->is('admin/products/inactive') ? 'active' : '' }}">Inactive Product List</a></li>
                        @if(auth()->user()->user_role == 'admin')
                            <li><a href="{{ route('product.stock') }}"
                                    class="{{ request()->is('admin/product/stock') ? 'active' : '' }}">Stock Update</a>
                            </li>
                            <li><a href="{{ route('product.stock.history') }}"
                                    class="{{ request()->is('admin/product/stock/history') ? 'active' : '' }}">Stock History</a>
                            </li>
                        @endif
                    </ul>
                </li>

                {{-- // Purchase // --}}
                @if(auth()->user()->user_role == 'admin')
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/purchases') || request()->is('admin/purchase/create')  ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/purchase1.svg" alt="img"><span> {{
                            trans('sidebar.purchase.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('purchase.create') }}"
                                class="{{ request()->is('admin/purchase/create') ? 'active' : '' }}">Add Purchase</a>
                        </li>
                        <li><a href="{{ route('purchase.index') }}"
                                class="{{ request()->is('admin/purchases') ? 'active' : '' }}">{{
                                trans('sidebar.purchase.purchase_list') }}</a></li>

                    </ul>
                </li>
                @endif

                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/sale/create') || request()->is('admin/sales') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/sales1.svg" alt="img"><span> {{
                            trans('sidebar.sale.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('sale.create') }}"
                                class="{{ request()->is('admin/sale/create')  ? 'active' : '' }}">Add Sale</a></li>
                        <li><a href="{{ route('sale.index') }}"
                                class="{{ request()->is('admin/sales') ? 'active' : '' }}">{{
                                trans('sidebar.sale.sale_list') }}</a></li>
                    </ul>
                </li>
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/sale/return') || request()->is('admin/sale/return') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/sales1.svg" alt="img"><span>
                                Returns </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('sale.return') }}"
                                class="{{ request()->is('admin/sale/return')  ? 'active' : '' }}">Add Return</a></li>
                        <li><a href="{{ route('return.report') }}"
                                class="{{ request()->is('admin/sale/return') ? 'active' : '' }}">
                                Return List
                            </a></li>
                    </ul>
                </li>

                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/quotations') || request()->is('admin/quotations') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/sales1.svg" alt="img"><span>
                            Quoations</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('quotation.index') }}"
                                class="{{ request()->is('admin/quotation')  ? 'active' : '' }}">Quotation List</a></li>
                        </li>
                    </ul>
                </li>


                @if(auth()->user()->user_role == 'admin')
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/users') || request()->is('admin/users/bulk-sms') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/sales1.svg" alt="img"><span>
                            Users</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('user.index') }}"
                                class="{{ request()->is('admin/users')  ? 'active' : '' }}">Users List</a></li>
                        <li><a href="{{ route('user.create') }}"
                                class="{{ request()->is('admin/user/create') ? 'active' : '' }}">Add User</a>
                        </li>
                    </ul>
                </li>
                @endif
                {{-- @if(auth()->user()->user_role == 'admin')
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/roles') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/sales1.svg" alt="img"><span>
                            Roles</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('role.index') }}"
                                class="{{ request()->is('admin/roles')  ? 'active' : '' }}">Roles List</a></li>
                        <li><a href="{{ route('role.create') }}"
                                class="{{ request()->is('admin/role/create') ? 'active' : '' }}">Add Role</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->user_role == 'admin')
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/permissions') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/sales1.svg" alt="img"><span>
                            Permissions</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('permission.index') }}"
                                class="{{ request()->is('admin/permissions')  ? 'active' : '' }}">Permissions List</a></li>
                        <li><a href="{{ route('permission.create') }}"
                                class="{{ request()->is('admin/permission/create') ? 'active' : '' }}">Add Permission</a>
                        </li>
                    </ul>
                </li>
                @endif --}}


                {{-- // Customer // --}}
                {{-- <li>

                    <a href="{{ route('customer.index') }}"><img src="{{asset('backend')}}/img/icons/users1.svg"
                            alt="img"><span> Customer </span></a>
                </li> --}}
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ (request()->is('admin/customer/due/pay') || request()->is('admin/customer/due/list') || request()->is('admin/customer/due/pay/list/customers')) ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/users1.svg" alt="img"><span>Due Payment</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('due.payment') }}"
                            class="{{ request()->is('admin/customer/due/pay') ? 'active' : '' }}">Due Payment</a>
                        </li>
                        <li><a href="{{ route('due.list') }}"
                            class="{{ request()->is('admin/customer/due/list/customers') ? 'active' : '' }}">Due List</a>
                        </li>
                        <li><a href="{{ route('due.payments') }}"
                            class="{{ request()->is('admin/customer/due/pay/list') ? 'active' : '' }}">Due Payment List</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/customer/bulk-sms') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/users1.svg" alt="img"><span>Bulk SMS</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('customer.bulk.sms') }}"
                            class="{{ request()->is('admin/customer/bulk-sms') ? 'active' : '' }}">Send SMS</a>
                        </li>
                    </ul>
                </li>

                @if(auth()->user()->user_role == 'admin')
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/customer/create') || request()->is('admin/customers') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/users1.svg" alt="img"><span>Customer</span> <span
                            class="menu-arrow"></span></a>
                    <ul>

                        <li><a href="{{ route('customer.create') }}"
                                class="{{ request()->is('admin/customer/create') ? 'active' : '' }}">Add Customer</a>
                        </li>
                        <li><a href="{{ route('customer.index') }}"
                                class="{{ request()->is('admin/customers') ? 'active' : '' }}">Customer List</a></li>

                        {{-- <li><a href="{{ route('supplier.index') }}">{{ trans('sidebar.people.picker list') }}</a>
                        </li> --}}


                    </ul>
                </li>
                @endif

                {{-- // Expenses // --}}
                @if(auth()->user()->user_role == 'admin')
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/expense/create') || request()->is('admin/expenses') || request()->is('admin/expenseCategory/create') || request()->is('admin/expenseCategories')  ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/expense1.svg" alt="img"><span> {{
                            trans('sidebar.expense.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('expense.category.index')}}"
                                class="{{ request()->is('admin/expenseCategories') ? 'active' : '' }}">{{
                                trans('sidebar.expense.expense category list') }}</a></li>

                        <li><a href="{{ route('expense.index') }}"
                                class="{{ request()->is('admin/expenses') ? 'active' : '' }}">{{
                                trans('sidebar.expense.expense_list') }}</a></li>
                    </ul>
                </li>
                @endif

                {{-- <li>
                    <a href="{{ route('reportssummary') }}"><img src="{{asset('backend')}}/img/icons/time.svg"
                            alt="img"><span> Reports </span> </a>
                </li> --}}

                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/report*') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/settings.svg" alt="img"><span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('reports.datewise-stock') }}"
                                class="{{ request()->is('admin/report/datewise-stock-report') ? 'active' : '' }}">Date Wise Stock </a></li>

                        <li><a href="{{ route('reports.datewise-sale') }}"
                                class="{{ request()->is('admin/report/datewise-sale-report') ? 'active' : '' }}">Date Wise Sale </a></li>
                        <li><a href="{{ route('reports.product-wise') }}"
                                class="{{ request()->is('admin/report/product-wise-report') ? 'active' : '' }}">Product Wise</a></li>
                        <li><a href="{{ route('reports.product-list') }}"
                                class="{{ request()->is('admin/report/product-list') ? 'active' : '' }}">Product List</a></li>
                        <li><a href="{{ route('return.report') }}"
                                class="{{ request()->is('admin/report/return-list') ? 'active' : '' }}">Return List</a></li>
                    </ul>
                </li>
                @if(auth()->user()->user_role == 'admin')
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/shopDocuments') || request()->is('admin/warehouses') || request()->is('admin/warehouse/create') || request()->is('admin/categories') || request()->is('admin/category/create')  || request()->is('admin/subCategories') || request()->is('admin/subCategory/create') || request()->is('admin/brands') || request()->is('admin/brand/create') || request()->is('admin/suppliers') || request()->is('admin/supplier/create') || request()->is('admin/units') || request()->is('admin/unit/create')   ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/settings.svg" alt="img"><span> Settings </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('shopDocument.index') }}"
                                class="{{ request()->is('admin/shopDocuments') ? 'active' : '' }}">Shop Setup </a></li>

                        <li><a href="{{ route('supplier.index') }}"
                                class="{{ request()->is('admin/suppliers') ? 'active' : '' }}">Supplier</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
