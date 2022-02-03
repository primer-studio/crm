<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageService extends Component
{
    public $users;
    public $services;
    public $user_id;
    public $name;
    public $agent_name;

    protected $rules = [
        'user_id' => 'required|numeric',
        'name' => 'required|min:1|string',
        'agent_name' => 'required|min:1|string',
    ];

    public function freshContent()
    {
        $this->user_id = '';
        $this->name = '';
        $this->agent_name = '';
        $this->users = User::withTrashed()->latest()->get();
        $this->services = Service::withTrashed()->latest()->get();
    }

    public function submit(Request $request)
    {
        $this->validate();

        $service = new Service();
        $service->user_id = $this->user_id;
        $service->name = $this->name;
        $service->agent_name = $this->agent_name;
        $service->save();

        $this->freshContent();
    }

    public function delete($id)
    {
        $service = Service::withTrashed()->find($id)->delete();
        $this->freshContent();
    }

    public function restore($id)
    {
        $service = Service::withTrashed()->find($id)->restore();
        $this->freshContent();
    }

    public function mount ()
    {
        $this->users = User::withTrashed()->latest()->get();
        $this->services = Service::withTrashed()->latest()->get();
    }

    public function render()
    {
        return view('livewire.manage-service');
    }
}
