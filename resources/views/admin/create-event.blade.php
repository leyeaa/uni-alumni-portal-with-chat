<x-layout page="Create Event">

<section id="contact-page" class="pt-90 pb-120 gray-bg">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 offset-lg-2">

                <div class="contact-from">

                    <div class="section-title">
                        <h5>Admin Panel</h5>
                        <h2>Create Event</h2>
                    </div>

                    <div class="main-form pt-45">

                        <form action="{{ route('admin.storeEvent') }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="singel-form form-group">

                                        <label>Event Title</label>

                                        <input type="text"
                                               name="title"
                                               required>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="singel-form form-group">

                                        <label>Event Date</label>

                                        <input type="date"
                                               name="event_date"
                                               required>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="singel-form form-group">

                                        <label>Event Time</label>

                                        <input type="time"
                                               name="event_time">

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="singel-form form-group">

                                        <label>Venue</label>

                                        <input type="text"
                                               name="venue"
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

                                        <label>Event Description</label>

                                        <textarea name="description"
                                                  class="tinymce"></textarea>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="singel-form"
                                         style="text-align:center;">

                                        <button type="submit"
                                                class="main-btn">
                                            Create Event
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
