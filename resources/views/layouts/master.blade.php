<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Task Application')
    </title>

    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    @if(session('alert'))
        <div class='alert'>
            {{ session('alert') }}
        </div>
    @endif

    <header>
        <a href='/'><img
            src='/images/laravel-foobooks-logo@2x.png'
            style='width:300px'
            alt='Foobooks Logo'></a>

        {{-- ToDo: Make it so active link in nav is highlighted --}}
        <nav>
            <ul>
                <li><a href='/task'>Tasks</a>
                <li><a href='/category'>Categories</a>
                <li><a href='/task/create'>Add a Task</a>
                <li><a href='/category/create'>Add a category</a>
            </ul>
        </nav>
    </header>

    <section id='main'>
        @yield('content')
    </section>

    <footer>
        @yield('footer')
    </footer>

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    @stack('body')

</body>
</html>
