
{{-----------------------------------------------Paymethod------------------------------------------------------}}

    @auth
    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.paymethods.create') }}">Add Payment Method</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.paymethods.create') }}">Add Payment Method</a>
    @endif


    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.paymethods.index') }}">All Payment Method</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.paymethods.index') }}">All Payment Methods</a>
    @endif
    @endauth
