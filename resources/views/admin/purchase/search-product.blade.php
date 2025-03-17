<ul>
    @forelse($products as $product)
    <a href="javascript::void(0)"  onclick="testClick({{ $product }})">
        <li>
        <img src="{{ asset($product->image) }}" alt="img" height="40px;" width="40px;">
        <strong>{{ $product->name }}</strong>
    </li>
    </a>
    @empty
    <li style="color:red; padding: 0 20px; ">Not Found</li>
    @endforelse
</ul>