<x-layout page="News Management">

<section id="contact-page" class="pt-90 pb-120 gray-bg">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="contact-from">

                    <div class="section-title d-flex justify-content-between">

                        <div>
                            <h5>Admin Panel</h5>
                            <h2>Manage News</h2>
                        </div>

                        <div>
                            <a href="{{ route('admin.createNews') }}"
                               class="main-btn">
                                Add News
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
                                    <th width="200">Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($news as $item)

                                <tr>

                                    <td width="120">

                                        @if($item->image)
                                            <img src="{{ asset('news_images/'.$item->image) }}"
                                                 width="100">
                                        @endif

                                    </td>

                                    <td>
                                        {{ $item->title }}
                                    </td>

                                    <td>
                                        {{ $item->created_at->format('d M Y') }}
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.editNews', $item->id) }}"
                                           class="btn btn-primary btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.deleteNews', $item->id) }}"
                                              method="POST"
                                              style="display:inline-block;">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete this news?')">
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                        {{ $news->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

</x-layout>
