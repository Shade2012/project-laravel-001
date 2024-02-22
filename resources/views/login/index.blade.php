@extends('layout.main')


  
@section('container')

        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
          {{Session::get('error')}}
        </div>
            
            
        @endif
  
  <body class="">   
    <div class="container">
        <div class="row justify-content-center">
          <main class="form-signin col-md-7">
            <form action="/login/post" method="post">
              @csrf
              <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
   
              <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
      
              <a href="/register/index">Belum punya akun? Daftar Disini</a>
              <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
              <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
            </form>
          </main>
        </div>
      </div>
      
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


@endsection
