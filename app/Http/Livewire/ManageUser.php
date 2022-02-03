<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ManageUser extends Component
{
    public $users;
    public $name;
    public $status;
    public $number;
    public $rule;
    public $address;
    public $postal_code;
    public $register_number;
    public $economical_number;
    public $avatar;
    public $department;
    public $departments;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|min:3|string|unique:customers',
        'status' => 'required',
        'number' => 'required|min:3|string|unique:customers',
        'rule' => 'required|min:3|string',
        'email' => 'required|min:3|string|unique:customers',
        'password' => [
            'required',
            'string',
            'min:10',             // must be at least 10 characters in length
//            'regex:/[a-z]/',      // must contain at least one lowercase letter
//            'regex:/[A-Z]/',      // must contain at least one uppercase letter
//            'regex:/[0-9]/',      // must contain at least one digit
//            'regex:/[@$!%*#?&]/', // must contain a special character
        ],
    ];

    public function freshContent()
    {
        $this->name = '';
        $this->status = '';
        $this->number = '';
        $this->rule = '';
        $this->address = '';
        $this->postal_code = '';
        $this->register_number = '';
        $this->economical_number = '';
        $this->avatar = '';
        $this->department = '';
        $this->email = '';
        $this->password = '';
        $this->users = User::withTrashed()->where('rule', '!=', 'admin')->latest()->get();
        $this->departments = Department::withTrashed()->latest()->get();
    }

    public function submit(Request $request)
    {
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->status = $this->status;
        $user->number = $this->number;
        $user->rule = $this->rule;
        $user->address = $this->address;
        $user->postal_code = $this->postal_code;
        $user->register_number = $this->register_number;
        $user->economical_number = $this->economical_number;
        $user->avatar = $this->avatar;
        $user->department_id = ($this->rule == 'customer') ? null : $this->department;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        $this->freshContent();
    }

    public function delete($id)
    {
        $user = User::withTrashed()->find($id)->delete();
        $this->freshContent();
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id)->restore();
        $this->freshContent();
    }

    public function mount ()
    {
        $this->users = User::withTrashed()->where('rule', '!=', 'admin')->latest()->get();
        $this->departments = Department::withTrashed()->latest()->get();
    }

    public function render()
    {
        return view('livewire.manage-user');
    }
}
