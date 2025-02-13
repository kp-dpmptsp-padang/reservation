@props(['id', 'title', 'size' => 'md'])

@php
    $sizeClasses = [
        'sm' => 'max-w-sm mt-20',
        'md' => 'max-w-lg mt-20',
        'lg' => 'max-w-2xl mt-8',
        'xl' => 'max-w-4xl mt-6',
    ];
@endphp

<div id="{{ $id }}" class="modal fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="modal-content bg-white rounded-lg p-6 mx-auto {{ $sizeClasses[$size] }} relative z-50">
        <div class="modal-header flex justify-between items-center pb-3">
            <h2 class="text-lg font-medium text-gray-900">{{ $title }}</h2>
            <button class="modal-close text-gray-900" onclick="closeModal('{{ $id }}')">&times;</button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
    </div>
</div>

<style>
    .modal {
        display: none;
    }
    .modal.show {
        display: block;
    }
</style>