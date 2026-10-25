<x-layout page="{{ $news->title }}">

<section id="blog-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <div class="blog-details">

                    @if($news->image)
                        <div class="thum">
                            <img src="{{ asset('news_images/'.$news->image) }}"
                                 alt="News Image"
                                 style="width:100%;">
                        </div>
                    @endif

                    <div class="cont">

                        <h3 class="pt-30">
                            {{ $news->title }}
                        </h3>

                        <ul>
                            <li>
                                <i class="fa fa-calendar"></i>
                                {{ $news->created_at->format('d M Y') }}
                            </li>
                        </ul>

                        <div class="pt-20">
                            {!! $news->content !!}
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="saidbar">

                    <div class="saidbar-search mt-30">
                        <h4>Latest News</h4>

                        <ul class="mt-20">

                            @foreach($latestNews as $item)

                                <li class="mb-3">
                                    <a href="{{ route('news.read', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

</x-layout>
