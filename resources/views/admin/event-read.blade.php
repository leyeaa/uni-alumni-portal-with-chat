<x-layout page="{{ $event->title }}">

<section id="blog-singel" class="pt-90 pb-120 gray-bg">

<div class="container">

<div class="row">

<div class="col-lg-8">

<div class="blog-details">

@if($event->image)

<div class="thum">
<img src="{{ asset('event_images/'.$event->image) }}"
     style="width:100%;">
</div>

@endif

<div class="cont">

<h3 class="pt-30">
    {{ $event->title }}
</h3>

<ul>

<li>
    <i class="fa fa-calendar"></i>
    {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
</li>

<li>
    <i class="fa fa-clock-o"></i>
    {{ $event->event_time }}
</li>

<li>
    <i class="fa fa-map-marker"></i>
    {{ $event->venue }}
</li>

</ul>

<div class="pt-20">
    {!! $event->description !!}
</div>

</div>

</div>

</div>

</div>

</div>

</section>

</x-layout>
