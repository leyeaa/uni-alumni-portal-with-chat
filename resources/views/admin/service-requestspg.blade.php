<x-layout page="Admin Service Requests Postgraduate">

<section class="pt-120 pb-120 gray-bg">

    <div class="container">

        <div class="card">

            <div class="card-body">

                <h3 class="mb-4">
                    Academic Request Management Postgraduate
                </h3>
<form method="GET" action="" class="mb-4">

    <div class="row">

        <div class="col-md-10">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search matric no, organization, transaction id..."
                   value="{{ request('search') }}">

        </div>

        <div class="col-md-2">

            <button type="submit"
                    class="btn btn-dark btn-block">
                Search
            </button>

        </div>

    </div>

</form>
<div class="mb-3">

   <a href="{{ route('admin.exportServiceRequestsCsv', ['search' => request('search')]) }}"
   class="btn btn-success">
    Export CSV
</a>

</div>
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matric No</th>
                            <th>Organization</th>
                            <th>Country</th>
                            <th>Service</th>
                            <th>Mode</th>
                            <th>Amount</th>
                            <th>Request Status</th>
                            <th>Status Action</th>
                            <th>Payment</th>
                            <th>Document</th>
                            <th>Additional Document</th>
                            <th>Transaction ID</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($serviceRequests as $request)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $request->matricno }}</td>

                                <td>{{ $request->organization }}</td>

                                <td>{{ $request->country }}</td>

                                <td>{{ $request->service_type }}</td>

                                <td>{{ $request->request_method }}</td>

                                <td>{{ $request->amount }}</td>
                                <td>{{ $request->request_status }}</td>

                               <td style="min-width:220px;">

    <form method="POST"
          action="{{ route('admin.updateServiceStatus', $request->id) }}">

        @csrf

        <div class="d-flex">

            <select name="request_status"
                    class="form-control
                    @if($request->request_status == 'PENDING')
                        border-warning text-warning
                    @elseif($request->request_status == 'PROCESSING')
                        border-primary text-primary
                    @elseif($request->request_status == 'APPROVED')
                        border-success text-success
                    @elseif($request->request_status == 'REJECTED')
                        border-danger text-danger
                    @elseif($request->request_status == 'COMPLETED')
                        border-dark text-dark
                    @endif">

                <option value="PENDING"
                    {{ $request->request_status == 'PENDING' ? 'selected' : '' }}>
                    ⏳ PENDING
                </option>

                <option value="PROCESSING"
                    {{ $request->request_status == 'PROCESSING' ? 'selected' : '' }}>
                    🔄 PROCESSING
                </option>

                <option value="APPROVED"
                    {{ $request->request_status == 'APPROVED' ? 'selected' : '' }}>
                    ✅ APPROVED
                </option>

                <option value="REJECTED"
                    {{ $request->request_status == 'REJECTED' ? 'selected' : '' }}>
                    ❌ REJECTED
                </option>

                <option value="COMPLETED"
                    {{ $request->request_status == 'COMPLETED' ? 'selected' : '' }}>
                    🎓 COMPLETED
                </option>

            </select>

            <button type="submit"
                    class="btn btn-dark ml-2">
                Update
            </button>

        </div>

    </form>

</td>

                                <td>
                                    <span class="badge badge-success">
                                        {{ $request->payment }}
                                    </span>
                                </td>

                                <td>

                                    @if($request->request_document)

                                        <a class="btn btn-primary btn-sm"
                                           target="_blank"
                                           href="{{ asset('request_document/'.$request->request_document) }}">
                                            View
                                        </a>

                                    @else

                                        N/A

                                    @endif

                                </td>

                                  <td>

                                    @if($request->request_add_document)

                                        <a class="btn btn-primary btn-sm"
                                           target="_blank"
                                           href="{{ asset('request_add_document/'.$request->request_add_document) }}">
                                            View
                                        </a>

                                    @else

                                        N/A

                                    @endif

                                </td>

                                <td>
                                    {{ $request->transaction_id }}
                                </td>

                                <td>
                                    {{ $request->created_at->format('d-m-Y') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="12">
                                    No records found
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
<div class="mt-4 d-flex justify-content-center">

    {{ $serviceRequests->links() }}

</div>
            </div>

        </div>

    </div>

</section>

</x-layout>
