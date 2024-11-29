<?php

namespace App\Livewire\PermissionManagement\Permission;

use App\Livewire\Forms\PermissionForm;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $nama;

    public $modalPermissionDelete = false;

    #[On('dispatch-permissions-table-delete')]
    public function set_permission($id, $nama)
    {
        $this->id = $id;
        $this->nama = $nama;

        $this->modalPermissionDelete = true;
    }

    public function del()
    {
        $del = Kegiatan::destroy($this->id);

        $this->modalPermissionDelete = false;

        is_null($del)
            ? $this->dispatch('notify', title: 'failed', message: 'Data Gagal Dihapus !')
            : $this->dispatch('notify', title: 'success', message: 'Data Berhasil Dihapus !');

        $this->dispatch('dispatch-permissions-delete-del')->to(Table::class);
    }
    public function render()

    {
        return view('livewire.permission-management.permission.delete');
    }
}