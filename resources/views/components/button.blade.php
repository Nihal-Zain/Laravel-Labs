@php
$classes = match($type) {
    'primary' => 'bg-blue-500 hover:bg-blue-600 text-white',
    'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
    'danger' => 'bg-red-500 hover:bg-red-600 text-white',
    default => 'bg-blue-500 hover:bg-blue-600 text-white',
};
@endphp

<button class="px-4 py-2 rounded-lg {{ $classes }}">
    {{ $slot }}
</button>
