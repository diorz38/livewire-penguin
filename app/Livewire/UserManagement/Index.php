<?php

namespace App\Livewire\UserManagement;

use Livewire\Component;

class Index extends Component
{
    public $startDate = '2022-01-01';
    public $endDate = '2022-12-31';
    public $merkMobil = [];
    public $merk = 'Toyota';

    public function mount()
    {
        $this->merkMobil = ['Toyota', 'Honda', 'Mitsubishi'];
    }
    public function render()
    {
        return view('livewire.user-management.index', [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'merk' => $this->merk,
            'options' => $this->merkMobil
        ]);
    }
}