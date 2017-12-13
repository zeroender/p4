@push('head')
    <link href="/css/nav.css" type='text/css' rel='stylesheet'>
@endpush

<nav class="navbar navbar-expand-md navbar-light bg-light justify-content-center">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if(Auth::check())
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCreate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Create
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCreate">
                        @foreach($createNav as $link => $label)
                            @if($link != 'SECTIONBREAK')
                                <a class="dropdown-item" href='/{{ $link }}'>{{ $label }}</a>
                            @else
                                <div class="dropdown-divider"></div>
                            @endif
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTasks" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tasks
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownTasks">
                        @foreach($taskNav as $link => $label)
                            @if($link != 'SECTIONBREAK')
                                <a class="dropdown-item" href='/{{ $link }}'>{{ $label }}</a>
                            @else
                                <div class="dropdown-divider"></div>
                            @endif
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                        @foreach($categoryNav as $link => $label)
                            @if($link == 'SECTIONBREAK')
                                <div class="dropdown-divider"></div>
                            @else
                                <a class="dropdown-item" href='/{{ $link }}'>{{ $label }}</a>
                            @endif
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTasksByCategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tasks by Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownTasksByCategory">
                        @foreach($taskByCategoryNav as $link => $label)
                            @if($link == 'SECTIONBREAK')
                                <div class="dropdown-divider"></div>
                            @else
                                <a class="dropdown-item" href='/{{ $link }}'>{{ $label }}</a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        @endif
        <ul class="nav navbar-nav ml-auto w-50 justify-content-end">
            @if(Auth::check())
                <li class="nav-item">
                    <form method='POST' id='logout' action='/logout'>
                        {{csrf_field()}}
                        <a href='#' class="nav-link" onClick='document.getElementById("logout").submit();'>Logout {{ $user->name }}</a>
                    </form>
                </li>
            @else
                @foreach($loginNav as $link => $label)
                    <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }} nav-link'>{{ $label }}</a>
                @endforeach
            @endif
        </ul>
    </div>
</nav>
