<x-layout page="Edit Event">

<section id="contact-page" class="pt-90 pb-120 gray-bg">

<div class="container">

<div class="row">

<div class="col-lg-8 offset-lg-2">

<div class="contact-from">

<div class="section-title">
    <h5>Admin Panel</h5>
    <h2>Edit Event</h2>
</div>

<div class="main-form pt-45">

<form action="{{ route('admin.updateEvent', $event->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-12">

<div class="singel-form form-group">

<label>Event Title</label>

<input type="text"
       name="title"
       value="{{ $event->title }}"
       required>

</div>

</div>

<div class="col-md-6">

<div class="singel-form form-group">

<label>Event Date</label>

<input type="date"
       name="event_date"
       value="{{ $event->event_date }}"
       required>

</div>

</div>

<div class="col-md-6">

<div class="singel-form form-group">

<label>Event Time</label>

<input type="time"
       name="event_time"
       value="{{ $event->event_time }}">

</div>

</div>

<div class="col-md-12">

<div class="singel-form form-group">

<label>Venue</label>

<input type="text"
       name="venue"
       value="{{ $event->venue }}"
       required>

</div>

</div>

<div class="col-md-12">

<div class="singel-form form-group">

<label>Current Image</label><br>

@if($event->image)
<img src="{{ asset('event_images/'.$event->image) }}"
     width="200">
@endif

</div>

</div>

<div class="col-md-12">

<div class="singel-form form-group">

<label>Change Image</label>

<input type="file"
       name="image"
       class="form-control">

</div>

</div>

<div class="col-md-12">

<div class="singel-form form-group">

<label>Event Description</label>

<textarea name="description"
          class="tinymce">
{!! $event->description !!}
</textarea>

</div>

</div>

<div class="col-md-12">

<div class="singel-form"
     style="text-align:center;">

<button type="submit"
        class="main-btn">
    Update Event
</button>

</div>

</div>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</section>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>

<script>
tinymce.init({
    selector: '.tinymce',
    height: 450,
});
</script>

</x-layout>
