@props(['type' => 'info'])

@php
    switch ($type) {
        case 'info':
            $class = 'text-blue-800 bg-blue-50 bg-gray-800 text-blue-400';
            break;

        case 'danger':   
            $class = 'text-red-800 bg-red-50 bg-gray-800 text-red-400';
            break;
            
        case 'success':
            $class = 'text-green-800 bg-green-50 bg-gray-800 text-green-400';
            break;
            
        case 'warning':
            $class = 'text-yellow-800 bg-yellow-50 bg-gray-800 text-yellow-300';
            break;

        case 'dark':
            $class = 'text-gray-800 bg-gray-50 bg-gray-800 text-gray-300';
            break;
        
        default:
            $class = 'text-gray-800 bg-gray-50 bg-gray-800 text-gray-300';
            break;
    }
@endphp

<div {{ $attributes->merge(['class' => 'p-4 text-sm rounded-lg' . $class])}} role="alert">
    <span class="font-medium">{{ $title ?? 'Info alert!'}}</span> {{ $slot}}
</div>