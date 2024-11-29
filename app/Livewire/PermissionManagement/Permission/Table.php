<?php

namespace App\Livewire\PermissionManagement\Permission;

use App\Livewire\Forms\PermissionForm;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public PermissionForm $form;

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

    #[On('dispatch-permissions-create-save')]
    #[On('dispatch-permissions-create-edit')]
    #[On('dispatch-permissions-delete-del')]
    public function render()
    {
        return view('livewire.permission-management.permission.table', [
            'data'  => Permission::orderBy($this->sortBy,$this->sortDir)
                ->simplepaginate($this->perPage),
        ]);
    }
}
