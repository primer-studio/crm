<?php

namespace App\Http\Livewire\User;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ManageInvoice extends Component
{
    use WithPagination;
    public $invoices;

    public function mount()
    {
        $this->invoices = Invoice::where('user_id', Auth::id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.user.manage-invoice');
    }
}
