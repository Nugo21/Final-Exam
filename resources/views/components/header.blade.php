<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{route('welcome')}}"><h2>Stand Blog<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('welcome')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog Entries</a>
              </li> -->
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{route('login-view')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('registerView')}}">Sign Up</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{route('createBlog')}}">Create Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('userBlogs')}}">My Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('myProfile')}}">My Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Log Out</a>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
    </header>
