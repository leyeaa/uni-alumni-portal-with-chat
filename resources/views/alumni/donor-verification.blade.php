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
                            <form action="https://www.unimed.edu.ng/portal/paymentprocessremita.php" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="transid">Transaction ID.:</label>
                                            <input name="transid" type="text" placeholder="Transaction ID" value="{{$formFields['transaction_id']}}" style="height:42px;" required="required" readonly>
                                            @error('transid')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="matno">Matric No/Donor ID<span style="font-size: 12px; font-style:italic;">(Alumni Member)</span>.:</label>
                                            <input name="matno" type="text" placeholder="Matric No or Previous Donor ID" style="height:42px;" value="{{$formFields['matricno']}}" readonly>
                                            <input name="pcode" type="hidden" value="REMITA" >
                                            @error('matno')
                                                <div class="warming">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                            
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="sname">Surname.:</label>
                                            <input name="sname" type="text" placeholder="Your Surname" style="height:42px;" value="{{$formFields['surname']}}" required="required" readonly>
                                            @error('sname')
                                                <div class="warming">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                            
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="oname">Other Name(s).:</label>
                                            <input name="oname" type="text" placeholder="Other Name(s)" style="height:42px;" value="{{$formFields['other_names']}}" required="required" readonly>
                                            @error('oname')
                                                <div class="warning">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <label class="form-label" for="address">Address.:</label>
                                            <input name="address" type="text" placeholder="Your Address" style="height:42px;" value="{{$formFields['address']}}" required="required" readonly>
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
                                            <input name="phone" type="text" placeholder="Your Mobile No" style="height:42px;" value="{{$formFields['phone']}}" required="required" readonly>
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
                                            <input name="email" type="email" placeholder="Your Email" style="height:42px;" value="{{$formFields['email']}}" required="required" readonly>
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
                                            <input name="amount" type="text" placeholder="Amount" style="height:42px;" value="{{$formFields['amount']}}" required="required" readonly>
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
                                            <input name="paymenttype" type="text" placeholder="Payment Description" style="height:42px;" value="{{$formFields['payment_type']}}" required="required" readonly>
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
                                            <button type="submit" name="pay" class="main-btn">Continue</button>
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