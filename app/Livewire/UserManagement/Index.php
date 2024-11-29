<?php

namespace App\Livewire\UserManagement;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.user-management.index',[
            'title' => 'User Management'
        ]);
    }
}
