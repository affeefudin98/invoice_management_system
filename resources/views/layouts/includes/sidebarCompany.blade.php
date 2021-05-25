
{{-- ---------------------------------------------Company----------------------------------------------------}}

    @auth
    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.companies.create') }}">Add Company</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.companies.create') }}">Add Company</a>
    @endif


    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.companies.index') }}">All Companies</a>
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.companies.index') }}">All Companies</a>
    @endif
    @endauth
