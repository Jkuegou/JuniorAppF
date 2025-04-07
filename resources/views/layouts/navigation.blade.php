<ul>
    @auth
        @if(auth()->user()->role === 'admin')
            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
        @else
            <li><a href="{{ route('user.dashboard') }}">User Dashboard</a></li>
        @endif
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @endauth
</ul>
