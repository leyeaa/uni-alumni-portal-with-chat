<x-layout page="Update Dues Payment">
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-from">
                        <div class="section-title">
                            <h5>University Annual Due Payment</h5>
                            <h2>Update Annual Due Payment</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form action="/dues/{{$dueRequest->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">



                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="service_type">Service Type.:</label><br />
                                            <select name="service_type" class="form-select">
                                                <option>Annaual Due</option>
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
                                             <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                                <option>2023</option>
                                                <option>2024</option>
                                                <option>2025</option>
                                                <option>2026</option>
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
