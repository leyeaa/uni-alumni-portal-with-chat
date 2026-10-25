<x-layout page="Edit News">

<section id="contact-page" class="pt-90 pb-120 gray-bg">

<div class="container">

<div class="row">

<div class="col-lg-10 offset-lg-1">

<div class="contact-from">

<div class="section-title">
    <h5>Admin Panel</h5>
    <h2>Edit News</h2>
</div>

<div class="main-form pt-45">

<form action="{{ route('admin.updateNews', $news->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-12">

<div class="singel-form form-group">

<label>News Title</label>

<input type="text"
       name="title"
       value="{{ $news->title }}"
       required>

</div>

</div>

<div class="col-md-12">

<div class="singel-form form-group">

<label>Current Image</label><br>

@if($news->image)
<img src="{{ asset('news_images/'.$news->image) }}"
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

<label>News Content</label>

<textarea name="content"
          class="tinymce">
    {!! $news->content !!}
</textarea>

</div>

</div>

<div class="col-md-12">

<div class="singel-form">

<button type="submit"
        class="main-btn">
    Update News
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
    height: 500,
});
</script>

</x-layout>
