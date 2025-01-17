<div class="print:!hidden">
    <span><x-button @click="$wire.set('modalRoleCreate', true)">Tambah Peran</x-button></span>

    <x-dialog-modal wire:model.live="modalRoleCreate" submit="save">
        <x-slot name="title">
            <div class="flex items-center justify-between p-4 bg-stone-200/60 dark:bg-stone-950/20">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-black dark:text-white">
                    Peran baru
                </h3>
                <button @click="$wire.set('modalRoleCreate', false)" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 mb-4">
                <x-label for="form.name" value="Nama" />
                <x-input id="form.name" wire:model="form.name" type="text" class="w-full mt-1"
                    autocomplate="form.name" />
                <x-input-error for="form.name" class="mt-1" />
            </div>
            <div class="mb-4">
                <h3 class="mb-3 text-lg font-bold">Izin</h3>
                <div class="grid grid-cols-3 gap-4 items-left">
                    @foreach ($listPermission as $item)
                    <div class="flex gap-2">
                        <input type="checkbox" wire:model="selectedPermission" id="selectedPermission_{{ $item }}"
                            name="selectedPermission" value="{{ $item }}"
                            class="w-4 h-4 mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded appearance-none focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                        <label for="selectedPermission_{{ $item }}"> {{ $item }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalRoleCreate', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button @click="$wire.save()" class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
