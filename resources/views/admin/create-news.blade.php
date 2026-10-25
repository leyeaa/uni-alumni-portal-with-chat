<x-layout page="Create News">

<section id="contact-page" class="pt-90 pb-120 gray-bg">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 offset-lg-1">

                <div class="contact-from">

                    <div class="section-title">
                        <h5>Admin Panel</h5>
                        <h2>Create News</h2>
                    </div>

                    <div class="main-form pt-45">

                        <form action="{{ route('admin.storeNews') }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="singel-form form-group">

                                        <label>News Title</label>

                                        <input type="text"
                                               name="title"
                                               required>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="singel-form form-group">

                                        <label>Featured Image</label>

                                        <input type="file"
                                               name="image"
                                               class="form-control">

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="singel-form form-group">

                                        <label>News Content</label>

                                        <textarea name="content"
                                                  class="tinymce"></textarea>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="singel-form">

                                        <button type="submit"
                                                class="main-btn">
                                            Publish News
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
