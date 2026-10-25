    <!--====== HEADER PART START ======-->

    <header id="header-part">

        <div class="header-top d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="{{asset('images/all-icon/call.png')}}" alt="icon"><span>+234 813 551 3654</span></li>
                                <li><img src="{{asset('images/all-icon/email.png')}}" alt="icon"><span>alumni@unimed.edu.ng</span></li>
                                <li><img src="{{asset('images/all-icon/map.png')}}" alt="icon"><span>Alumni office, Beside Lecture Room 2, Olu Akinkugbe TETFund Building, Laje Campus.</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="header-social text-lg-right text-center">
                            <ul>
                                <li><a href="https://m.facebook.com/story.php?story_fbid=pfbid021WmggVhTSTvXVk61JKxxQKnnZ8ZzsNNf5pro6VtJum1HoQUfLTCSGMpa4CVZBRRYl&id=100076756868973"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="https://x.com/unimed_alumni?s=21&t=viGTRjxGqxlonUtAQDjJTw"><i class="fa fa-twitter"></i></a></li>
                                {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
                                <li><a href="http://www.linkedin.com/in/unimed-alumni"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="https://www.instagram.com/unimed_alumni?igsh=MWpwNmU2dDVvM3dsaw%3D%3D&utm_source=qr"><i class="fa fa-instagram"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->

        <div class="navigation navigation-2">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="/">
                                <img src="{{asset('images/alumni_banner.png')}}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    @auth
                                          <li class="nav-item">
                                            <a href="{{route('home')}}"
                                            @if ($page=="Alumni Details")
                                                class="active"
                                            @endif
                                            >Home</a>
                                        </li>
                                    <li class="nav-item">
                                            <a href="{{route('alumniDetails',auth()->user()->alumniProfile->id)}}"
                                            @if ($page=="Alumni Details")
                                                class="active"
                                            @endif
                                            >Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/directory"
                                            @if ($page=="Alumni Directory")
                                                class="active"
                                            @endif
                                            >Alumni Directory</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('profile')}}"
                                            @if ($page=="Edit Profile")
                                                    class="active"
                                            @endif
                                            >Edit Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('requestHistory')}}"
                                            @if ($page=="Service Requests" || $page=="Requests History")
                                                    class="active"
                                            @endif
                                            >Requests</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('alumnireg')}}"
                                                    @if ($page=="Alumni Registration")
                                                        class="active"
                                                    @endif
                                                    >Alumni Registration</a>
                                                </li>




                                                {{-- <li><a href="{{route('services')}}" --}}
                                                    <li><a href="{{route('request_application_info')}}"

                                                    @if ($page=="Service Requests")
                                                        class="active"
                                                    @endif
                                                    >Transcript/English Proficiency Request</a>
                                                </li>
                                                 <li><a href="{{route('dues')}}"
                                                    @if ($page=="Due Requests")
                                                        class="active"
                                                    @endif
                                                    >Annual Due Payment</a>
                                                </li>
                                                <li><a href="{{route('requestHistory')}}"
                                                    @if ($page=="Requests History")
                                                        class="active"
                                                    @endif
                                                    >Requests History</a>
                                                </li>
                                                 <li><a href="{{route('DuerequestHistory')}}"
                                                    @if ($page=="Dues Payment History")
                                                        class="active"
                                                    @endif
                                                    >Dues Payment History</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('changePassword')}}"
                                            @if ($page=="Update Password")
                                                    class="active"
                                            @endif
                                            >Password</a>
                                        </li>


 @if (auth()->user()->user_type=="admin")


<li class="nav-item">
    <a href="{{ route('admin.news') }}"
    @if ($page=="Donation Management" || $page=="Admin Due Requests" || $page=="Admin Service Requests" )
         class="active"
    @endif
    > Management </a>
       <ul class="sub-menu">

                                                 <li class="nav-item">
                                            <a href="{{route('admin.serviceRequests')}}"
                                            @if ($page=="Admin Service Requests")
                                                    class="active"
                                            @endif
                                            >Manage Requests</a>
                                        </li>
                                                <li><a href="{{route('admin.dueRequests')}}"
                                                    @if ($page=="Admin Due Requests")
                                                        class="active"
                                                    @endif
                                                    >Manage Dues</a>
                                                </li>
                                                <li><a href="{{route('admin.donationHistory')}}"
                                                    @if ($page=="Donation Management")
                                                        class="active"
                                                    @endif
                                                    >Manage Donations</a>
                                                </li>



                                            </ul>
                                        </li>









                                        <li class="nav-item">
                                            <a href="{{ route('admin.news') }}"
                                            @if ($page=="Create News" || $page=="Create Events" || $page=="Events Management" || $page=="News Management")
                                                class="active"
                                            @endif
                                            > News/Event </a>


                                            <ul class="sub-menu">

                                                 <li class="nav-item">
                                            <a href="{{route('admin.createNews')}}"
                                            @if ($page=="Create News")
                                                    class="active"
                                            @endif
                                            >Create News</a>
                                        </li>

                                                <li><a href="{{route('admin.news')}}"
                                                    @if ($page=="News Management")
                                                        class="active"
                                                    @endif
                                                    >Manage News</a>
                                                </li>



                                                <li><a href="{{route('admin.createEvent')}}"
                                                    @if ($page=="Create Event")
                                                        class="active"
                                                    @endif
                                                    >Create Event</a>
                                                </li>

                                                 <li><a href="{{route('admin.events')}}"
                                                    @if ($page=="Manage Event")
                                                        class="active"
                                                    @endif
                                                    >Manage Event</a>
                                                </li>

                                            </ul>
                                        </li>

  @endif










 @if (auth()->user()->user_type=="adminug")
<li class="nav-item">
    <a href="#"
    @if ($page=="Admin Service Requests Undergraduate" )
         class="active"
    @endif
    > Management </a>
       <ul class="sub-menu">
                                                 <li class="nav-item">
                                            <a href="{{route('admin.serviceRequestsug')}}"
                                            @if ($page=="Admin Service Requests Undergraduate")
                                                    class="active"
                                            @endif
                                            >Manage Undergraduate Requests</a>
                                        </li>
                                            </ul>
                                        </li>
  @endif



   @if (auth()->user()->user_type=="adminpg")
<li class="nav-item">
    <a href="#"
    @if ($page=="Admin Service Requests Postgraduate" )
         class="active"
    @endif
    > Management </a>
       <ul class="sub-menu">
                                                 <li class="nav-item">
                                            <a href="{{route('admin.serviceRequestspg')}}"
                                            @if ($page=="Admin Service Requests Postgraduate")
                                                    class="active"
                                            @endif
                                            >Manage Postgraduate Requests</a>
                                        </li>
                                            </ul>
                                        </li>
  @endif
























                                        <li class="nav-item">
                                            <form class="inline" method="POST" action="/logout">
                                                @csrf
                                                <div style="margin-top: 40px;">
                                                    <button type="submit" class="main-btn" style="padding: 10px; line-height:5px;">
                                                        Logout
                                                    </button>
                                                </div>
                                            </form>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a href="/"
                                            @if ($page=="Home")
                                                class="active"
                                            @endif
                                            >Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#"
                                            @if ($page=="About Us" || $page=="Alumni Executive")
                                                    class="active"
                                            @endif
                                            >About Us</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('about')}}"
                                                    @if ($page=="About Us")
                                                        class="active"
                                                    @endif
                                                    >About Us</a></li>
                                                <li><a href="{{route('executive')}}"
                                                    @if ($page=="Alumni Executive")
                                                        class="active"
                                                    @endif
                                                    >Alumni Executive</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/advancement">Advancement Office</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/registration"
                                            @if ($page=="Alumni Registration")
                                                    class="active"
                                            @endif
                                            >Registration</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('donation')}}"
                                            @if ($page=="FUF Donation")
                                                    class="active"
                                            @endif
                                            >Donation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/contact-us"
                                            @if ($page=="Contact Us")
                                                    class="active"
                                            @endif
                                            >Contact Us</a>
                                        </li>

                                    @endauth

                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->
