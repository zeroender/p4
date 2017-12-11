<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Task Application')
    </title>

    <meta charset='utf-8'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <!-- <link href="/css/p4.css" type='text/css' rel='stylesheet'>  -->
    <link href="/css/style.css" type='text/css' rel='stylesheet'>
    <link rel="stylesheet" href="/jquery-ui-1.12.1.custom/jquery-ui.min.css">

    @stack('head')

</head>
<body>

    @if(session('alert'))
        <div class='alert'>
            {{ session('alert') }}
        </div>
    @endif

    <header>
        <!--<a href='/'><img
            src='/images/pen-calendar-to-do-checklist.jpg'
            style='width:250px'
            alt='To do checklist image'></a> -->

        @include('modules.nav')
    </header>

    <section id='main'>
        <div class='container-fluid'>
        @yield('content')
        </div>
    </section>

    <footer>
      <a href='https://github.com/zeroender/p4'><i class='fa fa-github'></i></a>&nbsp;
      &copy; {{ date('Y') }}
  </footer>

    {{-- src for Jquery --}}
    <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    {{-- src (local) for jquery-ui NOTE that this only works if referenced after jquery! --}}
    <script src="/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

    @stack('body')

</body>
</html>
