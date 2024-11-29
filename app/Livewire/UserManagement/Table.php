<?php

namespace App\Livewire\UserManagement;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public UserForm $form;

    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $selectedRole = [];

    #[Url(history:true)]
    public $sortBy = 'is_admin';

    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 10;

    public function delete(User $user){
        dd($user);
        if ($user->hasRole('Super Admin'))
        {
            $user->syncRoles([]);
            $user->delete();

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

    #[On('dispatch-user-create-save')]
    #[On('dispatch-user-create-edit')]
    #[On('dispatch-user-delete-del')]
    public function render()
    {
        $roles = Role::where('id','!=',1)->pluck('name');
        // dd($roles);
        $permissions = Permission::pluck('name');

        return view('livewire.user-management.table', [
            'data'  => User::where('id','!=',1)->when($this->search !== '',function($query){
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->when($this->selectedRole !== [],function($query){
                    $query->whereHas("roles", function($q) {
                        $q->whereIn("name", $this->selectedRole);
                    });
                })
                ->orderBy($this->sortBy,$this->sortDir)
                ->simplepaginate($this->perPage),
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }
}
