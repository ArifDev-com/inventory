@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.adjustment.edit.adjustment edit') }}</h4>
                <h6>{{ trans('sidebar.adjustment.edit.edit/update adjustment') }}</h6>
            </div>
            <a href="{{ route('adjustment.index') }}" class="btn btn-info" >Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('adjustment.update',$adjustment->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('edit-form.adjustment.warehouse name') }}</label>
                                {{-- <div class="col-lg-10 col-sm-10 col-10"> --}}
                                    <select class="select" name="warehouse_id">
                                        @foreach ($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}"
                                            {{ $warehouse->id == $adjustment->warehouse_id ? 'selected' : '' }}>
                                            {{ $warehouse->name }}</option>
                                    @endforeach
                                    </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('edit-form.adjustment.adjustment date') }} </label>
                            <div class="input-groupicon">
                                <input type="date" name="date" value="{{ $adjustment->date }}" placeholder="DD-MM-YYYY">
                          
                            </div>
                        </div>
                    </div>
            
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('edit-form.adjustment.reference_no') }} </label>
                            <input type="text" name="ref_code" value="{{ $adjustment->ref_code }}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('edit-form.adjustment.status') }}</label>
                            <select class="select" name="status">
                                <option value="addition" {{ $adjustment->status == 'addition' ? 'selected' : '' }}>Addition</option>
                                <option value="buy" {{ $adjustment->status == 'buy' ? 'selected' : '' }}>Buy</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('edit-form.adjustment.sno') }}</th>
                                    <th>{{ trans('edit-form.adjustment.product name') }}</th>
                                    <th>{{ trans('edit-form.adjustment.qty') }}</th>
                                    <th>{{ trans('edit-form.adjustment.purchase price($)') }}</th>
                                    <th class="text-end">{{ trans('edit-form.adjustment.stock') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($adjustment->items as $item)
                                <tr>
                                    <input type="hidden" name="product_id[]"  class="form-control product_id"  value="{{ $item->product->id }}">
                                    <td>1</td>
                                    <td class="productimgname">
                                        <a class="product-img">
                                            <img src="{{ asset($item->product->image) }}" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">{{ $item->product->name }}</a>
                                    </td>
                                    <td>
                                        <input type="text" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="{{ $item->quantity }}" style="width:100px;">
                                    </td>
                                    <td>{{ $item->product->purchase_price }}</td>
                                    <td class="text-end">{{ $item->product->quantity }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">{{ trans('edit-form.adjustment.update') }}</button>
                        <a href="purchaselist.html" class="btn btn-cancel">{{ trans('edit-form.adjustment.cancel') }}</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
	
<script>

     //delete row
     $("table tbody").delegate(".remove", "click",function(){
       $(this).parent().parent().remove();
     
  });


// when qty will increment or drecrement.. it will be call automically

    $("table tbody").delegate(".quantity", "keyup",function(){
    var qty = tr.find('.quantity').val();
 
    });

</script>


@endsection