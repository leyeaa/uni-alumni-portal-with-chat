<x-layout page="News">

<section class="pt-80 pb-80">
    <div class="container">

        <div class="section-title pb-40">
            <h2>All News</h2>
        </div>

        <div class="row">

            @foreach($news as $item)

            <div class="col-lg-4">
                <div class="card mb-4">

                    @if($item->image)
                        <img src="{{ asset('news_images/'.$item->image) }}" class="card-img-top">
                    @endif

                    <div class="card-body">
                        <a href="{{ route('news.read', $item->slug) }}">
                            <h4>{{ $item->title }}</h4>
                        </a>

                        <p>{{ Str::limit($item->content, 150) }}</p>

                        <small>{{ $item->created_at->format('d M Y') }}</small>
                    </div>

                </div>
            </div>

            @endforeach

        </div>

        <div class="mt-4">
            {{ $news->links() }}
        </div>

    </div>
</section>

</x-layout>
