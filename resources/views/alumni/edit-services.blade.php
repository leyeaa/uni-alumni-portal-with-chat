<x-layout page="Edit Service Request">
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-from">
                        <div class="section-title">
                            <h5>University Academic Requests</h5>
                            <h2>Edit Service Request</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form action="/services/{{$serviceRequest->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="organization">Organization Name.:</label>
                                            <input name="organization" type="text" placeholder="Organization" style="height:42px;" value="{{$serviceRequest->organization}}">
                                            @error('organization')
                                                <div class="warning">
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
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="address">Address.:</label>
                                            <textarea name="address" placeholder="Address" data-error="Please,leave us a message." required="required">{{$serviceRequest->address}}</textarea>
                                            @error('address')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="service_type">Service Type.:</label><br />
                                            <select name="service_type" class="form-select">
                                                <option @if ($serviceRequest->service_type=="Transcript") @selected(true) @endif>Transcript</option>
                                                <option @if ($serviceRequest->service_type=="Letter of English Proficiency") @selected(true) @endif>Letter of English Proficiency</option>
                                                <option @if ($serviceRequest->service_type=="Letter of Attestation") @selected(true) @endif>Letter of Attestation</option>
                                                <option @if ($serviceRequest->service_type=="Letter of Introduction") @selected(true) @endif>Letter of Introduction</option>
                                            </select>
                                            @error('service_type')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form --> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="request_method">Request Method.:</label><br />
                                            <select name="request_method" class="form-select">
                                                <option @if ($serviceRequest->request_method=="Soft Copy") @selected(true) @endif >Soft Copy</option>
                                                <option @if ($serviceRequest->request_method=="Student Copy") @selected(true) @endif >Student Copy</option>
                                                <option @if ($serviceRequest->request_method=="Hard Copy") @selected(true) @endif >Hard Copy</option>
                                                <option @if ($serviceRequest->request_method=="Soft & Hard Copy") @selected(true) @endif >Soft & Hard Copy</option>
                                            </select>
                                            @error('request_method')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="singel-form" style="text-align: center;">
                                            <button type="submit" class="main-btn">Update Request</button>
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