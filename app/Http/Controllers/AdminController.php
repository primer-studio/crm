<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Invoice;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $threads = Thread::latest()->limit(30)->get();
        $invoices = Invoice::latest()->limit(30)->get();
        $stats = [
            'departments' => Department::count(),
            'customers' => User::count(),
            'invoice' => Invoice::count(),
        ];
        return view('main.admin.dashboard.index', compact(['threads', 'stats', 'invoices']));
    }

    public function Invoice()
    {
        return view('main.admin.invoice.sample');
    }
}
