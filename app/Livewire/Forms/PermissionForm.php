<?php

namespace App\Livewire\Forms;

use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Component;

class PermissionForm extends Form
{
    public ?Permission $permission;

    #[Locked]
    public $id;

    #[Rule('required|string|max:255|min:4', as: 'Nama')]
    public $name;

    #[Rule('string', as: 'Guard Name')]
    public $guard_name;

    public function setPermission(Permission $permission)
    {
        $this->permission = $permission;

        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255|min:4',
        ]);
        // dd($validated);

        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->permission->update($this->except(['permission', 'id']));

    }
}