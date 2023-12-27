@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-secondary-color dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
