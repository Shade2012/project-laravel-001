
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home">{{$title}}</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Other
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/home">Home</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/about">About</a></li>
            <li><a class="dropdown-item" href="/student/all">Student</a></li>
            <li><a class="dropdown-item" href="/kelas/all">Kelas</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
    <div class="nav-item">
      <div style="display: flex" class="nav-item">
        @auth
        @if(Auth::check())
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user"></i>  {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard/student/all">Dashboard</a></li>
              <form action="/login/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-link nav-link me-md-4"><i class="fa-solid fa-sign-out"></i> Logout</button>
            </form>
              
            </ul>
          </li>
          
        </ul>
          <a class="nav-link me-md-4" ></a>
          @else
          <a class="nav-link me-md-4" href="/login/index"><i class="fa-solid fa-user"></i> Guest</a>
            @endif
        
        @else
     
          <a class="nav-link me-md-4" href="/login/index"><i class="fa-solid fa-user"></i> Guest</a>
          
        @endauth
    </div>
      
  </div>
  
  </div>
</nav>

    
   