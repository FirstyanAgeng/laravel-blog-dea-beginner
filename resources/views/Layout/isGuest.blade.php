<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel - Project 1</title>
</head>
<body>
    <div>
        <header>
            <nav>
                <a href="/">HOME</a>
                <a href="/login">LOGIN</a>
                <a href="">CONTACT</a>
            </nav>
        </header>
        
        {{-- content --}}
        <div>
            @yield('content')
        </div>
        {{-- end content --}}
    </div>
    <footer>
        ©️ Copyright by firstyan "professional programmer and startup founder 2024"
    </footer>
</body>
</html>