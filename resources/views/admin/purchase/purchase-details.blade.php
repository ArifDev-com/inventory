@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Purchase Details</h4>
                <h6>View Purchase details</h6>
            </div>
            <a href="{{ route('purchase.index') }}" class="btn btn-info" >Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('purchase.details', $purchase->id)}}">
                <div class="card-sales-split">
                    <h2>Purchase Detail : {{ $purchase->purchase_code }}</h2>
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/edit.svg" alt="img"></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/pdf.svg" alt="img"></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/excel.svg" alt="img"></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{asset('backend')}}/img/icons/printer.svg" alt="img"></a>
                        </li>
                    </ul>
                </div>
                <div class="invoice-box table-height" style="max-width: 1600px;width:100%;overflow: auto;margin:15px auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">
                    <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
                        <tbody><tr class="top">
                            <td colspan="6" style="padding: 5px;vertical-align: top;">
                                <table style="width: 100%;line-height: inherit;text-align: left;">
                                    <tbody><tr>
                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Supplier Info</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $purchase->supplier->name }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $purchase->supplier->email }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $purchase->supplier->phone }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $purchase->supplier->address }}</font></font><br>
                                        </td>
                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Company Info</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> SHERAZI IT </font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> admin@example.com</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">01315996770</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Uttara,Dhaka-1230</font></font><br>
                                        </td>
                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Invoice Info</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Reference </font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Status</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> </font></font><br>
                                        </td>
                                        <td style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px">
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">&nbsp;</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $purchase->purchase_code }} </font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;"> {{ $purchase->status }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;"> </font></font><br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        <tr class="heading " style="background: #F3F2F7;">
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                Product Name
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                QTY
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                Price
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                Discount
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                TAX
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                Subtotal
                            </td>
                        </tr>
                        @foreach ($purchase->items as $item)
                        <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
                            <input type="hidden" name="product_id[]"  class="form-control product_id"  value="{{ $item->product->id }}">
                            <td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
                                <img src="{{ asset($item->product->image) }}" alt="img" class="me-2" style="width:40px;height:40px;">
                                {{ $item->product->name }}	
                            </td>
                            <td>{{ $item->product->quantity }}</td>
                        	<td class="price">{{ $item->product->purchase_price }}</td>
							<td class="inline_discount">{{ $item->product->discount}}</td>
							<td class="inline_tax">{{ $item->product->tax }}</td>
							<td class="inline_tax">{{ $item->sub_total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>

                <div class="row">
                    <div class="col-lg-12 float-md-right">
                        <div class="total-order">
                            <ul>
                                <li>
                                    <h4>Order Tax</h4>
                                    <h5 id="tax_amount">$ 0.00 <span id="tax_percent">(0.00%)</span></h5>
                                </li>
                                <li>
                                    <h4>Discount</h4>
                                    <h5 id="discount">$ 0.00</h5>
                                </li>	
                                <li>
                                    <h4>Shipping</h4>
                                    <h5 id="shipping">$ 0.00</h5>
                                </li>
                                <li class="total">
                                    <h4>Grand Total</h4>
                                    <input type="text" readonly class="total_val" name="grand_total" value="{{$purchase->grandtotal}}" style="margin-left:30px;">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Order Tax</label>
                            <input type="text" name="tax" value="{{$purchase->tax  }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" name="discount" value="{{$purchase->discount  }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Shipping</label>
                            <input type="text" name="shipping" value="{{$purchase->shipping  }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Reference No.</label>
                            <input type="text" name="purchase_code" value="{{$purchase->purchase_code}}" >
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Paid Amount</label>
                                <input type="text" name="paid_amount" class="paid_amount" value="{{$purchase->paid_amount}}" >
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Due Amount</label>
                                <input type="text" name="due_amount" readonly class="due_amount" value="{{$purchase->due_amount}}" >
                            </div>
                        </div>
                
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="select" name="status">
                            <option value="received" {{ $purchase->status == 'received' ? 'selected' : '' }}>Received</option>
                            <option value="pending" {{ $purchase->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="ordered" {{ $purchase->status == 'ordered' ? 'selected' : '' }}>Ordered</option>
                            </select>
                        </div>
                    </div>
                 </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name="note">{{$purchase->note}}</textarea>
                        </div>
                    </div>
                  
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection