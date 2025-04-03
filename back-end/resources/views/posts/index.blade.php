<x-layout>
    <div class="col-md-12 d-flex justify-content-between">
        <h2 class="fw-bold title-post">Posts</h2>
        <a class="btn btn-create m-2" data-bs-toggle="modal" data-bs-target="#CreateModal">Create</a>
    </div>

    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">En-title</th>
                <th scope="col">Ar-title</th>
                <th scope="col">En-content</th>
                <th scope="col">Ar-content</th>
                <th scope="col">Post Cover</th>
                <th scope="col">Card Cover</th>
                <th scope="col">Created_at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
                <tr>
                    <th scope="row">{{$index + 1}}</th>
                    <td>{{ Str::words($post->En_title, 2) }}</td>
                    <td>{{ Str::words($post->Ar_title, 2) }}</td>
                    <td>{{ Str::words($post->En_content, 3) }}</td>
                    <td>{{ Str::words($post->Ar_content, 3) }}</td>

                    <td>
                        @if ($post->post_cover)
                            <img src="{{ asset('storage/' . $post->post_cover) }}" alt="" class="img-fluid"
                                style="width: 25px">
                        @endif
                    </td>
                    <td>
                        @if ($post->card_cover)
                            <img src="{{ asset('storage/' . $post->card_cover) }}" alt="" class="img-fluid"
                                style="width: 25px">
                        @endif
                    </td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td class="d-flex gap-2">
                        <!-- Delete Button -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger p-2"><i class="align-middle"
                                    data-feather="trash-2"></i></button>
                        </form>
                        <button type="button" class="btn btn-info p-2" data-bs-toggle="modal"
                            data-bs-target="#UpdateModal{{ $post->id }}"><i class="align-middle text-white"
                                data-feather="edit"></i></button>
                    </td>
                </tr>

                {{-- Update Modal --}}
                <div class="modal fade" id="UpdateModal{{ $post->id }}" tabindex="-1"
                    aria-labelledby="UpdateModalLabel{{ $post->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="UpdateModalLabel{{ $post->id }}">Update Post</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <form action="{{ route('posts.update', $post->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="d-flex align-items-start gap-2">
                                        <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <button class="nav-link active mt-3" id="v-pills-En-post-Up-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-pills-En-post-Up"
                                                type="button" role="tab" aria-controls="v-pills-En-post-Up"
                                                aria-selected="true">En-post</button>
                                            <button class="nav-link mt-3" id="v-pills-Ar-post-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-Ar-post-Up" type="button" role="tab"
                                                aria-controls="v-pills-Ar-post-Up"
                                                aria-selected="false">Ar-post</button>
                                            <button class="nav-link mt-3" id="v-pills-covers-Up-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-pills-covers-Up" type="button"
                                                role="tab" aria-controls="v-pills-covers-Up"
                                                aria-selected="false">Covers</button>
                                        </div>

                                        <div class="tab-content p-3" id="v-pills-tabContent">
                                            <!-- English Content Tab -->
                                            <div class="tab-pane fade show active" id="v-pills-En-post-Up"
                                                role="tabpanel" aria-labelledby="v-pills-En-post-Up-tab" tabindex="0">
                                                <div class="mt-3">
                                                    <label for="En_title" class="form-label">En-title</label>
                                                    <input type="text" class="form-control" id="En_title"
                                                        name="En_title" value="{{ old('En_title', $post->En_title) }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="En_content" class="form-label">En-content</label>
                                                    <textarea class="form-control" id="En_content" rows="10" name="En_content">{{ old('En_content', $post->En_content) }}</textarea>
                                                </div>
                                            </div>

                                            <!-- Arabic Content Tab -->
                                            <div class="tab-pane fade" id="v-pills-Ar-post-Up" role="tabpanel"
                                                aria-labelledby="v-pills-Ar-post-Up-tab" tabindex="0">
                                                <div class="mt-3">
                                                    <label for="Ar_title" class="form-label">Ar-title</label>
                                                    <input type="text" class="form-control" id="Ar_title"
                                                        name="Ar_title"
                                                        value="{{ old('Ar_title', $post->Ar_title) }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="Ar_content" class="form-label">Ar-content</label>
                                                    <textarea class="form-control" id="Ar_content" rows="10" name="Ar_content">{{ old('Ar_content', $post->Ar_content) }}</textarea>
                                                </div>
                                            </div>

                                            <!-- Covers Tab -->
                                            <div class="tab-pane fade" id="v-pills-covers-Up" role="tabpanel"
                                                aria-labelledby="v-pills-covers-Up-tab" tabindex="0">
                                                <div class="d-flex gap-5 justify-content-center">
                                                    <div class="mt-3">
                                                        <label for="card_cover" class="form-label">Cover Card</label>
                                                        <div
                                                            class="cover-post d-flex align-items-center flex-column gap-2">
                                                            @if ($post->card_cover)
                                                                <img src="{{ asset('storage/' . $post->card_cover) }}"
                                                                    class="img-fluid mt-2"
                                                                    style="width: 200px ; height: 250px">
                                                            @endif
                                                            <input type="file" class="form-control"
                                                                id="card_cover" name="card_cover"
                                                                style="width: 108px">
                                                        </div>

                                                    </div>

                                                    <div class="mt-3">
                                                        <label for="post_cover" class="form-label">Cover Post</label>
                                                        <div
                                                            class="post_cover d-flex align-items-center flex-column gap-2">
                                                            @if ($post->post_cover)
                                                                <img src="{{ asset('storage/' . $post->post_cover) }}"
                                                                    class="img-fluid mt-2"
                                                                    style="width: 250px ; height: 250px">
                                                            @endif
                                                            <input type="file" class="form-control"
                                                                id="post_cover" name="post_cover"
                                                                style="width: 108px">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-update  mt-3 w-100">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $posts->links() }}
    </div>

    {{-- Create Modal --}}
    <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="CreateModalLabel">Create Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-En-post-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-En-post" type="button" role="tab"
                                    aria-controls="v-pills-En-post" aria-selected="true">En-post</button>
                                <button class="nav-link" id="v-pills-Ar-post-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-Ar-post" type="button" role="tab"
                                    aria-controls="v-pills-Ar-post" aria-selected="false">Ar-post</button>
                                <button class="nav-link" id="v-pills-covers-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-covers" type="button" role="tab"
                                    aria-controls="v-pills-covers" aria-selected="false">Covers</button>
                            </div>

                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- English Content Tab -->
                                <div class="tab-pane fade show active" id="v-pills-En-post" role="tabpanel"
                                    aria-labelledby="v-pills-En-post-tab" tabindex="0">
                                    <div class="mt-3">
                                        <label for="En_title" class="form-label">En-title</label>
                                        <input type="text" class="form-control" id="En_title" name="En_title"
                                            value="{{ old('En_title') }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="En_content" class="form-label">En-content</label>
                                        <textarea class="form-control" id="En_content" rows="10" name="En_content">{{ old('En_content') }}</textarea>
                                    </div>
                                </div>

                                <!-- Arabic Content Tab -->
                                <div class="tab-pane fade" id="v-pills-Ar-post" role="tabpanel"
                                    aria-labelledby="v-pills-Ar-post-tab" tabindex="0">
                                    <div class="mt-3">
                                        <label for="Ar_title" class="form-label">Ar-title</label>
                                        <input type="text" class="form-control" id="Ar_title" name="Ar_title"
                                            value="{{ old('Ar_title') }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="Ar_content" class="form-label">Ar-content</label>
                                        <textarea class="form-control" id="Ar_content" rows="10" name="Ar_content">{{ old('Ar_content') }}</textarea>
                                    </div>
                                </div>

                                <!-- Covers Tab -->
                                <div class="tab-pane fade" id="v-pills-covers" role="tabpanel"
                                    aria-labelledby="v-pills-covers-tab" tabindex="0">
                                    <div class="mt-3">
                                        <label for="card_cover" class="form-label">Cover Card</label>
                                        <input type="file" class="form-control" id="card_cover"
                                            name="card_cover">
                                    </div>
                                    <div class="mt-3">
                                        <label for="post_cover" class="form-label">Cover Post</label>
                                        <input type="file" class="form-control" id="post_cover"
                                            name="post_cover">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-update w-100 text-center mt-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-layout>
