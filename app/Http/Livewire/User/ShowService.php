<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowService extends Component
{
    public $services;

    public function mount ()
    {
        $this->services = Auth::user()->service->all();
    }

    public function render()
    {
        return view('livewire.user.show-service');
    }
}
