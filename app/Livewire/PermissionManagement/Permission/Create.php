<?php

namespace App\Livewire\PermissionManagement\Permission;

use App\Livewire\Forms\PermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public PermissionForm $form;

    public $modalPermissionCreate = false;

    public function save()
    {
        // dd($this->form->all());
        $this->form->guard_name = 'web';

        $simpan = $this->form->store();

        $this->modalPermissionCreate = false;

        is_null($simpan)
            ? $this->dispatch('notify', title: 'success', message: 'Data Berhasil Disimpan!')
            : $this->dispatch('notify', title: 'failed', message: 'Data Gagal Disimpan!');

        $this->dispatch('dispatch-permissions-create-save')->to(Table::class);
    }
    public function render()

    {
        return view('livewire.permission-management.permission.create');
    }
}