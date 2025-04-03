<x-layout>
    <div class="container rounded p-4" style="background-color:#fff;">

        {{-- Edit profile --}}
        <div class="col-md-12 d-flex justify-content-between">
            <h4>Profile</h4>
            <button data-bs-toggle="modal" data-bs-target="#EditModal"><i class="align-middle" data-feather="edit" ></i></button>
        </div>

        {{-- info --}}
        <div class="row mt-2">
            <div class="col-md-4 border-right">
                <div class="d-flex align-items-center text-center gap-3 py-3">
                    <div class="img-profile mt-5">
                        <img class="" src="{{ asset('storage/' . auth()->user()->avatar) }}">
                    </div>
                    <div class="mt-5 text-start">
                        <h4 class="font-weight-bold">{{auth()->user()->name}}</h4>
                        <span class="text-black-50">{{auth()->user()->email}}</span>
                        <div class="media d-flex gap-2 mt-2">
                            <a href="" class="media-icon"><i class="align-middle" data-feather="instagram"></i></a>
                            <a href="" class="media-icon"><i class="align-middle" data-feather="linkedin"></i></a>
                            <a href="" class="media-icon"><i class="align-middle" data-feather="facebook"></i></a>
                            <a href="" class="media-icon"><i class="align-middle" data-feather="share"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Bio --}}
        <div class="row mt-2">
            <div class="text-strat px-4 mt-3">
                <h5>Bio</h5>
                <span>
                   {{auth()->user()->bio}}
                </span>
            </div>
        </div>

        {{-- posts --}}
        <div class="row mt-2">
            <h5 class="mt-3 px-4">My Posts</h5>
            <div class="d-flex p-3 justify-content-around">
                @foreach ($posts as $post)
                    <div class="col-md-2 card_post rounded overflow-hidden shadow-sm">
                        <img src="{{ asset('storage/' . $post->post_cover) }}" alt="Post Image" class="card-img-top" style="height: 150px; width: 100%;">
                        <div class="card-body mt-2 p-3">
                            <h5 class="card-title">{{ Str::words($post->En_title, 2) }}</h5>
                            <p class="card-text mt-2">{{ Str::words($post->En_content, 10) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
              {{-- Pagination --}}
              <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
    
    {{-- Edit Modal --}}
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
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

                   
                        <div class="mb-3">
                            <label for="avatar" class="form-label">avatar</label>
                            <input type="file" name="avatar" class="form-control" id="avatar">
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ auth()->user()->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea type="text" name="bio" rows="10" class="form-control" id="bio" value="{{ old('bio', auth()->user()->bio) }}"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-update w-100 text-center mt-3">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>
