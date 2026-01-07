<x-layout page="Alumni Details">
    <section id="teachers-singel" class="pt-70 pb-120 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="{{asset('profile_pictures/'.$alumniProfile->profile_picture)}}" alt="Profile_picture">
                        </div>
                        <div class="name" style="text-align: center;">
                            <h6>{{$alumniProfile->surname.' '.$alumniProfile->other_names}}</h6>
                            <span>{{$alumniProfile->position}}</span>
                        </div>
                        <div class="social" style="text-align: center;">
                            <ul>
                                <li><a href="https://facebook.com/{{$alumniProfile->facebook}}" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="https://twitter.com/{{$alumniProfile->twitter}}" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="https://linkedin.com/{{$alumniProfile->linkedin}}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- teachers left -->
                </div>
                <div class="col-lg-8">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
                                    @if (Auth::user()->matricno==$alumniProfile->matricno)
                                        All Messages
                                    @else
                                        Message Board
                                    @endif
                                </a>
                            </li>
                        </ul> <!-- nav -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <x-dashboard :alumniProfile="$alumniProfile" />
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont curriculam-cont" style="padding-top: 20px;">
                                    <div class="title" style="text-align: center;">
                                        <h6>Alumni Message Board</h6>
                                    </div>
                                    @if (Auth::user()->matricno==$alumniProfile->matricno)
                                        <x-chat-history />
                                    @else
                                        @livewire('alumni-chat',['receiver'=>$alumniProfile->matricno])
                                        <div class="reviews-form">
                                            @livewire('send-chat',['receiver'=>$alumniProfile->matricno,'sender'=>Auth::user()->matricno])
                                        </div>
                                    @endif
                                </div> <!-- reviews cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- teachers right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</x-layout>