

@php
    $colors = [
        'success' => 'bg-green-100 text-green-700',
        'error' => 'bg-red-100 text-red-700',
        'warning' => 'bg-yellow-100 text-yellow-700',
        'info' => 'bg-blue-100 text-blue-700',
    ];
@endphp

@if (session()->has($type))
    <div class="border p-3 rounded mb-4 {{ $colors[$type]}}">
        {{ session($type) }}
    </div>
    
@endif