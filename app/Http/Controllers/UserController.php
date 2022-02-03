<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Invoice;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $threads = Thread::where('user_id', Auth::id())->latest()->limit(5)->get();
        $invoices = Invoice::where('user_id', Auth::id())->latest()->limit(5)->get();
        return view('main.user.dashboard.index', compact(['threads', 'invoices']));
    }

    public function threads()
    {
        return view('main.user.thread.index');
    }

    public function showThread($id)
    {
        return view('main.user.thread.show', compact('id'));
    }

    public function services()
    {
        return view('main.user.service.index');
    }

    public function invoices()
    {
        return view('main.user.invoice.index');
    }

    public function showInvoice($hash)
    {
        $invoice = Invoice::where('hash', $hash)->firstOrFail();
        if(Auth::user()->rule !== 'admin' && $invoice->user_id !== Auth::id())
            return abort(403);
        return view('main.admin.invoice.show', compact(['invoice']));
    }
}
