<div>
    <x-dialog-modal wire:model.live="modalRoleEdit" submit="edit">
        <x-slot name="title">
            Ubah Peran
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 mb-4">
                <x-label for="form.name" value="Nama" />
                <x-input id="form.name" wire:model="form.name" type="text" class="w-full mt-1"
                    autocomplate="form.name" />
                <x-input-error for="form.name" class="mt-1" />
            </div>
            <div class="mb-4">
                {{-- {{ implode(', ', $selectedPermission) }} --}}
                <h3 class="mb-3 text-lg font-bold">Izin</h3>
                <div class="grid grid-cols-3 gap-4 items-left">
                    @foreach ($listPermission as $item)
                    <div class="flex gap-2">
                        <input type="checkbox" wire:model="selectedPermission" value="{{ $item }}"
                            name="selectedPermission" id="selectedPermission_{{ $item }}"
                            class="w-4 h-4 mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded appearance-none focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{-- {{ in_array($item, $thisPermissions) ? 'checked' : NULL }} --}}
                            @checked(in_array($item, $selectedPermission))/>
                            <label> {{ $item }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalRoleEdit', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button @click="$wire.edit()" class="ms-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
