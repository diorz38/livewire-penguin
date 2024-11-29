<?php

namespace App\Livewire\PermissionManagement;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.permission-management.index',[
            'title'  => 'Permissions'
        ]);
    }
}
