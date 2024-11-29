<div>
    <x-dialog-modal wire:model.live="modalPermissionDelete">
        <x-slot name="title">
            Hapus Kegiatan
        </x-slot>

        <x-slot name="content">

            <p class="text-lg">Apakah Anda ingin menghapus Izin dengan ID: <strong>{{ $id }}</strong> yaitu
                <strong>{{ $nama }}</strong>?
            </p>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalPermissionDelete', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-danger-button @click="$wire.del()" class="ms-3" wire:loading.attr="disabled">
                Hapus
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
