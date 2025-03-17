@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.sale.detail.sale details') }}</h4>
                <h6>{{ trans('sidebar.sale.detail.view sale details') }}</h6>
            </div>
            <a href="{{ route('sale.index') }}" class="btn btn-info" >{{ trans('sidebar.sale.detail.back') }}</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('sale.details', $sale->id)}}">
                <div class="card-sales-split">
                    <h2>{{ trans('form.detail.sale detail') }}: {{ $sale->ref_code }}</h2>
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
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">{{ trans('form.detail.customer info') }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $sale->customer->name }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $sale->customer->email }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $sale->customer->phone }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ $sale->customer->address }}</font></font><br>
                                        </td>
                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">{{ trans('form.detail.company info') }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> SHERAZI IT </font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> admin@example.com</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">01631599677</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Uttara, Dhaka-1230.</font></font><br>
                                        </td>
                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">{{ trans('form.detail.invoice info') }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ trans('form.detail.reference') }} </font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">  {{ trans('form.detail.payment status') }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> {{ trans('form.detail.status') }}</font></font><br>
                                        </td>
                                        <td style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px">
                                            <font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">&nbsp;</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">{{ $sale->ref_code }} </font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;"> {{ $sale->payment_status }}</font></font><br>
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;">  {{ $sale->payment_type }}</font></font><br>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr class="heading " style="background: #F3F2F7;">
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                {{ trans('form.detail.product name') }} 
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                {{ trans('form.detail.qty') }}
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                {{ trans('form.detail.price') }}
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                {{ trans('form.detail.discount') }}
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                {{ trans('form.detail.tax') }}
                            </td>
                            <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                {{ trans('form.detail.subtotal') }}
                            </td>
                        </tr>
                        @foreach ($sale->items as $item)
                        <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
                            <input type="hidden" name="product_id[]"  class="form-control product_id"  value="{{ $item->product->id }}">
                            <td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
                                @if($item->product->image)
                                <img src="{{ asset($item->product->image) }}" alt="img" class="me-2" style="width:40px;height:40px;">
                                @else 
                                <img src="{{ asset('backend\img\img-01.jpg')}}" alt="img" height="40px;" width="40px;">
                                @endif
                               {{$item->product->name}}
                            </td>
                            <td style="padding: 10px;vertical-align: top; ">
                                {{$item->quantity}}
                            </td>
                            <td style="padding: 10px;vertical-align: top; ">
                                {{$item->product->price}}
                            </td>
                            <td style="padding: 10px;vertical-align: top; ">
                                {{$item->product->discount}}
                            </td>
                            <td style="padding: 10px;vertical-align: top; ">
                                {{$item->product->tax}}
                            </td>
                            <td style="padding: 10px;vertical-align: top; ">
                                {{$item->sub_total}}
                            </td>
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
                                    <h4>{{ trans('form.detail.order tax') }}</h4>
                                    <h5>$ 0.00 <span>(0.00%)</span></h5>
                                </li>
                                <li>
                                    <h4>{{ trans('form.detail.discount') }}</h4>
                                    <h5>$ 0.00</h5>
                                </li>	
                                <li>
                                    <h4>{{ trans('form.detail.shipping') }}</h4>
                                    <h5>$ 0.00</h5>
                                </li>
                                <li class="total">
                                    <h4>{{ trans('form.detail.grand total') }}</h4>
                                    <input type="text" readonly class="total_val" name="grand_total" value="{{$sale->grandtotal}}" style="margin-left:30px;">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.detail.order tax') }}</label>
                            <input type="text" name="tax" value="{{$sale->tax  }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.detail.discount') }}</label>
                            <input type="text" name="discount" value="{{$sale->discount  }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.detail.shipping') }}</label>
                            <input type="text" name="shipping" value="{{$sale->shipping  }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.detail.reference') }}</label>
                            <input type="text" name="ref_code" value="{{$sale->ref_code}}" >
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.detail.paid amount') }}</label>
                                <input type="text" name="paid_amount" class="paid_amount" value="{{$sale->paid_amount}}" >
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.detail.due amount') }}</label>
                                <input type="text" name="due_amount" readonly class="due_amount" value="{{$sale->due_amount}}" >
                            </div>
                        </div>
                
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.detail.status') }}</label>
                            <select class="select" name="status">
                            <option value="received" {{ $sale->status == 'received' ? 'selected' : '' }}>Received</option>
                            <option value="pending" {{ $sale->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="ordered" {{ $sale->status == 'ordered' ? 'selected' : '' }}>Ordered</option>
                            </select>
                        </div>
                    </div>
                 </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{ trans('form.detail.note') }}</label>
                            <textarea class="form-control" name="note">{{$sale->note}}</textarea>
                        </div>
                    </div>
               
                </div>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection