<x-layout page="Edit Profile">
    @php
        $profile = auth()->user()->alumniprofile;
    @endphp
    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt-100">
                    <div class="category-form">
                        <div class="form-title text-center">
                            <h3>Alumni Member</h3>
                            <span>Profile Details</span>
                        </div>
                        <div class="main-form">
                            <form action="/profile/{{$profile->id}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="matricno">Matric No.:</label>
                                            <input type="text" name="matricno" placeholder="Your Matric No" value="{{$profile->matricno}}" readonly>
                                            @error('matricno')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="surname">Surname.:</label>
                                            <input type="text" name="surname" placeholder="Your Surname" value="{{$profile->surname}}">
                                            @error('surname')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="other_names">Other Name(s).:</label>
                                            <input type="text" name="other_names" placeholder="Enter Other Names" value="{{$profile->other_names}}">
                                            @error('other_names')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="phone">Mobile No.:</label>
                                            <input type="text" name="phone" placeholder="Your Phone No" value="{{$profile->phone}}">
                                            @error('phone')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="position">Current Job Title.:</label>
                                            <input type="text" name="position" placeholder="Current Job Title" value="{{$profile->position}}">
                                            @error('position')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="employer">Organization/Employer.:</label>
                                            <input type="text" name="employer" placeholder="Current Organization" value="{{$profile->employer}}">
                                            @error('employer')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="singel-form">
                                            <label class="form-label" for="address">Current Address.:</label>
                                            <input type="text" name="address" placeholder="Location/Address" value="{{$profile->address}}">
                                            @error('address')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="singel-form">
                                                    <label class="form-label" for="profile_picture">Update Profile Picture.:</label>
                                                    <input type="file" name="profile_picture" style="border: 0px;padding-left:0px;">
                                                    @error('profile_picture')
                                                        <p class="warning">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="singel-form">
                                                    <img src="{{asset('profile_pictures/'. $profile->profile_picture)}}" width="80" height="80" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="department">Department.:</label>
                                            {{deptList("department",$profile->department)}}
                                            @error('department')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="graduation_month">Graduation Month.:</label>
                                            {{number_generator(1,12,"graduation_month",$profile->graduation_month)}}
                                            @error('graduation_month')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="graduation_year">Graduation Year</label>
                                            {{number_generator(2019,(date('Y')-2019+1),"graduation_year",$profile->graduation_year)}}
                                            @error('graduation_year')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <label class="form-label" for="address">Brief Profile.:</label>
                                            <textarea name="brief_profile" placeholder="Brief Profile">{{$profile->brief_profile}}</textarea>
                                            @error('brief_profile')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="phone">Linkedin.:</label>
                                            <input type="text" name="linkedin" placeholder="Linkedin Profile" value="{{$profile->linkedin}}">
                                            @error('linkedin')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="phone">Facebook.:</label>
                                            <input type="text" name="facebook" placeholder="Facebook Profile" value="{{$profile->facebook}}">
                                            @error('facebook')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="phone">Twitter.:</label>
                                            <input type="text" name="twitter" placeholder="Twitter Profile" value="{{$profile->twitter}}">
                                            @error('twitter')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Update Profile !</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</x-layout>