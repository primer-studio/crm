<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageDepartment extends Component
{
    public $departments;
    public $name;
    public $status;

    protected $rules = [
        'name' => 'required|min:1|string|unique:departments',
        'status' => 'required',
    ];

    public function freshContent()
    {
        $this->name = '';
        $this->status = '';
        $this->departments = Department::withTrashed()->latest()->get();
    }

    public function submit(Request $request)
    {
        $this->validate();

        $department = new Department();
        $department->name = $this->name;
        $department->status = $this->status;
        $department->save();

        $this->freshContent();
    }

    public function delete($id)
    {
        $customer = Department::withTrashed()->find($id)->delete();
        $this->freshContent();
    }

    public function restore($id)
    {
        $customer = Department::withTrashed()->find($id)->restore();
        $this->freshContent();
    }

    public function mount ()
    {
        $this->departments = Department::withTrashed()->latest()->get();
    }

    public function render()
    {
        return view('livewire.manage-department');
    }
}
