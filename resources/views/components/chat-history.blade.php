<div class="accordion" id="accordionExample">
    @forelse (Auth::user()->participants as $conversation)
        <div class="card">
            <div class="card-header" id="heading{{$loop->iteration}}">
                <a href="#" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                    <ul>
                        <li><img src="{{asset('profile_pictures/'.$conversation->thread->otherParticipant->user->alumniProfile->profile_picture)}}" alt="teacher" class="inbox_img"></li>
                        <li><span class="head">{{$conversation->thread->otherParticipant->user->alumniProfile->surname." ".$conversation->thread->otherParticipant->user->alumniProfile->other_names}}</span></li>
                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span>{{$conversation->thread->lastMessage->created_at->format('H:i:s d-m-Y')}}</span></span></li>
                    </ul>
                </a>
            </div>

            <div id="collapse{{$loop->iteration}}" class="collapse {{$loop->iteration==1 ? ' show':''}}" aria-labelledby="heading{{$loop->iteration}}" data-parent="#accordionExample">
                <div class="card-body">
                    <div style="text-align: right; position: absolute; top:30%; left:90%; z-index:9999;"><a href="{{route('alumniDetails', $conversation->thread->otherParticipant->user->alumniProfile->id)}}">Reply</a></div>
                    <p>{{$conversation->thread->lastMessage->body}}</p>
                </div>
            </div>
        </div>
    @empty
    <div style="text-align: center;">
        <p style="color: #F00; font-style:italic;">You currently do not have previous conversations</p>
    </div>
    @endforelse
    
</div>