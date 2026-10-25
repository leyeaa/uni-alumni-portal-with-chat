<x-layout page="Events Management">

<section id="contact-page" class="pt-90 pb-120 gray-bg">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="contact-from">

                    <div class="section-title d-flex justify-content-between">

                        <div>
                            <h5>Admin Panel</h5>
                            <h2>Manage Events</h2>
                        </div>

                        <div>
                            <a href="{{ route('admin.createEvent') }}"
                               class="main-btn">
                                Add Event
                            </a>
                        </div>

                    </div>

                    <div class="main-form pt-45">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th width="200">Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($events as $event)

                                <tr>

                                    <td width="120">

                                        @if($event->image)
                                            <img src="{{ asset('event_images/'.$event->image) }}"
                                                 width="100">
                                        @endif

                                    </td>

                                    <td>{{ $event->title }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                    </td>

                                    <td>{{ $event->venue }}</td>

                                    <td>

                                        <a href="{{ route('admin.editEvent', $event->id) }}"
                                           class="btn btn-primary btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.deleteEvent', $event->id) }}"
                                              method="POST"
                                              style="display:inline-block;">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete event?')">
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                        {{ $events->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

</x-layout>
