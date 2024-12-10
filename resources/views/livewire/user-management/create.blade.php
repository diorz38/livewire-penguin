<div class="print:!hidden">
    <span><x-button @click="$wire.set('modalUserCreate', true)">Tambah Pengguna</x-button></span>

    <x-dialog-modal wire:model.live="modalUserCreate" submit="save">
        <x-slot name="title">
            <div class="flex items-center justify-between border-zinc-300 bg-zinc-100/60 p-4 dark:border-zinc-700 dark:bg-zinc-900/20">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-zinc-50">
                    Pengguna baru
                </h3>
                <button @click="$wire.set('modalUserCreate', false)" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 mb-4">
                <x-label for="form.name" value="Nama User" />
                <x-input id="form.name" wire:model="form.name" type="text" class="w-full mt-1"
                    autocomplate="form.name" />
                <x-input-error for="form.name" class="mt-1" />
            </div>
            <div class="col-span-12 mb-4">
                <x-label for="form.email" value="Email" />
                <x-input id="form.email" wire:model="form.email" type="text" class="w-full mt-1"
                    autocomplate="form.email" />
                <x-input-error for="form.email" class="mt-1" />
            </div>

            <div class="grid justify-between grid-cols-2 gap-2">
                <div class="mb-4">
                    <x-label for="form.roles" value="Roles" />
                    <x-select wire:model="form.roles" id="roles" multiple>
                        <option selected value=NULL>pilih roles</option>
                        @foreach ($listRoles as $role)
                        <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="form.roles" class="mt-1" />
                </div>
                <div class="mb-4">
                    <x-label for="form.password" value="Password" />
                    <x-input id="form.password" wire:model="form.password" type="text" class="w-full mt-1"/>
                    <x-input-error for="form.password" class="mt-1" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalUserCreate', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button @click="$wire.save()" class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
