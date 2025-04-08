<div>
    <h4>
        Total Collection: {{
            App\Models\CutomerPayment::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->where('payment_method', '!=', 'advance')
            ->sum('paying_amount')
            + App\Models\AdvancePayment::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->sum('amount')
        }}
    </h4>
    <hr>
    <div class="row">
        @foreach (['cash', ['bkash', 'rocket', 'nagad'], 'card'] as $item)
        <div class="col-md-6 col-sm-6 col-lg-6"
        >
            <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                <h4>
                  {{ ucfirst(is_array($item) ? 'Bkash/Rocket/Nagad' : $item) }}: {{
                  App\Models\CutomerPayment::whereIn('payment_method', is_array($item) ? $item : [$item])
                        ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                        ->with('sale')
                        ->sum('paying_amount')
                  }}
              </h4>
                <div style="height: 400px; overflow-y: auto;">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Inv. No</th>
                                <th>Salesman</th>
                                <th>Amount</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\CutomerPayment::whereIn('payment_method', is_array($item) ? $item : [$item])
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->with('sale')
                                    ->get() as $key => $sale)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td >{{ $sale->sale?->ref_code }}</td>
                            <td style="text-align: left;">
                                {{ $sale->sale?->user?->name }}
                            </td>
                            <td>
                                {{ $sale->paying_amount }}
                            </td>
                            <td>
                                {{ $sale->is_due_pay ? 'Due' : 'Sale' }}
                            </td>
                        </tbody>
                          @endforeach
                    </table>
                </div>
            </div>
        </div>
      @endforeach
        <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                <h4>
                  Bank: {{
                  App\Models\CutomerPayment::where('payment_method', 'bank')
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->with('sale')
                                    ->sum('paying_amount')
                  }}
              </h4>
                <div class=""
                style="height: 400px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Inv. No</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\CutomerPayment::where('payment_method', 'bank')
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])

                                      ->with(['sale', 'customer'])
                                    ->get() as $key => $sale)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td >{{ $sale->sale?->ref_code }}</td>
                                    <td style="text-align: left;">
                                        {{ $sale->sale?->customer?->name }}
                                    </td>
                                    <td>
                                        {{ $sale->paying_amount }}

                                    <td>
                                        {{ $sale->is_due_pay ? 'Due' : 'Sale' }}
                                    </td>
                                </tr>
                                @if ($sale->note)
                                <tr>
                                    <td colspan="5">
                                        Bank Note: {{ $sale->note }}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                <h4>
                  Advance Used: {{
                  App\Models\CutomerPayment::where('payment_method', 'advance')
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->with('sale')
                                    ->sum('paying_amount')
                  }}
              </h4>
                <div class=""
                style="height: 400px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Inv. No</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\CutomerPayment::where('payment_method', 'advance')
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])

                                      ->with(['sale', 'customer'])
                                    ->get() as $key => $sale)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td >{{ $sale->sale?->ref_code }}</td>
                                    <td style="text-align: left;">
                                        {{ $sale->sale?->customer?->name }}
                                    </td>
                                    <td>
                                        {{ $sale->paying_amount }}

                                    <td>
                                        {{ $sale->is_due_pay ? 'Due' : 'Sale' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                <h4>
                  Other Cost: {{
                  App\Models\Sale::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->where('other_cost', '>', 0)
                                      ->with('customer')
                                    ->sum('other_cost')
                  }}
              </h4>
                <div class=""
                style="height: 400px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Inv. No</th>
                                <th>Customer</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\Sale::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->where('other_cost', '>', 0)
                                      ->with('customer')
                                    ->get() as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td >{{ $sale->ref_code }}</td>
                                <td style="text-align: left;">
                                    {{ $sale->customer?->name }}
                                </td>
                                <td>
                                    {{ $sale->other_cost }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                <h4>
                  Return: {{
                  App\Models\SaleReturn::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->where('paid_amount', '>', 0)
                                      ->with('customer')
                                    ->sum('paid_amount')
                  }}
              </h4>
                <div class=""
                style="height: 400px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Inv. No</th>
                                <th>Customer</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\SaleReturn::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->where('paid_amount', '>', 0)
                                      ->where('status', 'received')
                                      ->with('customer')
                                    ->get() as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td >{{ $sale->ref_code }}</td>
                                <td style="text-align: left;">
                                    {{ $sale->customer?->name }}
                                </td>
                                <td>
                                    {{ $sale->paid_amount }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                <h4>
                  Expense: {{
                  App\Models\Expense::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->with('customer')
                                    ->sum('amount')
                  }}
              </h4>
                <div class=""
                style="height: 400px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\Expense::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                ->with('expenseCategory')
                                ->get() as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td style="text-align: left;">
                                    {{ $sale->expense_for }}
                                </td>
                                <td style="text-align: left;">
                                    {{ $sale->expenseCategory?->name }}
                                </td>
                                <td>
                                    {{ $sale->amount }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>