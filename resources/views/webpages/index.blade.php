<x-layout page="Home">
    <!--====== SLIDER PART START ======-->

    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-2 bg_cover" style="background-image: url(images/slider/unimed_alumni1.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Alumni Portal<br />University of Medical Sciences, Ondo</h1>
                            <a data-animation="fadeInUp" data-delay="1.3s" href="{{route('signup')}}" class="main-btn">Alumni Registration</a>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <div class="single-slider slider-2 bg_cover" style="background-image: url(images/slider/unimed_alumni2.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Transcript Request<br />and Processing<br /> within minutes</h1>
                            <a data-animation="fadeInUp" data-delay="1.3s" href="{{route('signup')}}" class="main-btn">Signup to Apply</a>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <div class="single-slider slider-2 bg_cover" style="background-image: url(images/slider/unimed_alumni3.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Connecting and Networking with other Members Just Got Easier</h1>
                            <a data-animation="fadeInUp" data-delay="1.3s" href="{{route('signup')}}" class="main-btn">Register to connect!</a>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

    </section>

    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->

    <section id="category-2-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="category-2-items pt-0">
                        <div class="row">
                            <div class="col-md-12">
                    <div class="happy-student mt-0" style="padding:20px 25px;">
                        <div class="happy-title">
                            <h3>Happy Alumni Testimonial</h3>
                        </div>
                        <div class="student-slied">



    <div class="singel-student text-center">
    <!-- Quote icon -->
    <div class="mb-2">
        <img src="{{asset('images/testimonial/quote2.png')}}" alt="Quote" style="width:40px;">
    </div>
    <!-- Text -->
    <p>
        ...the practical-oriented teaching and training I received have been instrumental in shaping my journey as a Medical Doctor...
    </p>
    <p><h6 class="mt-3 mb-0">Kolawole Bridget</h6>
    <span>Class of '23</span></p>

    <!-- Image -->
    <div class="student-image mt-3">
        <img src="{{asset('images/testimonial/kolawole_bridget.jpg')}}" class="testimonialPic" alt="Image">
    </div>
    <!-- Name -->


</div>



<div class="singel-student text-center">
    <!-- Quote icon -->
    <div class="mb-2">
        <img src="{{asset('images/testimonial/quote2.png')}}" alt="Quote" style="width:40px;">
    </div>
    <!-- Text -->
  <p>I can't say enough good things about Unimed's Nursing program. The training was top-notch, and it played a huge role in my success as a nurse. The hands-on experience and clinical rotations were invaluable in preparing me for the real world. Thanks to Unimed, I feel confident and well prepared in my profession.
    </p>
    <!-- Image -->
    <div class="student-image mt-3">
        <img src="{{asset('images/testimonial/Ogunribido_Adejoke.jpg')}}" class="testimonialPic" alt="Image">
    </div>
    <!-- Name -->
    <h6 class="mt-3 mb-0">Ogunribido Adejoke</h6>
    <span>Class of '22</span>
</div>


    <div class="singel-student text-center">
    <!-- Quote icon -->
    <div class="mb-2">
        <img src="{{asset('images/testimonial/quote2.png')}}" alt="Quote" style="width:40px;">
    </div>
    <!-- Text -->
    <p>I entered Unimed as a jambite who knows absolutely nothing about her given course (Animal and Environmental Biology). The theoretical and practical classes however, gave me insight on how useful my course is to human health and the world at large. Unimed prepared me for life after school as well as helped me make a decision to be a problem-solving Molecular Parasitologist, aka, Pathogen Hunter.</p>
    <!-- Image -->
    <div class="student-image mt-3">
        <img src="{{asset('images/testimonial/Irabor_Precious.jpg')}}" class="testimonialPic" alt="Image">
    </div>
    <!-- Name -->
    <h6 class="mt-3 mb-0">Irabor Precious</h6>
    <span>Class of '21</span>
</div>




    <div class="singel-student text-center">
    <!-- Quote icon -->
    <div class="mb-2">
        <img src="{{asset('images/testimonial/quote2.png')}}" alt="Quote" style="width:40px;">
    </div>
    <!-- Text -->
     <p>As a graduate of Nursing Science; I am beyond grateful for the invaluable education and support I've received. The institution's commitment to excellence has not only equipped me with the necessary skills but has also fostered an environment where my passion for nursing has thrived. Colleagues seek my advice, and even senior members inquire about my alma mater. University of Medical Sciences, where excellence meets impact!</p>
    <!-- Image -->
    <div class="student-image mt-3">
        <img src="{{asset('images/testimonial/Mary_Olafusi.jpg')}}" class="testimonialPic" alt="Image">
    </div>
    <!-- Name -->
    <h6 class="mt-3 mb-0">Mary Olafusi</h6>
    <span>Class of '21</span>
</div>



                        </div> <!-- student slied -->

                    </div> <!-- happy student -->
                </div>
                        </div> <!-- row -->
                    </div> <!-- category -->
                </div>
                <div class="col-lg-5">
                    <div class="category-form">
                        <div class="form-title text-center">
                            <h3>Alumni Member</h3>
                            <span>Sign In Here!</span>
                        </div>
                        <div class="main-form">
                            <form action="/alumni/authenticate" method="POST">
                                @csrf
                                <div class="singel-form">
                                    <input type="email" name="email" placeholder="Your e-Mail" value="{{old('email')}}">
                                    @error('email')
                                        <p class="warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="singel-form">
                                    <input type="password" name="password" value="{{old('password')}}" placeholder="Enter Password">
                                    @error('password')
                                        <p class="warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="singel-form">
                                    <button type="submit" class="main-btn">Sign In</button>
                                </div>
                                <div class="singel-form" align="center">
                                    <em>Don't Have Account Yet?</em><br>
                                    <a href="{{route('signup')}}">Register Here !</a>
                                </div>
                                <div class="singel-form pt-30" align="center">
                                    &nbsp;
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CATEGORY PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-part" class="pt-65 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mt-50 pb-25">
                        <h5>UNIMED Alumni</h5>
                        <h2>Featured Members</h2>
                    </div> <!-- section title -->
                    <div class="teachers-2">
                        <div class="row">
                            @if (!empty($featuredMembers))
                                @foreach ($featuredMembers as $featuredMember)
                                    <div class="col-md-6">
                                        <div class="teachers-2-singel mt-30">
                                            <div class="thum">
                                                <img src="{{asset('profile_pictures/'.$featuredMember->profile_picture)}}" class="featured_img" alt="Profile_picture">
                                            </div>
                                            <div class="cont">
                                                <a href="#"><h5>{{ucwords(strtolower($featuredMember->surname." ".$featuredMember->other_names))}}</h5></a>
                                                <p>{{$featuredMember->position}}</p>
                                                <span><i class="fa fa-book"></i>{{$featuredMember->department}} {{"'".Str::substr($featuredMember->graduation_year, 2, 2)}}</span>
                                            </div>
                                        </div> <!-- teachers 2 singel -->
                                    </div>
                                @endforeach
                            @endif
                        </div> <!-- row -->
                    </div> <!-- teachers 2 -->
                </div>
                <div class="col-lg-6 ">
                    <div class="about-event mt-20">
                     <div class="event-title">
    <h3>Events</h3>

    <a href="{{ route('events.index') }}" class="btn btn-dark float-right">
        View All Events
    </a>
</div>
                       <ul>

@foreach($events as $event)

<li>
    <div class="singel-event">

        <div>
            <span>
                <i class="fa fa-calendar"></i>
                {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}
            </span>

            <span>
                <i class="fa fa-clock-o"></i>
                {{ $event->event_time }}
            </span>
        </div>

        <a href="#">
            <h4>{{ $event->title }}</h4>
        </a>

        <span>
            <i class="fa fa-map-marker"></i>
            {{ $event->venue }}
        </span>

    </div>
</li>

@endforeach

</ul>





                    </div> <!-- about event -->
                </div>



            </div> <!-- row -->
        </div> <!-- container -->
    </section>



    <section class="pt-80 pb-80">
    <div class="container">

<div class="section-title pb-40">
    <h2>Latest News</h2>

    <a href="{{ route('news.index') }}" class="btn btn-dark mt-3">
        View All News
    </a>
</div>

        <div class="row">

            @foreach($news as $item)

            <div class="col-lg-4">
                <div class="card mb-4">

                    @if($item->image)
                    <img src="{{ asset('news_images/'.$item->image) }}"
                         class="card-img-top">
                    @endif

                    <div class="card-body">
                       <a href="{{ route('news.read', $item->slug) }}">
    <h4>{{ $item->title }}</h4>
</a>

                        <p>
                            {!! Str::limit($item->content, 120) !!}
                        </p>

                        <small>
                            {{ $item->created_at->format('d M Y') }}
                        </small>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>








    <!--====== TEACHERS PART ENDS ======-->

</x-layout>
