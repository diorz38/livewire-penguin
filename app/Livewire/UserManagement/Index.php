<?php

namespace App\Livewire\UserManagement;

use Livewire\Component;

class Index extends Component
{
    public $startDate = '2022-01-01';
    public $endDate = '2022-12-31';
    public $merkMobil = [];
    public $merk = 'Toyota';
    public $charData = [];

    public function mount()
    {
        $this->merkMobil = ['Toyota', 'Honda', 'Mitsubishi'];
    }
    public function render()
    {
        // dd($this->chartData);
        $this->chartData = [
            'labels' => ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Okt","Nov","Dec"],
            'values' => [4000, 380, 340, 21, 2200, 1100, 2100, 600, 80, 900, 10, 155]
        ];
        return view('livewire.user-management.index', [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'merk' => $this->merk,
            'options' => $this->merkMobil,
            'chartData' => $this->chartData
        ]);
    }
}