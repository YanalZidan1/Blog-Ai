  @auth
  <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand " href="{{route('dashboard')}}">
                <span class="align-middle">Blog Ai</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="{{route('dashboard')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('posts')}}">
                        <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Posts</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('profile')}}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('logout')}}">
                        <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Log Out</span>
                    </a>
                </li>


        </div>
    </nav>
    @endauth
