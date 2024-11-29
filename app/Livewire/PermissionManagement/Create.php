<?php

namespace App\Livewire\PermissionManagement;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public RoleForm $form;

    public $selectedPermission = [];
    public $modalRoleCreate = false;

    public function save()
    {
        $this->form->permissions = $this->selectedPermission;
        $this->form->guard_name = 'web';

        $this->validate();
        // dd($this->form->all());

        $simpan = $this->form->store();

        $this->modalRoleCreate = false;

        is_null($simpan)
            ? $this->dispatch('notify', title: 'success', message: 'Data Berhasil Disimpan!')
            : $this->dispatch('notify', title: 'failed', message: 'Data Gagal Disimpan!');

        $this->dispatch('dispatch-roles-create-save')->to(Table::class);
    }
    public function render()
    {
        $listPermission = Permission::orderBy('id')->pluck('name');
        return view('livewire.permission-management.create',[
            'listPermission' => $listPermission
        ]);
    }
}
