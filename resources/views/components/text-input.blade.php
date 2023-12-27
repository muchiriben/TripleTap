@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-secondary-color bg-light-color text-secondary-color focus:border-primary-color focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
