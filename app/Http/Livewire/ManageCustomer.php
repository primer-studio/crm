<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageCustomer extends Component
{
    public $customers;
    public $name;
    public $agent_name;
    public $status;
    public $email;
    public $number;
    public $avatar;

    protected $rules = [
        'name' => 'required|min:3|string|unique:customers',
        'agent_name' => 'required|min:3|string',
        'status' => 'required',
        'email' => 'required|min:3|string|unique:customers',
        'number' => 'required|min:3|string|unique:customers',
    ];

    public function freshContent()
    {
        $this->name = '';
        $this->agent_name = '';
        $this->status = '';
        $this->email = '';
        $this->number = '';
        $this->avatar = '';
        $this->customers = Customer::withTrashed()->latest()->get();
    }

    public function submit(Request $request)
    {
        $this->validate();

        $department = new Customer();
        $department->name = $this->name;
        $department->agent_name = $this->agent_name;
        $department->status = $this->status;
        $department->email = $this->email;
        $department->number = $this->number;
        $department->avatar = $this->avatar;
        $department->save();

        $this->freshContent();
    }

    public function delete($id)
    {
        $customer = Customer::withTrashed()->find($id)->delete();
        $this->freshContent();
    }

    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id)->restore();
        $this->freshContent();
    }

    public function mount ()
    {
        $this->customers = Customer::withTrashed()->latest()->get();
    }

    public function render()
    {
        return view('livewire.manage-customer');
    }
}
