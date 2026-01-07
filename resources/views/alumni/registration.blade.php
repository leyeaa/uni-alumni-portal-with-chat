<x-layout page="Alumni Registration">
    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-50">
                        <h5>Latest News</h5>
                        <h2>From the news</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row --> --}}
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt-100">
                    <div class="category-form">
                        <div class="form-title text-center">
                            <h3>Alumni Member</h3>
                            <span>Registration Form</span>
                        </div>
                        <div class="main-form">
                            <form action="/register" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="matricno">Matric No.:</label>
                                            <input type="text" name="matricno" placeholder="Your Matric No" value="{{old('matricno')}}">
                                            @error('matricno')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="surname">Surname.:</label>
                                            <input type="text" name="surname" placeholder="Your Surname" value="{{old('surname')}}">
                                            @error('surname')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="other_names">Other Name(s).:</label>
                                            <input type="text" name="other_names" placeholder="Enter Other Names" value="{{old('other_names')}}">
                                            @error('other_names')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="email">Email Address.:</label>
                                            <input type="email" id="email" name="email" placeholder="Your Email" value="{{old('email')}}">
                                            @error('email')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="password">Password.:</label>
                                            <input type="password" id="password" name="password" placeholder="Enter Password" value="{{old('password')}}">
                                            @error('password')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="password_confirmation">Password Confirmation.:</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{old('password_confirmation')}}">
                                            @error('password_confirmation')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="phone">Mobile No.:</label>
                                            <input type="text" name="phone" placeholder="Your Phone No" value="{{old('phone')}}">
                                            @error('phone')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="position">Current Job Title.:</label>
                                            <input type="text" name="position" placeholder="Current Job Title" value="{{old('position')}}">
                                            @error('position')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="employer">Organization/Employer.:</label>
                                            <input type="text" name="employer" placeholder="Current Organization" value="{{old('employer')}}">
                                            @error('employer')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="singel-form">
                                            <label class="form-label" for="address">Current Address.:</label>
                                            <input type="text" name="address" placeholder="Location/Address" value="{{old('address')}}">
                                            @error('address')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="profile_picture">Upload Profile Picture.:</label>
                                            <input type="file" name="profile_picture" style="border: 0px;padding-left:0px;">
                                            @error('profile_picture')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="department">Department.:</label>
                                            {{-- {{dd(deptWithOptions("Biosciences and Biotechnology"))}} --}}
                                            {{deptList("department",old('department'))}}
                                            @error('department')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="graduation_month">Graduation Month.:</label>
                                            {{number_generator(1,12,"graduation_month",old('graduation_month'))}}
                                            @error('graduation_month')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form">
                                            <label class="form-label" for="graduation_year">Graduation Year.:</label>
                                            {{number_generator(2019,(date('Y')-2019+1),"graduation_year",old('graduation_year'))}}
                                            @error('graduation_year')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Register !</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form" align="center">
                                            <em>Already Have Account?</em> <a href="/login">Login Here !</a>
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