@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-secondary-color']) }}>
    {{ $value ?? $slot }}
</label>
