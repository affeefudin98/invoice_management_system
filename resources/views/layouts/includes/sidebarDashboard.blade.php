@auth
    @if (Auth::user()->isAdmin())
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
    @elseif (Auth::user()->isClient())
        <a class="nav-link" href="{{ route('client.dashboard.index') }}">
    @endif
@endauth