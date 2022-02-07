<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="../css/app.css"> --}}
</head>
<body>
    <div class="container">

        <div class="content">
            @yield('contact')
            @yield('home')
        </div>
        <footer>
            <div class="quicklinks">
                <ul>
                    <a href="">
                        <li>Home</li>
                    </a>
                    <a href="">
                        <li>FAQ</li>
                    </a>
                    <a href="">
                        <li>About</li>
                    </a>
                    <a href="">
                        <li>Mission</li>
                    </a>
                    <a href="">
                        <li>Contact</li>
                    </a>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>