@foreach ($categoriesForCheckboxes as $id => $name)
    <input
        type='checkbox'
        value='{{ $id }}'
        name='categories[]'
        {{ (old('categories') and in_array($id, old('categories'))) ||
          (isset($categoriesForThisTask) and in_array($name, $categoriesForThisTask) and (old('categories') == false) )
          ? 'CHECKED' : '' }}
    >
    {{ $name }} <br>
@endforeach
