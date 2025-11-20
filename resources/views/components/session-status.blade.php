@props(['status'])

@if ($status)
    <p {{ $attributes->merge(['class' => 'text-sm font-medium text-green-600']) }}>
        {{ $status }}
    </p>
@endif