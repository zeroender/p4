@foreach ($categoriesForCheckboxes as $id => $name)
    <input
        type='checkbox'
        value='{{ $id }}'
        name='categories[]'
        disabled
        {{ (isset($categoriesForThisTask) and in_array($name, $categoriesForThisTask)) ? 'CHECKED' : '' }}
    >
    {{ $name }} <br>
@endforeach
