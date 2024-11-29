<?php

namespace App\Livewire\PermissionManagement;

use App\Livewire\Forms\RoleForm;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public RoleForm $form;

    #[Url(history:true)]
    public $sortBy = 'id';

    #[Url(history:true)]
    public $sortDir = 'ASC';

    #[Url()]
    public $perPage = 10;

    public function delete(Role $role){
        dd($role);
        if ($role->hasRole('Super Admin'))
        {
            $role->syncRoles([]);
            $role->delete();

        }else{
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');

        }
        // $kegiatan->delete();
    }

    public function setSortBy($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    #[On('dispatch-roles-create-save')]
    #[On('dispatch-roles-create-edit')]
    #[On('dispatch-roles-delete-del')]
    public function render()
    {
        return view('livewire.permission-management.table', [
            'data'  => Role::orderBy($this->sortBy,$this->sortDir)
                ->simplepaginate($this->perPage),
        ]);
    }
}