@push('head')
    <link href="/css/nav.css" type='text/css' rel='stylesheet'>
@endpush

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCreate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Create
        </a>
        <div class="dropdown-menu" aria-labelledby="Tasks">
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
        <div class="dropdown-menu" aria-labelledby="Tasks">
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
        <div class="dropdown-menu" aria-labelledby="Tasks">
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
        <div class="dropdown-menu" aria-labelledby="Tasks">
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
  </div>
</nav>
