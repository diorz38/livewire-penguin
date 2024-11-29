<?php

namespace App\Livewire\PermissionManagement;

use App\Livewire\Forms\RoleForm;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    public RoleForm $form;

    public $selectedPermission = [];

    public $modalRoleEdit = false;

    #[On('dispatch-roles-table-edit')]
    public function set_role(Role $id)
    {
        $this->form->setRole($id);
        $this->selectedPermission = $this->form->permissions;
        // dd($this->thisPermissions);

        $this->modalRoleEdit = true;
    }

    public function edit()
    {
        $this->form->guard_name = 'web';
        $this->form->permissions = $this->selectedPermission;

        $this->validate();

        // dd($this->form->all());
        $update = $this->form->update();

        $this->modalRoleEdit = false;

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Data Berhasil Diupdate !')
            : $this->dispatch('notify', title: 'failed', message: 'Data Gagal Diupdate !');

        $this->dispatch('dispatch-roles-create-edit')->to(Table::class);
    }

    public function render()
    {
        $listPermission = Permission::orderBy('id')->pluck('name');
        return view('livewire.permission-management.edit',[
            'listPermission' => $listPermission
        ]);
    }
}