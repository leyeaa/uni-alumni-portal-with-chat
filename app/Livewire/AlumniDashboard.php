<?php

namespace App\Livewire;

use App\Models\Thread;
use Livewire\Component;
use App\Models\AlumniProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlumniDashboard extends Component
{
    public function render()
    {
        // $sender=Auth::user()->matricno; //get message sender matricno
        // $alumniProfile=AlumniProfile::firstWhere('id',2); //recepient matricno
        // $receiver=$alumniProfile->matricno;
        // //check if thread exists between
        // $thread_id=DB::table('participants')->whereIn('matricno',[$sender,$receiver])->groupBy('thread_id')->havingRaw('COUNT(*) > 1')->value('thread_id');
        // if(!empty($thread_id)){
        //     $messages=Thread::find($thread_id)->messages;
        // }else{
        //     $messages="";
        // }
        // return view('livewire.alumni-dashboard',[
        //     'alumniProfile'=>$alumniProfile,
        //     'messages'=>$messages
        // ])->layout('components.layout');

        return view('livewire.alumni-dashboard');
    }
}
