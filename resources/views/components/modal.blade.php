@props(['id', 'title'])

<div id="{{ $id }}" class="modal fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="modal-content bg-white rounded-lg p-6 mx-auto mt-20 max-w-lg relative z-50">
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