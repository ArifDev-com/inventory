<ul>
    @forelse($products as $product)
    <a href="javascript::void(0)"  onclick="testClick({{ $product }})">
        <li>
        <img src="{{ asset(public.$product->image) }}" alt="img" height="80px;" width="80px;">
        <strong>{{ $product->name }}</strong> - <strong>{{ $product->productcode }}</strong>
    </li>
    </a>
    @empty
    <li style="color:red; padding: 0 20px; ">Not Found</li>
    @endforelse
</ul>