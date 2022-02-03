<?php

namespace App\Http\Livewire\User;

use App\Models\Department;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class ManageThread extends Component
{
    use WithPagination;
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

    protected $rules = [
        'title' => 'required|min:3|string',
        'service_id' => 'required',
        'department_id' => 'required',
        'content' => 'required|min:3|string',
    ];

    public function freshContent()
    {
        $this->title = '';
        $this->service_id = '';
        $this->department_id = '';
        $this->content = '';
        $this->departments = Department::withTrashed()->latest()->get();
       $this->threads =  Thread::where('user_id', Auth::id())->latest()->get();
    }

    public function notify($info, $content, $url) {
        $msg = "{\"content\" : \"$info $content - [visit]($url)\"}";
        $cl = strlen($msg);

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://discord.com/api/webhooks/937735883875033118/LPNTaAD5dbJ9R-WYj2tq8QN2wOI7Y9Le4U3GRo_f0dld0m5VRswocEtmInmcT93fe31_',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>"$msg",
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: __cfruid=e3d6871f2e06a07ddcf76904f5272c8e2306935c-1643644225; __dcfduid=80982ef382ad11ec8c2542010a0a038a; __sdcfduid=80982ef382ad11ec8c2542010a0a038a3796f1378e7c21094a59cd4d67c4f088eb8b603e8ff3dd298af2d46a1428e6de',
                'Content-Length: '.$cl
              ),
            ));
            
            $response = curl_exec($curl);

            return $response;
            curl_close($curl);

        } catch(Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        
        } finally {
            // Close curl handle unless it failed to initialize
            if (is_resource($curl)) {
                curl_close($curl);
            }
        }
    }

    public function submit(Request $request)
    {
        $this->validate();

        $thread = new Thread();
        $thread->title = $this->title;
        $thread->service_id = $this->service_id;
        $thread->user_id = Auth::id();
        $thread->department_id = $this->department_id;
        $thread->content = $this->content;
        $thread->status = 'open';
        $thread->save();

        $this->notify("New ticket: ", $this->title, route('Admin > Threads > Manage'));
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

    public function mount ()
    {
        $this->services = User::findOrFail(Auth::id())->service;
        $this->departments = Department::withTrashed()->latest()->get();
        $this->threads =  Thread::where('user_id', Auth::id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.user.manage-thread');
    }
}
