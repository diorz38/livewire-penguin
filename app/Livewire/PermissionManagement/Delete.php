<?php

namespace App\Livewire\PermissionManagement;

use App\Livewire\Forms\RoleForm;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $nama;

    public $modalRoleDelete = false;

    #[On('dispatch-roles-table-delete')]
    public function set_role($id, $nama)
    {
        $this->id = $id;
        $this->nama = $nama;

        $this->modalRoleDelete = true;
    }

    public function del()
    {

        $del = Role::where('id', $this->id)->delete();

        $this->modalRoleDelete = false;

        is_null($del)
            ? $this->dispatch('notify', title: 'failed', message: 'Data Gagal Dihapus !')
            : $this->dispatch('notify', title: 'success', message: 'Data Berhasil Dihapus !');

        $this->dispatch('dispatch-roles-delete-del')->to(Table::class);
    }
    public function render()
    {
        return view('livewire.permission-management.delete');
    }
}