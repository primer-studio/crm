<?php

namespace App\Http\Livewire\User;

use App\Models\Department;
use App\Models\Thread;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowThread extends Component
{
    use WithPagination;

    public $thread;
    public $tickets;
    public $thread_id;
    public $content;

    protected $rules = [
        'content' => 'required|min:3|string',
    ];

    public function freshContent()
    {
        $this->content = '';
        $this->thread = Thread::findorFail($this->thread_id);
        $this->tickets = Ticket::where('thread_id', $this->thread_id)->get();
    }

    public function submit(Request $request)
    {
        $this->validate();

        $ticket = new Ticket();
        $ticket->user_id = Auth::id();
        $ticket->thread_id = $this->thread_id;
        $ticket->content = $this->content;
        $ticket->status = 'open';
        $ticket->save();
        Thread::find($this->thread_id)->update(['status' => 'customer_responded']);

        $this->freshContent();
    }

    public function delete()
    {

    }

    public function restore()
    {

    }

    public function mount ($id)
    {
        $this->thread_id = $id;
        $this->thread = Thread::findorFail($id);
        $this->tickets = Ticket::where('thread_id', $this->thread_id)->get();
    }

    public function render()
    {
        return ($this->thread->user_id == Auth::id()) ? view('livewire.user.show-thread') : abort(404);
    }
}
