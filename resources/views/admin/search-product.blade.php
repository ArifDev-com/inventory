<ul class="list-group" style="margin-top: -20px; margin-bottom: 20px;">



        @forelse($products as $product)
        <a href="javascript::void(0)"  onclick="testClick({{ json_encode($product) }})">
            <li class="list-group-item" style="padding: 8px; " >
                @if($product->image)
                <img src="{{ asset($product->image) }}" alt="img" height="40px;" width="40px;" >
                @else
                <img src="{{ asset('backend/img/img-01.jpg')}}" alt="img" height="40px;" width="40px;">
                @endif
            <p style="margin-top: -36px; margin-left: 46px; padding-bottom: 8px; padding-top: 8px;"><strong >{{ $product->name }} | {{ $product->code }} </strong></p>
        </li>
        </a>
        @empty
        <li style="color:red; padding: 0 20px; font-size: 18px;">Stock Out</li>
        @endforelse




</ul>
