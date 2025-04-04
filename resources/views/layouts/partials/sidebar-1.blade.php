<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- @isset(auth()->user()->user_role->permission['permission']['manage_dashboard'])
                <li>
                    <a href="{{ route('home') }}"><img src="{{asset('backend')}}/img/icons/dashboard.svg"
                            alt="img"><span> {{ trans('sidebar.dashboard.menu_name') }}</span> </a>
                </li>
                @endisset --}}

                <li>
                    <a href="{{ route('home') }}"><img src="{{asset('backend')}}/img/icons/dashboard.svg"
                            alt="img"><span> {{ trans('sidebar.dashboard.menu_name') }}</span> </a>
                </li>

                {{-- @isset(auth()->user()->user_role->permission['permission']['manage_warehouse'])
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('backend') }}/img/icons/expense1.svg"
                            alt="img"><span> {{ trans('sidebar.warehouse.menu_name') }}</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('warehouse.index') }}">{{ trans('sidebar.warehouse.warehouse_list') }}</a>
                        </li>

                        <li><a href="{{ route('warehouse.create') }}">{{ trans('sidebar.warehouse.add warehouse') }}</a>
                        </li>
                    </ul>
                </li>
                @endisset --}}



                {{--
                @isset(auth()->user()->user_role->permission['permission']['manage_city'])
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/places.svg" alt="img"><span>
                            {{ trans('sidebar.places.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('country.index') }}">{{ trans('sidebar.places.country list') }}</a></li>

                        <li><a href="{{ route('city.index') }}">{{ trans('sidebar.places.city list') }}</a></li>
                    </ul>
                </li>
                @endisset --}}


                {{-- // Product // --}}
                @isset(auth()->user()->user_role->permission['permission']['manage_products'])
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/products') || request()->is('admin/product/create') || request()->is('admin/barcode') || request()->is('admin/products-import') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/product.svg" alt="img"><span> {{
                            trans('sidebar.product.menu_name') }} </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('product.index') }}"
                                class="{{ request()->is('admin/products') ? 'active' : '' }}">{{
                                trans('sidebar.product.product_list') }}</a></li>

                        <li><a href="{{ route('barcode') }}"
                                class="{{ request()->is('admin/barcode') ? 'active' : '' }}">{{
                                trans('sidebar.product.barcode.print_barcode') }}</a></li>

                        <li><a href="{{ route('product.import') }}"
                                class="{{ request()->is('admin/products-import') ? 'active' : '' }}">{{
                                trans('sidebar.product.import.import products') }}</a></li>
                    </ul>
                </li>
                @endisset

                {{-- // Purchase // --}}
                @isset(auth()->user()->user_role->permission['permission']['manage_purchase'])
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/purchases') || request()->is('admin/purchase/create')  ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/purchase1.svg" alt="img"><span> {{
                            trans('sidebar.purchase.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('purchase.index') }}"
                                class="{{ request()->is('admin/purchases') ? 'active' : '' }}">{{
                                trans('sidebar.purchase.purchase_list') }}</a></li>
                        <li><a href="{{ route('purchase.create') }}"
                                class="{{ request()->is('admin/purchase/create') ? 'active' : '' }}">Add Purchase</a>
                        </li>


                    </ul>
                </li>
                @endisset

                {{-- // Sales // --}}
                @isset(auth()->user()->user_role->permission['permission']['manage_sale'])
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/sale/create') || request()->is('admin/sales') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/sales1.svg" alt="img"><span> {{
                            trans('sidebar.sale.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>

                        <li><a href="{{ route('sale.index') }}"
                                class="{{ request()->is('admin/sales') ? 'active' : '' }}">{{
                                trans('sidebar.sale.sale_list') }}</a></li>
                        <li><a href="{{ route('sale.create') }}"
                                class="{{ request()->is('admin/sale/create')  ? 'active' : '' }}">Add Sale</a></li>

                        {{-- <li><a href="{{ route('country.index') }}">{{ trans('sidebar.places.country list') }}</a>
                        </li> --}}

                        {{-- <li><a href="{{ route('city.index') }}">{{ trans('sidebar.places.city list') }}</a></li>
                        --}}

                    </ul>
                </li>
                @endisset

                {{-- // Customer // --}}
                {{-- <li>

                    <a href="{{ route('customer.index') }}"><img src="{{asset('backend')}}/img/icons/users1.svg"
                            alt="img"><span> Customer </span></a>
                </li> --}}

                @isset(auth()->user()->user_role->permission['permission']['manage_customers'])
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/customer/create') || request()->is('admin/customers') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/users1.svg" alt="img"><span>Customer</span> <span
                            class="menu-arrow"></span></a>
                    <ul>


                        <li><a href="{{ route('customer.index') }}"
                                class="{{ request()->is('admin/customers') ? 'active' : '' }}">Customer List</a></li>
                        <li><a href="{{ route('customer.create') }}"
                                class="{{ request()->is('admin/customer/create') ? 'active' : '' }}">Add Customer</a>
                        </li>
                        {{-- <li><a href="{{ route('supplier.index') }}">{{ trans('sidebar.people.picker list') }}</a>
                        </li> --}}


                    </ul>
                </li>
                @endisset


                {{-- // Sales Return // --}}
                @isset(auth()->user()->user_role->permission['permission']['manage_sale_return'])
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/saleReturn/create') || request()->is('admin/saleReturns') || request()->is('admin/purchaseReturn/create') || request()->is('admin/purchaseReturns') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/return1.svg" alt="img"><span> {{
                            trans('sidebar.return.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('saleReturn.index') }}"
                                class="{{ request()->is('admin/saleReturns') ? 'active' : '' }}">{{
                                trans('sidebar.return.sale return list') }}</a></li>

                        <li><a href="{{ route('purchaseReturn.index') }}"
                                class="{{ request()->is('admin/purchaseReturns') ? 'active' : '' }}">{{
                                trans('sidebar.return.purchase return list') }}</a></li>
                    </ul>
                </li>
                @endisset


                {{-- // Transfer // --}}
                @isset(auth()->user()->user_role->permission['permission']['manage_transfer'])
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/transfer/create') || request()->is('admin/transfers')  ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/transfer1.svg" alt="img"><span> {{
                            trans('sidebar.transfer.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('transfer.index') }}"
                                class="{{ request()->is('admin/transfers') ? 'active' : '' }}">{{
                                trans('sidebar.transfer.transfer_list') }}</a></li>
                        <li><a href="{{ route('transfer.create') }}"
                                class="{{ request()->is('admin/transfer/create') ? 'active' : '' }}">Add Transfer</a>
                        </li>


                    </ul>
                </li>
                @endisset



                {{-- // Damage Products // --}}
                {{-- @isset(auth()->user()->user_role->permission['permission']['manage_damage_product']) --}}
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/damageProduct/create') || request()->is('admin/damageProducts')  ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/transfer1.svg" alt="img"><span> {{
                            trans('sidebar.damageProduct.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('damage.product.index') }}"
                                class="{{ request()->is('admin/damageProducts') ? 'active' : '' }}">{{
                                trans('sidebar.damageProduct.damageProduct_list') }}</a></li>
                        <li><a href="{{ route('damage.product.create') }}"
                                class="{{ request()->is('admin/damageProduct/create') ? 'active' : '' }}">Add
                                DamageProduct</a></li>


                    </ul>
                </li>
                {{-- @endisset --}}



                {{-- // Expenses // --}}
                @isset(auth()->user()->user_role->permission['permission']['manage_expenses'])
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/expense/create') || request()->is('admin/expenses') || request()->is('admin/expenseCategory/create') || request()->is('admin/expenseCategories')  ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/expense1.svg" alt="img"><span> {{
                            trans('sidebar.expense.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('expense.index') }}"
                                class="{{ request()->is('admin/expenses') ? 'active' : '' }}">{{
                                trans('sidebar.expense.expense_list') }}</a></li>

                        {{-- <li><a href="{{ route('expense.reports') }}"
                                class="{{ request()->is('admin/purchaseReturns') ? 'active' : '' }}">Expense Reports</a>
                        </li> --}}

                        <li><a href="{{ route('expense.category.index')}}"
                                class="{{ request()->is('admin/expenseCategories') ? 'active' : '' }}">{{
                                trans('sidebar.expense.expense category list') }}</a></li>
                    </ul>
                </li>
                @endisset

                <li>
                    <a href="{{ route('reportssummary') }}"><img src="{{asset('backend')}}/img/icons/time.svg"
                            alt="img"><span> Reports Module</span> </a>
                </li>



                {{-- // Reports // --}}
                <li class="submenu ">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/inventory-reports') || request()->is('admin/sale-reports') || request()->is('admin/due-reports') || request()->is('admin/invoice-reports') || request()->is('admin/profit/loss') || request()->is('admin/profit/loss') || request()->is('admin/warehouse-reports') || request()->is('admin/warehouse-2-reports') || request()->is('admin/warehouse-2-product-reports') || request()->is('admin/warehouse-product-reports') ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/time.svg" alt="img"><span> {{
                            trans('sidebar.report.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        {{-- <li><a href="{{ route('purchase.orderReport') }}">Purchase order report</a></li> --}}


                        <li><a href="{{ route('inventory.report') }}"
                                class="{{ request()->is('admin/inventory-reports') ? 'active' : '' }}">{{
                                trans('sidebar.report.inventory report') }}</a></li>
                        <li><a href="{{ route('sale.report') }}"
                                class="{{ request()->is('admin/sale-reports') ? 'active' : '' }}">{{
                                trans('sidebar.report.sales report') }}</a></li>
                        <li><a href="{{ route('profit.loss') }}"
                                class="{{ request()->is('admin/profit/loss')  ? 'active' : '' }}">Profit or Loss
                                Reports</a></li>
                        <li><a href="{{ route('invoice.report') }}"
                                class="{{ request()->is('admin/invoice-reports') ? 'active' : '' }}">{{
                                trans('sidebar.report.invoice report') }}</a></li>
                        <li><a href="{{ route('due.report') }}"
                                class="{{ request()->is('admin/due-reports') ? 'active' : '' }}">{{
                                trans('sidebar.report.due report') }}</a></li>

                        @php
                        $warehouses = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 5)->first();
                        $warehouses2 = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 4)->first();
                        // print($data);
                        @endphp


                        <li><a href="{{ route('warehouse.report') }}"
                                class="{{ request()->is('admin/warehouse-reports') ? 'active' : '' }}">Warehouse: {{
                                $warehouses2->name}}</a></li>
                        <li><a href="{{ route('warehouse-2.report') }}"
                                class="{{ request()->is('admin/warehouse-2-reports') ? 'active' : '' }}">Warehouse: {{
                                $warehouses->name}}</a></li>



                        {{-- <li><a href="{{ route('purchase.report') }}">{{ trans('sidebar.report.purchase report')
                                }}</a></li> --}}
                        {{-- <li><a href="{{ route('supplier.report') }}">{{ trans('sidebar.report.supplier report')
                                }}</a></li> --}}
                        {{-- <li><a href="{{ route('supplier.report') }}">{{ trans('sidebar.report.picker report')
                                }}</a></li> --}}

                        {{-- <li><a href="{{ route('supplier.index') }}">{{ trans('sidebar.report.supplier report')
                                }}</a></li>
                        <li><a href="{{ route('customer.report') }}">{{ trans('sidebar.report.customer report') }}</a>
                        </li> --}}
                        {{-- <li><a href="{{ route('total.report') }}">All Report</a></li> --}}
                    </ul>
                </li>

                <hr>
                <li><a href="{{ url('/admin/calculator')}}"><img
                            src="{{ asset('backend') }}/img/icons/iconmonstr-calculator-1(2).svg"
                            alt="img"><span>Calculator</a></li>
                <hr>

                {{-- // Role Permission // --}}
                @isset(auth()->user()->user_role->permission['permission']['manage_roles'])
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/role/create') || request()->is('admin/roles') || request()->is('admin/permission/create') || request()->is('admin/permissions') || request()->is('admin/user/create') || request()->is('admin/users')  ? 'active' : '' }}"><img
                            src="{{ asset('backend') }}/img/icons/users1.svg" alt="img"><span>{{
                            trans('sidebar.role/permission.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('role.index') }}"
                                class="{{ request()->is('admin/roles') ? 'active' : '' }}">{{
                                trans('sidebar.role/permission.users role') }}</a></li>

                        <li><a href="{{ route('user.index') }}"
                                class="{{ request()->is('admin/users') ? 'active' : '' }}">{{ trans('sidebar.people.user
                                list') }}</a></li>

                        <li><a href="{{ route('permission.index') }}"
                                class="{{ request()->is('admin/permissions') ? 'active' : '' }}">{{
                                trans('sidebar.role/permission.users permission') }}</a></li>
                    </ul>
                </li>
                @endisset

                {{-- Extra Expenses Cost --}}

                {{-- @isset(auth()->user()->user_role->permission['permission']['manage_expenses'])
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/expense1.svg"
                            alt="img"><span> {{ trans('sidebar.expense.extra_menu_name') }}</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('extra.expense.index') }}">{{ trans('sidebar.expense.extra_expense_list')
                                }}</a></li>

                        <li><a href="{{ route('extra.expense.category.index')}}">{{ trans('sidebar.expense.extra_expense
                                category list') }}</a></li>
                    </ul>
                </li>
                @endisset --}}

                @isset(auth()->user()->user_role->permission['permission']['manage_customers'])
                <li class="submenu d-none">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/users1.svg"
                            alt="img"><span>{{ trans('sidebar.people.menu_name') }}</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        {{-- <li><a href="{{ route('customer.index') }}">{{ trans('sidebar.people.customer list') }}</a>
                        </li> --}}

                        {{-- <li><a href="{{ route('supplier.index') }}">{{ trans('sidebar.people.supplier list') }}</a>
                        </li> --}}
                        {{-- <li><a href="{{ route('supplier.index') }}">{{ trans('sidebar.people.picker list') }}</a>
                        </li> --}}


                    </ul>
                </li>
                @endisset







                {{--
                @isset(auth()->user()->user_role->permission['permission']['manage_adjustment'])
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/transfer1.svg"
                            alt="img"><span> {{ trans('sidebar.adjustment.menu_name') }}</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('adjustment.index') }}">{{ trans('sidebar.adjustment.adjustments_list')
                                }}</a></li>

                        <li><a href="">{{ trans('sidebar.adjustment.import adjustment') }} </a></li>
                    </ul>
                </li>
                @endisset --}}

                {{-- @isset(auth()->user()->user_role->permission['permission']['manage_quotations'])
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/quotation1.svg"
                            alt="img"><span> {{ trans('sidebar.quotation.menu_name') }} </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('quotation.index') }}">{{ trans('sidebar.quotation.quotation_list') }}</a>
                        </li>

                        <li><a href="{{ route('quotation.create') }}">{{ trans('sidebar.quotation.add quotation') }}</a>
                        </li>
                    </ul>
                </li>
                @endisset --}}













                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/users1.svg" alt="img"><span>
                            {{ trans('sidebar.users.menu_name') }}</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('user.create') }}">{{ trans('sidebar.users.new user') }} </a></li>
                        <li><a href="{{ route('user.index') }}">{{ trans('sidebar.users.users list') }}</a></li>
                    </ul>
                </li> --}}




                {{-- @isset(auth()->user()->user_role->permission['permission']['manage_currency'])
                <li>
                    <a href="{{ route('currency.index') }}"><i data-feather="layers"></i><span> {{
                            trans('sidebar.currency') }}</span> </a>
                </li>
                @endisset --}}

                {{-- <li>
                    <a href="blankpage.html"><i data-feather="file"></i><span> Blank Page</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="alert-octagon"></i> <span> Error Pages </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="box"></i> <span>Elements </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="sweetalerts.html">Sweet Alerts</a></li>
                        <li><a href="tooltip.html">Tooltip</a></li>
                        <li><a href="popover.html">Popover</a></li>
                        <li><a href="ribbon.html">Ribbon</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="drag-drop.html">Drag & Drop</a></li>
                        <li><a href="rangeslider.html">Range Slider</a></li>
                        <li><a href="rating.html">Rating</a></li>
                        <li><a href="toastr.html">Toastr</a></li>
                        <li><a href="text-editor.html">Text Editor</a></li>
                        <li><a href="counter.html">Counter</a></li>
                        <li><a href="scrollbar.html">Scrollbar</a></li>
                        <li><a href="spinner.html">Spinner</a></li>
                        <li><a href="notification.html">Notification</a></li>
                        <li><a href="lightbox.html">Lightbox</a></li>
                        <li><a href="stickynote.html">Sticky Note</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-js.html">Chart Js</a></li>
                        <li><a href="chart-morris.html">Morris Charts</a></li>
                        <li><a href="chart-flot.html">Flot Charts</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="award"></i><span> Icons </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-feather.html">Feather Icons</a></li>
                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Forms </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html">Form Mask </a></li>
                        <li><a href="form-validation.html">Form Validation </a></li>
                        <li><a href="form-select2.html">Form Select2 </a></li>
                        <li><a href="form-fileupload.html">File Upload </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="layout"></i> <span> Table </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/product.svg" alt="img"><span>
                            Application</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="email.html">Email</a></li>
                    </ul>
                </li> --}}



                <hr>

                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->is('admin/shopDocuments') || request()->is('admin/warehouses') || request()->is('admin/warehouse/create') || request()->is('admin/categories') || request()->is('admin/category/create')  || request()->is('admin/subCategories') || request()->is('admin/subCategory/create') || request()->is('admin/brands') || request()->is('admin/brand/create') || request()->is('admin/suppliers') || request()->is('admin/supplier/create') || request()->is('admin/units') || request()->is('admin/unit/create')   ? 'active' : '' }}"><img
                            src="{{asset('backend')}}/img/icons/settings.svg" alt="img"><span> Settings </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('shopDocument.index') }}"
                                class="{{ request()->is('admin/shopDocuments') ? 'active' : '' }}">Shop Setup </a></li>
                        <li><a href="{{ route('warehouse.index') }}"
                                class="{{ request()->is('admin/warehouses') ? 'active' : '' }}">Warehouse</a></li>

                        <li><a href="{{ route('supplier.index') }}"
                                class="{{ request()->is('admin/suppliers') ? 'active' : '' }}">Supplier</a></li>

                        {{-- <li><a href="{{ route('customer.index') }}"
                                class="{{ request()->is('admin/customers') ? 'active' : '' }}">Customer</a></li> --}}


                    </ul>
                </li>

                <hr>








                {{-- <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/settings.svg"
                            alt="img"><span> {{ trans('sidebar.settings.menu_name') }}</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="">{{ trans('sidebar.settings.general settings') }}</a></li>
                        <li><a href="">{{ trans('sidebar.settings.email settings') }}</a></li>
                        <li><a href="">{{ trans('sidebar.settings.payment settings') }}</a></li>
                        <li><a href="">{{ trans('sidebar.settings.currency settings') }}</a></li>
                        <li><a href="">{{ trans('sidebar.settings.group permission') }}</a></li>
                        <li><a href="">{{ trans('sidebar.settings.tax rates') }}</a></li>
                    </ul>
                </li> --}}

            </ul>
        </div>
    </div>
</div>