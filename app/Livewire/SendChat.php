<?php

namespace App\Livewire;

use App\Models\Thread;
use App\Models\Message;
use Livewire\Component;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;

class SendChat extends Component
{
    public $sender;
    public $receiver;
    public $chat;
    public $thread,$threadtitle,$newThread;
    public function render()
    {
        return view('livewire.send-chat');
    }

    public function send(){
        //check if thread exists between
        $this->thread=DB::table('participants')->whereIn('matricno',[$this->sender,$this->receiver])->groupBy('thread_id')->havingRaw('COUNT(*) > 1')->value('thread_id');
        if(is_null($this->thread)){
            $this->threadtitle=$this->sender."_".$this->receiver."_Chats";
            $this->newThread=Thread::create([
                'subject'=>$this->threadtitle
            ]);
            $this->thread=$this->newThread->id;
            $current_date=date('Y-m-d H:i:s');
            Participant::insert([
                ['thread_id'=>$this->thread,'matricno'=>$this->sender,'created_at'=>$current_date,'updated_at'=>$current_date],
                ['thread_id'=>$this->thread,'matricno'=>$this->receiver,'created_at'=>$current_date,'updated_at'=>$current_date]
            ]);
        }
        //insert chat message
        Message::create([
            'thread_id'=>$this->thread,
            'matricno'=>$this->sender,
            'body'=>$this->chat
        ]);
        $this->reset('chat');
    }
}
