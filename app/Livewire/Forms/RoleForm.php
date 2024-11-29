<?php

namespace App\Livewire\Forms;

use Spatie\Permission\Models\Role;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Component;

class RoleForm extends Form
{
    public ?Role $role;

    #[Locked]
    public $id;

    #[Rule('required|string|max:255|min:4', as: 'Nama')]
    public $name;

    #[Rule('string', as: 'Guard Name')]
    public $guard_name;

    #[Rule('array', as: 'Permissions')]
    public $permissions = [];


    public function setRole(Role $role)
    {
        $this->role = $role;
        $this->permissions = $role->permissions->pluck('name')->toArray();
        // dd($this->role->permissions->pluck('name'));

        $this->name = $role->name;
    }

    public function store()
    {
        // $this->validate([
        //     'name' => 'required|string|max:255|min:4',
        // ]);
        // dd($this->all());

        $role =Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $role->syncPermissions($this->permissions);

        $this->reset();
    }

    public function update()
    {
        $this->role->update($this->except(['role', 'id']));

        $this->role->syncPermissions($this->permissions);
        $this->permissions = [];

        $this->reset();

    }
}
