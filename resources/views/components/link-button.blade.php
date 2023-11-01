@php
$classes = 
             'flex items-center justify-center w-32 rounded-md my-2 px-4 py-2 border shadow-xl text-md font-medium leading-5 outline-none focus:outline-none focus:border-accent-color transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>