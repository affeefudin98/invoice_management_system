
{{-----------------------------------------------Product------------------------------------------------------}}

    @auth
    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.products.create') }}">Add Product</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.products.create') }}">Add Product</a>
    @endif


    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.products.index') }}">All Products</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.products.index') }}">All Products</a>
    @endif
    @endauth

