<div class="print:!hidden">
    <span class="mt-4"><x-button @click="$wire.set('modalPermissionCreate', true)">Tambah Izin</x-button></span>

    <x-dialog-modal wire:model.live="modalPermissionCreate" submit="save">
        <x-slot name="title">
            Izin baru
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 mb-4">
                <x-label for="form.name" value="Nama" />
                <x-input id="form.name" wire:model="form.name" type="text" class="w-full mt-1"
                    autocomplate="form.name" />
                <x-input-error for="form.name" class="mt-1" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalPermissionCreate', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button @click="$wire.save()" class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
