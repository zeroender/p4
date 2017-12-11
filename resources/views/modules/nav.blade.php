@php
    # Define a PHP array of links and their labels
    # This amount of PHP code in a view is okay because it's
    # display specific. By putting it in the view, I'm not making it
    # necessary to look in a logic file in order to edit link labels
    $categoryNav = [
        'category' => 'All Categories',
        'SECTIONBREAK' => 'SECTIONBREAK'
    ];
    use App\Category;
    $categories = Category::orderBy('name')->get();

    //thanks stack overflow https://stackoverflow.com/questions/5384847/adding-an-item-to-an-associative-array
    foreach ($categories as $category) {
        $categoryNav+= array('category/'.$category->id => $category->name);
    }

    $taskByCategoryNav = [];
    foreach ($categories as $category) {
        $taskByCategoryNav+= array('category/'.$category->id.'/tasks' => $category->name);
    }


    $taskNav = [
        'task' => 'View all Tasks',
        'SECTIONBREAK' => 'SECTIONBREAK',
        'taskBy/name' => 'View by Name',
        'taskBy/description' => 'View by Description',
        'taskBy/due_date' => 'View by Date',
        'taskBy/status' => 'View by Status'
    ];

    $createNav = [
        'task/create' => 'Create a new task',
        'category/create' => 'Create a new category'
    ]
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
