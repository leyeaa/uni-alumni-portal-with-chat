<?php

namespace App\Livewire;

use App\Models\Thread;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlumniChat extends Component
{
    public $receiver;
    public $thread_id,$conversations;

    public function render()
    {
        $this->thread_id=DB::table('participants')->whereIn('matricno',[Auth::user()->matricno,$this->receiver])->groupBy('thread_id')->havingRaw('COUNT(*) > 1')->value('thread_id');
        if(!empty($this->thread_id)){
            $this->conversations=Thread::find($this->thread_id)->messages;
        }else{
            $this->conversations="";
        }
        return view('livewire.alumni-chat',[
            'messages'=>$this->conversations
        ]);
    }
}
