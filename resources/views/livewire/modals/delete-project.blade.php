<div>
    @if ($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="font-bold mb-6">Apakah Anda yakin ingin menghapus project ini?</h2>
                <div class="mt-4 flex gap-2">
                    <button wire:click="delete" class="bg-red-500 text-white px-4 py-2 rounded">Ya, Hapus</button>
                    <button wire:click="$set('showDeleteModal', false)"
                        class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                </div>
            </div>
        </div>
    @endif
</div>
