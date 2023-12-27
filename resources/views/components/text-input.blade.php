@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 bg-light-color text-secondary-color focus:border-primary-color focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
