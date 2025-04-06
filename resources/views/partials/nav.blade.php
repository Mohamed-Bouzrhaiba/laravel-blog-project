<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route("posts.index")}}">All Posts</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route("posts.myposts",auth()->user())}}">My Posts</a>
          </li>
          @endauth


          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
                @auth
                <li><a class="nav-link" href="{{route("logout")}}">logout</a></li>
                @endauth
                @guest
                <li><a class="nav-link" href="{{route("login.form")}}">login</a></li>
                <li><a class="nav-link" href="{{route("form.register")}}">register</a></li>
                @endguest
        </ul>
      </div>
    </div>
  </nav>
