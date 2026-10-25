<x-layout page="Events">

<section class="pt-80 pb-80">
    <div class="container">

        <div class="section-title pb-40">
            <h2>All Events</h2>
        </div>

        <ul class="list-group">

            @foreach($events as $event)

            <li class="list-group-item mb-3">
                <h4>{{ $event->title }}</h4>

                <p>
                    <i class="fa fa-calendar"></i>
                    {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}
                </p>

                <p>
                    <i class="fa fa-map-marker"></i>
                    {{ $event->venue }}
                </p>

                <p>{{ Str::limit($event->description, 150) }}</p>
            </li>

            @endforeach

        </ul>

        <div class="mt-4">
            {{ $events->links() }}
        </div>

    </div>
</section>

</x-layout>
