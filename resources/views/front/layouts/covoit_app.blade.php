<!-- resources/views/front/layouts/covoit_app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>CovoitGo Front</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('trips.index') }}">Home</a>
            @auth
                <a href="#">{{ Auth::user()->name }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>
</body>
</html>
