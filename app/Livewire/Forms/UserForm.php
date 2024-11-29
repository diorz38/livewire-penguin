<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Component;

class UserForm extends Form
{
    public ?User $user;

    #[Locked]
    public $id;


    #[Rule('required|string|max:255|min:4', as: 'Nama')]
    public $name;

    #[Rule('required|email|unique:users,email', as: 'Email')]
    public $email;

    #[Rule('required', as: 'Role')]
    public $roles;

    #[Rule('sometimes|string', as: 'Password')]
    public $password;


    public function setUser(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->roles = $user->roles;
        // $this->password = $user->password;
    }

    public function store()
    {
        // dd($this->all());
        $validated = $this->validate([
            'name' => 'required|string|max:255|min:4',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required',
            'password' => 'sometimes',
        ]);

        User::create([
            'name' => $validated->name,
            'email' => $validated->email,
            'password' => Hash::make($validated->password),
        ]);

        $this->user->syncRoles($this->roles);

        $this->reset();
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255|min:4',
            'email' => 'required|email|unique:users,email'.$this->user->id,
            'roles' => 'required',
            'password' => 'sometimes',
        ]);

        if(!empty($this->password) || $this->password != ""){
            $this->password = Hash::make($this->password);
            $this->user->update($this->except(['user', 'id','roles']));
        }else{
            $this->user->update($this->except(['user', 'id','roles', 'password']));
        }
        $this->user->syncRoles($this->roles);

    }
}