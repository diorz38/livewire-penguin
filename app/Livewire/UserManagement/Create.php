<?php

namespace App\Livewire\UserManagement;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public UserForm $form;

    public $modalUserCreate = false;

    public $roles = [];

    public function mount()
    {
        $this->roles = Role::pluck('name');
    }

    public function save()
    {
        $this->validate();
        // dd($this->form->all());

        $simpan = $this->form->store();

        $this->modalUserCreate = false;

        is_null($simpan)
            ? $this->dispatch('notify', title: 'success', message: 'Data Berhasil Disimpan!')
            : $this->dispatch('notify', title: 'failed', message: 'Data Gagal Disimpan!');

        $this->dispatch('dispatch-kegiatan-create-save')->to(Table::class);
    }
    public function render()
    {
        return view('livewire.user-management.create',[
            'listRoles' => $this->roles
        ]);
    }
}