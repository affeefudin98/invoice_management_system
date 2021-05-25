
{{-----------------------------------------------Invoice------------------------------------------------------}}

    @auth
    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.invoices.create') }}">Generate Invoice</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.invoices.create') }}">Generate Invoice</a>
    @endif


    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.invoices.index') }}">All Invoices</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.invoices.index') }}">All Invoices</a>
    @endif
    @endauth



