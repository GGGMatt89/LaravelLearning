@props(['active' => false, 'type' => 'a'])
<!-- If declared as props, it is not included in the "attributes" object but treated separately as a variable in the template -->
<!-- I can also pass a default for the prop value, as "false" above -->

@if($type === 'a')

<a class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
   aria-current="{{ $active ? 'page': 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>

@else

<button class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
   aria-current="{{ $active ? 'page': 'false' }}"
    {{ $attributes }}
>{{ $slot }}</button>

@endif

