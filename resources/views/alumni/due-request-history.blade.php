<x-layout page="Annual Dues Transaction History">
    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-100">
                    <div class="category-form">
                        <div class="form-title text-center">
                            <h3>Alumni Member</h3>
                            <span>Annual Due Transaction History</span>
                        </div>
                        <div class="main-form">
                                <div class="row">
                                    <div class="col-md-12" style="padding: 0px; margin:0px;">
                                        <div class="card">
                                            <div class="card-body">
                                              <h5 class="card-title" style="text-align: center; font-style:italic;">Listed below are all the transactions you've made to the Association</h5>

                                              <!-- Bordered Table -->
                                              <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">#</th>
                                                    {{-- <th scope="col">Organization</th> --}}
                                                    {{-- <th scope="col">Country</th> --}}
                                                    <th scope="col">Fee Type</th>
                                                    <th scope="col">Year</th>
                                                    <th scope="col">Amount</th>
                                                     <th scope="col">Status</th>
                                                    <th scope="col">Payment</th>
                                                    <th scope="col">Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse (Auth::user()->dueRequests as $serviceRequest)
                                                      <tr>
                                                        <th scope="row">{{$loop->iteration}}</th>
                                                        <td>
                                                          @if ($serviceRequest->status=="PENDING")
                                                            <a href="/dues/{{$serviceRequest->id}}/edit">{{$serviceRequest->service_type}}</a>
                                                          @else
                                                            {{$serviceRequest->service_type}}
                                                          @endif

                                                        </td>
                                                        {{-- <td>{{$serviceRequest->country}}</td> --}}
                                                        {{-- <td>{{$serviceRequest->service_type}}</td> --}}
                                                        <td>{{$serviceRequest->request_method}}</td>
                                                        <td>{{$serviceRequest->amount}}</td>

                                                        <td>{{$serviceRequest->status}}</td>
                                                        <td>
                                                          @if ($serviceRequest->payment=="UNPAID")
                                                          <a href="{{ route('duePayment', ['id' => $serviceRequest->id]) }}">Pay</a>
                                                          @else
                                                            <a href="https://www.unimed.edu.ng/portal/payment_receipt.php?transid={{$serviceRequest->transaction_id}}">Receipt</a>
                                                          @endif
                                                        </td>
                                                        <td>{{$serviceRequest->updated_at->format('d-m-Y')}}</td>
                                                      </tr>
                                                    @empty
                                                      <tr>
                                                        <td colspan="8"><p>You currently do not have any request</p></td>
                                                      </tr>
                                                    @endforelse


                                                </tbody>
                                              </table>
                                              <!-- End Bordered Table -->

                                            </div>
                                          </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</x-layout>
