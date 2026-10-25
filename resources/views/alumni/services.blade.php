<x-layout page="Service Requests">
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-from">
                        <div class="section-title">
                            <h5>University Academic Requests</h5>
                            <h2>Request a Service</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form action="{{route('processRequest')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="organization">Personal/Organization Name:</label>
                                            <input name="organization" type="text" placeholder="Organization" style="height:42px;" value="{{old('organization')}}" required="required">
                                            @error('organization')
                                                <div class="help-block with-errors">
                                                    {{$message}}
                                                </div>
                                            @enderror

                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="country">Destination Country.:</label>
                                            <select name="country" class="form-select">
                                                <option>Nigeria</option>
                                                <option>Other Countries</option>
                                            </select>
                                            @error('country')
                                                <div class="help-block with-errors">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="address">Address.:</label>
                                            <textarea name="address" placeholder="Address" required="required">{{old('address')}}</textarea>
                                            @error('address')
                                                <div class="help-block with-errors">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="service_type">Service Type.:</label><br />
                                            <select name="service_type" class="form-select">
                                                <option>Transcript</option>
                                                <option>Letter of English Proficiency</option>
                                                <option>Letter of Attestation</option>
                                                <option>Letter of Introduction</option>
                                            </select>
                                            @error('service_type')
                                                <div class="help-block with-errors">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="request_method">Request Method.:</label><br />
                                            <select name="request_method" class="form-select">
                                                <option>Student Copy via Email</option>
                                                <option>Student Copy via Courier</option>
                                                <option>Official Copy via Email</option>
                                                <option>Official Copy via Courier</option>
                                                {{-- <option>Soft & Hard Copy</option> --}}
                                            </select>
                                            @error('request_method')
                                                <div class="help-block with-errors">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>


                                 <div class="col-md-12">
                                <div class="singel-form form-group">
                                    <label class="form-label">Upload Application Letter</label>

                                    <input type="file"
                                        name="request_document"
                                        class="form-control"
                                        required>

                                    @error('request_document')
                                        <div class="warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                                    <div class="col-md-12">
                                <div class="singel-form form-group">
                                    <label class="form-label">Upload Additional Document</label>

                                    <input type="file"
                                        name="request_add_document"
                                        class="form-control"
                                        required>

                                    @error('request_add_document')
                                        <div class="warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="singel-form" style="text-align: center;">
                                            <button type="submit" class="main-btn">Submit Request</button>
                                        </div> <!-- singel form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

    </section>
</x-layout>
