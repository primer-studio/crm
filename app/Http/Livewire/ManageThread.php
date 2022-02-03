<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\User;
use App\Models\Department;
use App\Models\Service;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ManageThread extends Component
{
    public $users;
    public $customers;
    public $departments;
    public $threads;
    public $user_id;
    public $services;
    public $service_id;
    public $department_id;
    public $title;
    public $status;
    public $content;

    use WithPagination;

    protected $rules = [
        'title' => 'required|min:3|string',
        'user_id' => 'required',
        'service_id' => 'required',
        'department_id' => 'required',
        'status' => 'required|min:3|string',
        'content' => 'required|min:3|string',
    ];

    public function freshContent()
    {
        $this->title = '';
        $this->user_id = Auth::id();
        $this->service_id = '';
        $this->department_id = '';
        $this->status = '';
        $this->content = '';
        $this->customers = Customer::withTrashed()->latest()->get();
        $this->departments = Department::withTrashed()->latest()->get();
        $this->threads = Thread::withTrashed()->latest()->get();
        $this->resetPage();
    }

    public function submit(Request $request)
    {
        $this->validate();

        $thread = new Thread();
        $thread->title = $this->title;
        $thread->user_id = $this->user_id;
        $thread->service_id = $this->service_id;
        $thread->department_id = $this->department_id;
        $thread->status = $this->status;
        $thread->content = $this->content;
        $thread->save();

        $this->freshContent();
    }

    public function delete($id)
    {
        $customer = Thread::withTrashed()->find($id)->delete();
        $this->freshContent();
    }

    public function restore($id)
    {
        $customer = Thread::withTrashed()->find($id)->restore();
        $this->freshContent();
    }

    public function filter_services () {
        $this->services = Service::where('user_id', $this->user_id)->withTrashed()->latest()->get();
    }

    public function update_threads ($column, $content = '*') {
        $this->threads = ($content == '*') ? Thread::withTrashed()->latest()->get() : Thread::where("$column", $content)->withTrashed()->latest()->get();
    }

    public function mount ()
    {
        $this->users = User::withTrashed()->latest()->get();
        $this->services = Service::withTrashed()->latest()->get();
        $this->departments = Department::withTrashed()->latest()->get();
        $this->threads = Thread::withTrashed()->latest()->get();
    }

    public function render()
    {
        return view('livewire.manage-thread');
        // return view('livewire.manage-thread', [
        //     "threads" =>  Thread::withTrashed()->latest()->paginate(1),
        // ]);
    }
}
