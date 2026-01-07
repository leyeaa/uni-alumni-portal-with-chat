<x-layout page="FUF Donation">
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-from">
                        <div class="section-title">
                            <h5>University Academic Requests</h5>
                            <h2>FUF Donation Page</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form action="{{route('donationData')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="transaction_id">Transaction ID.:</label>
                                            <input name="transaction_id" type="text" placeholder="Transaction ID" style="height:42px;" value="{{$transactionID}}" required="required" readonly>
                                            @error('transaction_id')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="matricno">Matric No/Donor ID.:</label>
                                            <input name="matricno" type="text" placeholder="Matric No or Previous Donor ID" style="height:42px;" value="{{old('matricno')}}">
                                            @error('matricno')
                                                <div class="warming">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                            
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="surname">Surname.:</label>
                                            <input name="surname" type="text" placeholder="Your Surname" style="height:42px;" value="{{old('surname')}}" required="required">
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
                                            <input name="other_names" type="text" placeholder="Other Name(s)" style="height:42px;" value="{{old('other_names')}}" required="required">
                                            @error('other_names')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="address">Address.:</label>
                                            <input name="address" type="text" placeholder="Your Address" style="height:42px;" value="{{old('address')}}" required="required">
                                            @error('address')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="phone">Mobile No.:</label>
                                            <input name="phone" type="text" placeholder="Your Mobile No" style="height:42px;" value="{{old('phone')}}" required="required">
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
                                            <input name="email" type="email" placeholder="Your Email" style="height:42px;" value="{{old('email')}}" required="required">
                                            @error('email')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="amount">Amount(Specify Below).:</label>
                                            <input name="amount" type="text" placeholder="Amount" style="height:42px;" value="1000" required="required">
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
                                            <input name="payment_type" type="text" placeholder="Payment Description" style="height:42px;" value="UNIMED FUF DONATION" required="required" readonly>
                                            @error('payment_type')
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
                                        <div class="singel-form" style="text-align: center;">
                                            <button type="submit" class="main-btn">Make Donation</button>
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