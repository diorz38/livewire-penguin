<?php

namespace App\Livewire\UserManagement;

use Livewire\Component;

class Test extends Component
{
    public $startDate;
    public $endDate;
    public $merkMobil = [];
    public $merk = 'Toyota';
    public $charData = [];
    public $options;
    public $selectedOption;
    public $selectedOptionValue;

    public function mount()
    {
        $this->merkMobil = ['Toyota', 'Honda', 'Mitsubishi'];
        $this->startDate = '2023-01-01';
        $this->endDate = '2023-12-31';
        // $this->selectedOption = 'Acura';
        $this->options = \DB::table('mitra_kepka')->select('id as value', 'nama_lengkap as label')->distinct()->get();
        // $this->options = [
        //     [
        //         'label'=> 'Acura',
        //         'value'=> 'Acura'
        //     ],
        //     [
        //         'label'=> 'Alfa Romeo',
        //         'value'=> 'Alfa Romeo'
        //     ],
        //     [
        //         'label'=> 'Aston Martin',
        //         'value'=> 'Aston Martin'
        //     ],
        //     [
        //         'label'=> 'Audi',
        //         'value'=> 'Audi'
        //     ],
        //     [
        //         'label'=> 'Bentley',
        //         'value'=> 'Bentley'
        //     ],
        //     [
        //         'label'=> 'BMW',
        //         'value'=> 'BMW'
        //     ],
        //     [
        //         'label'=> 'Bugatti',
        //         'value'=> 'Bugatti'
        //     ],
        //     [
        //         'label'=> 'Buick',
        //         'value'=> 'Buick'
        //     ],
        //     [
        //         'label'=> 'Cadillac',
        //         'value'=> 'Cadillac'
        //     ],
        //     [
        //         'label'=> 'Chevrolet',
        //         'value'=> 'Chevrolet'
        //     ],
        //     [
        //         'label'=> 'Chrysler',
        //         'value'=> 'Chrysler'
        //     ],
        //     [
        //         'label'=> 'Citroën',
        //         'value'=> 'Citroën'
        //     ],
        //     [
        //         'label'=> 'Dodge',
        //         'value'=> 'Dodge'
        //     ],
        //     [
        //         'label'=> 'Ferrari',
        //         'value'=> 'Ferrari'
        //     ],
        //     [
        //         'label'=> 'Fiat',
        //         'value'=> 'Fiat'
        //     ],
        //     [
        //         'label'=> 'Ford',
        //         'value'=> 'Ford'
        //     ],
        //     [
        //         'label'=> 'Genesis',
        //         'value'=> 'Genesis'
        //     ],
        //     [
        //         'label'=> 'GMC',
        //         'value'=> 'GMC'
        //     ],
        //     [
        //         'label'=> 'Honda',
        //         'value'=> 'Honda'
        //     ],
        //     [
        //         'label'=> 'Hyundai',
        //         'value'=> 'Hyundai'
        //     ],
        //     [
        //         'label'=> 'Infiniti',
        //         'value'=> 'Infiniti'
        //     ],
        //     [
        //         'label'=> 'Jaguar',
        //         'value'=> 'Jaguar'
        //     ],
        //     [
        //         'label'=> 'Jeep',
        //         'value'=> 'Jeep'
        //     ],
        //     [
        //         'label'=> 'Kia',
        //         'value'=> 'Kia'
        //     ],
        //     [
        //         'label'=> 'Lamborghini',
        //         'value'=> 'Lamborghini'
        //     ],
        //     [
        //         'label'=> 'Land Rover',
        //         'value'=> 'Land Rover'
        //     ],
        //     [
        //         'label'=> 'Lexus',
        //         'value'=> 'Lexus'
        //     ],
        //     [
        //         'label'=> 'Lincoln',
        //         'value'=> 'Lincoln'
        //     ],
        //     [
        //         'label'=> 'Maserati',
        //         'value'=> 'Maserati'
        //     ],
        //     [
        //         'label'=> 'Mazda',
        //         'value'=> 'Mazda'
        //     ],
        //     [
        //         'label'=> 'McLaren',
        //         'value'=> 'McLaren'
        //     ],
        //     [
        //         'label'=> 'Mercedes-Benz',
        //         'value'=> 'Mercedes-Benz'
        //     ],
        //     [
        //         'label'=> 'Mini',
        //         'value'=> 'Mini'
        //     ],
        //     [
        //         'label'=> 'Mitsubishi',
        //         'value'=> 'Mitsubishi'
        //     ],
        //     [
        //         'label'=> 'Nissan',
        //         'value'=> 'Nissan'
        //     ],
        //     [
        //         'label'=> 'Peugeot',
        //         'value'=> 'Peugeot'
        //     ],
        //     [
        //         'label'=> 'Porsche',
        //         'value'=> 'Porsche'
        //     ],
        //     [
        //         'label'=> 'Ram',
        //         'value'=> 'Ram'
        //     ],
        //     [
        //         'label'=> 'Renault',
        //         'value'=> 'Renault'
        //     ],
        //     [
        //         'label'=> 'Rolls-Royce',
        //         'value'=> 'Rolls-Royce'
        //     ],
        //     [
        //         'label'=> 'Subaru',
        //         'value'=> 'Subaru'
        //     ],
        //     [
        //         'label'=> 'Suzuki',
        //         'value'=> 'Suzuki'
        //     ],
        //     [
        //         'label'=> 'Tesla',
        //         'value'=> 'Tesla'
        //     ],
        //     [
        //         'label'=> 'Toyota',
        //         'value'=> 'Toyota'
        //     ],
        //     [
        //         'label'=> 'Volkswagen',
        //         'value'=> 'Volkswagen'
        //     ],
        //     [
        //         'label'=> 'Volvo',
        //         'value'=> 'Volvo'
        //     ],
        // ];
        // dd($this->options);
    }

    public function updatedSelectedOption()
    {
        $this->selectedOptionValue = $this->selectedOption['value'];
        // dd($this->selectedOption, $this->selectedOptionValue);
    }
    public function render()
    {
        // dd($this->chartData);
        $this->chartData = [
            'labels' => ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Okt","Nov","Dec"],
            'values' => [4000, 380, 340, 21, 2200, 1100, 2100, 600, 80, 900, 10, 155]
        ];
        return view('livewire.user-management.test', [
            'title' => 'User Management',
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'merk' => $this->merk,
            'option' => $this->selectedOption,
            'merkMobil' => $this->merkMobil,
            'chartData' => $this->chartData
        ]);
    }
}
