<x-layout page="Contact Us">
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5>Contact Us</h5>
                            <h2>Keep in touch</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form action="/feedback" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="name" type="text" placeholder="Your name" value="{{old('name')}}" required="required">
                                            @error('name')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="email" type="email" placeholder="Email" value="{{old('email')}}" required="required">
                                            @error('email')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="subject" type="text" placeholder="Subject" value="{{old('subject')}}" required="required">
                                            @error('name')
                                                <div class="subject">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="phone" type="text" placeholder="Phone" value="{{old('phone')}}" required="required">
                                            @error('phone')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <textarea name="messege" placeholder="Messege" required="required">{{old('message')}}</textarea>
                                            @error('message')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12" align="center" >
                                        <div class="g-recaptcha" data-sitekey="6Ldek1gpAAAAAKPTWP57LTce0KKtO5lDTzugr5LG"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Send</button>
                                        </div> <!-- singel form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
                <div class="col-lg-5">
                    <div class="contact-address mt-30" style="padding-bottom: 15px;">
                        <ul>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Alumni office, Beside Lecture Room 2, Olu Akinkugbe TETFund Building, Laje Campus.</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+234</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>advancement@unimed.edu.ng</p>
                                        <p>alumni@unimed.edu.ng</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                        </ul>
                    </div> <!-- contact address -->
                    <div class="map mt-10">
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15837.670043633456!2d4.8080394!3d7.0774986!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfeb71435018ac9fe!2sUniversity%20of%20medical%20sciences!5e0!3m2!1sen!2sng!4v1593428354861!5m2!1sen!2sng" width="470" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div> <!-- map -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</x-layout>
