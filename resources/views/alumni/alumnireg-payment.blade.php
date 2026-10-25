<x-layout page="Alumni Registration Payment">
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-from">
                        <div class="section-title">
                            <h5>University Alumni Registration Fee</h5>
                            <h2>Alumni Registration FEe Payment Page</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form action="{{ url('alumniRegPaystack') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="matricno">Matric No.:</label>
                                            <input name="matricno" type="text" placeholder="Matric No" style="height:42px;" value="{{$profile->matricno}}" required="required" readonly >
                                            @error('matricno')
                                                <div class="warming">
                                                    {{$message}}
                                                </div>
                                            @enderror

                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="transaction_id">Transaction ID.:</label>
                                            <input name="transaction_id" type="text" placeholder="Transaction ID" style="height:42px;" value="{{$dueDetails->transaction_id}}" required="required" readonly>
                                            @error('transaction_id')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="surname">Surname.:</label>
                                            <input name="surname" type="text" placeholder="Your Surname" style="height:42px;" value="{{$profile->surname}}" required="required" readonly>
                                            @error('surname')
                                                <div class="warming">
                                                    {{$message}}
                                                </div>
                                            @enderror

                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="other_names">Other Name(s).:</label>
                                            <input name="other_names" type="text" placeholder="Other Name(s)" style="height:42px;" value="{{$profile->other_names}}" required="required" readonly>
                                            @error('other_names')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="department">Department.:</label>
                                            <input name="department" type="text" placeholder="Your Department" style="height:42px;" value="{{$profile->department}}" required="required" readonly>
                                            @error('department')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="service_type">Year.:</label>
                                            <input name="request_method" type="text" placeholder="Your Department" style="height:42px;" value="{{$dueDetails->request_method}}" required="required" readonly>
                                            @error('service_type')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="phone">Mobile No.:</label>
                                            <input name="phone" type="text" placeholder="Your Mobile No" style="height:42px;" value="{{$profile->phone}}" required="required" readonly>
                                            @error('phone')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="email">E-mail Address.:</label>
                                            <input name="email" type="email" placeholder="Your Email" style="height:42px;" value="{{$profile->user->email}}" required="required" readonly>
                                            @error('email')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="amount">Amount.:</label>
                                            <input name="amount" type="text" placeholder="Amount" style="height:42px;" value="{{$dueDetails->amount}}" required="required" readonly>
                                            @error('amount')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="payment_type">Payment Description.:</label>
                                            <input name="payment_type" type="text" placeholder="Payment Description" style="height:42px;" value="UNIMED ALUMNI ANNUAL DUES" required="required" readonly>
                                            @error('payment_type')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>



                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="singel-form" style="text-align: center;">
                                            <button type="submit" class="main-btn">Make Payment</button>
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
