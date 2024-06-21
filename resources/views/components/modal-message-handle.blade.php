<!-- resources/views/components/modal.blade.php -->
<div x-data="{ isOpen: false }" x-show="isOpen" x-cloak
     x-init="$watch('isOpen', value => {
         if (value) {
             document.body.classList.add('overflow-hidden');
         } else {
             document.body.classList.remove('overflow-hidden');
         }
     })">
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="p-8 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between modal-header">
                <h5 class="text-lg font-bold">{{ $title }}</h5>
                <button @click="isOpen = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <div class="mt-4 modal-body">
                {{ $slot }}
            </div>
            <div class="flex justify-end mt-4 modal-footer">
                <button @click="isOpen = false" class="px-4 py-2 text-white bg-blue-500 rounded">Tutup</button>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 z-40 bg-black opacity-50" @click="isOpen = false"></div>
</div>
