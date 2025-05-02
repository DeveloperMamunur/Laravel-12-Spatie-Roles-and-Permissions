<?php
namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $user;
    public $name, $email, $password, $password_confirmation, $allRoles;
    public $roles = [];

    public function mount($id)
    {
        $this->user     = User::findOrFail($id);
        $this->name     = $this->user->name;
        $this->email    = $this->user->email;
        $this->allRoles = Role::all();
        $this->roles    = $this->user->roles->pluck('name');
    }

    public function render()
    {
        return view('livewire.users.user-edit');
    }

    public function update()
    {
        $this->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'same:password_confirmation',
        ]);

        $this->user->name  = $this->name;
        $this->user->email = $this->email;

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();

        $this->user->syncRoles($this->roles);

        return to_route('users.index')->with('success', 'User Updated successfully.');
    }
}
