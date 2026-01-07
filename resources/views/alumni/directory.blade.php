<x-layout page="Alumni Directory">
        <!--====== TEACHERS PART START ======-->
    
        <section id="teachers-part" class="pt-65 pb-120">
            <div class="container alumni-bg pb-30">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-title mt-30 pb-15">
                            <h5>Featured Members</h5>
                            <h2>Meet Alumni Members</h2>
                        </div> <!-- section title -->
                    </div>
                    <div class="col-lg-5" style="display: flex; align-items: flex-end;">
                        <div class="contact-from">
                            <div class="main-form">
                                <form action="{{route('directory')}}" method="get">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="singel-form form-group">
                                                <input name="search" type="text" placeholder="Surname or Other Names" style="height: 40px;" required="required">
                                            </div> <!-- singel form -->
                                        </div>
                                        <div class="col-md-5">
                                            <div class="singel-form">
                                                <button type="submit" class="main-btn" style="line-height: 40px;">Search!</button>
                                            </div> <!-- singel form -->
                                        </div> 
                                    </div> <!-- row -->
                                </form>
                            </div> <!-- main form -->
                        </div> <!--  contact from -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    @foreach ($alumni_members as $alumni)
                        <div class="col-lg-3 col-sm-6">
                            <div class="singel-teachers mt-30 text-center">
                                <div class="image">
                                    <img src="profile_pictures/{{$alumni->profile_picture}}" width="270" height="308" alt="Alumni Members">
                                </div>
                                <div class="cont">
                                    <a href="/alumniDetails/{{$alumni->id}}"><h6>{{$alumni->surname." ".$alumni->other_names}}</h6></a>
                                    <span>{{$alumni->position}}</span>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                    @endforeach
                </div> <!-- row -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <nav class="courses-pagination mt-50">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a href="#" aria-label="Previous">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="active" href="#">1</a></li>
                                <li class="page-item"><a href="#">2</a></li>
                                <li class="page-item"><a href="#">3</a></li>
                                <li class="page-item">
                                    <a href="#" aria-label="Next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>  <!-- courses pagination --> --}}
                        {{$alumni_members->links()}}
                    </div>
                </div>  
                <!-- row -->
            </div> <!-- container -->
        </section>
        
        <!--====== TEACHERS PART ENDS ======-->
</x-layout>