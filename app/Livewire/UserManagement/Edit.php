<?php

namespace App\Livewire\UserManagement;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public UserForm $form;
    public User $user;

    public $roles = [];
    public $selectedroles = [];
    public $modalUserEdit = false;

    public function mount()
    {
        $this->roles = Role::pluck('name','name')->all();
    }

    #[On('dispatch-user-table-edit')]
    public function set_user(User $id)
    {
        $this->selectedroles = $id->roles->pluck('name','name')->toArray();
        // dd($this->selectedroles);
        $this->form->setUser($id);

        $this->modalUserEdit = true;
    }

    public function edit()
    {
        // dd($this->selectedroles);
        $this->form->roles = $this->selectedroles;
        // $this->validate();
        // dd($this->form->all());

        // dd($this->form);
        $update = $this->form->update();

        $this->modalUserEdit = false;

        is_null($update)
            ? $this->dispatch('notify', title: 'success', message: 'Data Berhasil Diupdate !')
            : $this->dispatch('notify', title: 'failed', message: 'Data Gagal Diupdate !');

        $this->dispatch('dispatch-user-create-edit')->to(Table::class);
    }

    public function render()
    {
        // dd($this->roles);
        return view('livewire.user-management.edit',[
            'listRoles' => $this->roles
        ]);
    }
}