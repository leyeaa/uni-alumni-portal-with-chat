<x-layout page="Admin Due Requests">

<section class="pt-120 pb-120 gray-bg">

    <div class="container">

        <div class="card">

            <div class="card-body">

                <h3 class="mb-4">
                    Annual Due Payment Management
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

    <a href="{{ route('admin.exportDueRequestsCsv', ['search' => request('search')]) }}"
   class="btn btn-success">
    Export CSV
</a>

</div>
                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Matric No</th>

                            <th>Fee Type</th>

                            <th>Year</th>

                            <th>Amount</th>

                            <th>Status</th>

                            <th>Payment</th>

                            <th>Transaction ID</th>

                            <th>Gateway</th>

                            <th>Date</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($dueRequests as $due)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $due->matricno }}</td>

                                <td>{{ $due->service_type }}</td>

                                <td>{{ $due->request_method }}</td>

                                <td>{{ number_format($due->amount,2) }}</td>

                                <td>
                                    <span class="badge badge-info">
                                        {{ $due->status }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge badge-success">
                                        {{ $due->payment }}
                                    </span>
                                </td>

                                <td>
                                    {{ $due->transaction_id }}
                                </td>

                                <td>
                                    {{ $due->pay_channel }}
                                </td>

                                <td>
                                    {{ $due->created_at->format('d-m-Y') }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="10">
                                    No records found
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>
                <div class="mt-4 d-flex justify-content-center">

    {{ $dueRequests->links() }}

</div>

            </div>

        </div>

    </div>

</section>

</x-layout>
