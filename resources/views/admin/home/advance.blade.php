<div>
    <h4>
        Advance Collection:{{App\Models\AdvancePayment::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->sum('amount')}}
    </h4>
    <hr>
    <div class="row">
        @foreach (['cash', ['bkash', 'rocket', 'nagad'], 'card'] as $item)
        <div class="col-md-6 col-sm-6 col-lg-6"
        >
            <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                <h4>
                  {{ ucfirst(is_array($item) ? 'Bkash/Rocket/Nagad' : $item) }}: {{
                  App\Models\AdvancePayment::whereIn('method', is_array($item) ? $item : [$item])
                        ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                        ->with('customer')
                        ->sum('amount')
                  }}
              </h4>
                <div style="height: 400px; overflow-y: auto;">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Customer</th>
                                <th>Salesman</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\AdvancePayment::whereIn('method', is_array($item) ? $item : [$item])
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                    ->with(['customer', 'change'])
                                    ->get() as $key => $sale)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td >{{ $sale->customer?->name }}</td>
                            <td style="text-align: left;">
                                {{ $sale->change?->createdBy?->name }}
                            </td>
                            <td>
                                {{ $sale->amount }}
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
                  App\Models\AdvancePayment::where('method', 'bank')
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
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
                                <th>Inv. No</th>
                                <th>Customer</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach (App\Models\AdvancePayment::where('method', 'bank')
                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                      ->with(['customer', 'change'])
                                    ->get() as $key => $sale)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td >{{ $sale->sale?->ref_code }}</td>
                                    <td style="text-align: left;">
                                        {{ $sale->customer?->name }}
                                    </td>
                                    <td>
                                        {{ $sale->amount }}
                                    </td>
                                </tr>
                                @if ($sale->bank_note)
                                <tr>
                                    <td colspan="4">
                                        Bank Note: {{ $sale->bank_note }}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>