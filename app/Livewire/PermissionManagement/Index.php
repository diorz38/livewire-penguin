<?php

namespace App\Livewire\PermissionManagement;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public function render()
    {
        return view('livewire.permission-management.index',[
            'title'  => 'Roles & Permissions',
            'jml_roles' => Role::count(),
            'jml_permissions' => Permission::count(),
        ]);
    }
}
