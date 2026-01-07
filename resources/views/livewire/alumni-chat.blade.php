<div wire:poll.keep-alive.2s>
    {{-- Do your work, then step back. --}}
    @if (!empty($messages))
        <div id="chatThread" style="height: 300px; overflow: auto;">
            <ul>
                @foreach ($messages as $message)
                    <li>
                        <div class="singel-reviews {{Auth::user()->matricno==$message->matricno ? 'sender':'responder'}}">
                            <div class="reviews-author">
                                <div class="author-thum">
                                    <img src="{{asset('profile_pictures/'.$message->user->alumniProfile->profile_picture)}}" class="messagePic" alt="Reviews">
                                </div>
                                <div class="author-name">
                                    <h6>{{$message->user->name}}</h6>
                                    <span>{{$message->created_at->format('H:i:s d-m-Y')}}</span>
                                </div>
                            </div>
                            <div class="reviews-description pt-10">
                                <p>{{$message->body}}</p>
                            </div>
                            
                        </div> <!-- singel reviews -->
                    </li>
                @endforeach
            </ul>
        </div>
        <script type="text/javascript">
            var myDiv = document.getElementById('chatThread');
            myDiv.scrollTop = myDiv.scrollHeight;
        //  $("#chatThread").scrollTop($("#chatThread")[0].scrollHeight);
        </script>
        {{--  --}}
    @endif
</div>