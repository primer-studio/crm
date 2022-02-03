<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageInvoice extends Component
{
    public $users;
    public $invoices;
    public $services;
    public $user_id;
    public $service_id;
    public $items;
    public $payable;
    public $payment_info;
    public $payment_status;
    public $tax;
    public $discount;
    public $number;
    public $expires_at;

    protected $rules = [
        'user_id' => 'required|numeric',
        'items' => 'required|min:1|string',
//        'expires_at' => 'required|min:1',
    ];

    public function freshContent()
    {
        $this->user_id = '';
        $this->service_id = '';
        $this->items = '';
        $this->payment_info = '';
        $this->payment_status = '';
        $this->expires_at = '';
        $this->users = User::withTrashed()->latest()->get();
        $this->services = Service::withTrashed()->latest()->get();
        $this->invoices = Invoice::withTrashed()->latest()->get();
    }

    public function submit(Request $request)
    {
        $this->validate();

        $payable = 0;
        $total_discount = 0;
        foreach (json_decode($this->items)->items as $item ) {
            $discount = $item->discount;
            $payable += $item->price-(($discount*$item->price)/100);
            $total_discount += ($discount*$item->price)/100;
        }

        $invoice = new Invoice();
        $invoice->user_id = $this->user_id;
        $invoice->service_id = $this->service_id;
        $invoice->items = $this->items;
        $invoice->payable = $payable;
        $invoice->payment_info = $this->payment_info;
        $invoice->payment_status = $this->payment_status;
        $invoice->payable = $payable;
        $invoice->tax = 0;
        $invoice->discount = $total_discount;
        $invoice->number = time();
        $invoice->expires_at = Carbon::now()->addDays(5);
        $invoice->hash = sha1($invoice->id);
        $invoice->save();

        $this->freshContent();
    }

    public function delete($id)
    {
        $invoice = Invoice::withTrashed()->find($id)->delete();
        $this->freshContent();
    }

    public function restore($id)
    {
        $invoice = Invoice::withTrashed()->find($id)->restore();
        $this->freshContent();
    }

    public function filter_services () {
        $this->services = Service::where('user_id', $this->user_id)->withTrashed()->latest()->get();
    }

    public function mount ()
    {
        $this->users = User::withTrashed()->latest()->get();
        $this->invoices = Invoice::withTrashed()->latest()->get();
        $this->services = Service::withTrashed()->latest()->get();
    }

    public function render()
    {
        return view('livewire.manage-invoice');
    }
}
