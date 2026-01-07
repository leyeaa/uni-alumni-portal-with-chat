<x-layout page="Update Password">
    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt-100">
                    <div class="category-form">
                        <div class="form-title text-center">
                            <h3>Alumni Member</h3>
                            <span>Change Password</span>
                        </div>
                        <div class="main-form">
                            <form action="/updatePassword/{{auth()->user()->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form">
                                            <label class="form-label" for="password">New Password.:</label>
                                            <input type="password" id="password" name="password" placeholder="Enter Password" value="{{old('password')}}">
                                            @error('password')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form">
                                            <label class="form-label" for="password_confirmation">Confirm Password.:</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{old('password_confirmation')}}">
                                            @error('password_confirmation')
                                                <p class="warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Change Password !</button>
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