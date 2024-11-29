<div>
    <x-dialog-modal wire:model.live="modalPermissionEdit" submit="edit">
        <x-slot name="title">
            Ubah Izin
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
            <x-secondary-button @click="$wire.set('modalPermissionEdit', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button @click="$wire.edit()" class="ms-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
