<div>
    <x-dialog-modal wire:model.live="modalUserEdit" submit="edit">
        <x-slot name="title">
            Ubah User
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
                    <x-label for="selectedroles" value="Roles" />
                    <x-select wire:model="selectedroles" id="roles" multiple>
                        <option selected value=NULL>pilih roles</option>
                        @foreach ($listRoles as $role)
                        <option value="{{ $role }}"
                        {{ in_array($role, $this->selectedroles) ? 'selected':'' }} >{{ $role }}</option>
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
            <x-secondary-button @click="$wire.set('modalUserEdit', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button @click="$wire.edit()" class="ms-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
