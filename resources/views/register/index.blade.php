@extends('layout.main')


  
@section('container')
  
@if(session('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
      
    <div class="container">
        <div class="row justify-content-center">
          <main class="form-signin col-md-4">
            <form action="/register/store" method="post">
              @csrf
              <h1 class="h3 mb-3 fw-normal">Please Register</h1>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="name" value="{{ old('name') }}" placeholder="name@example.com">
                <label for="floatingInput">Name</label>
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control " value="{{ old('password') }}" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <button class="btn btn-primary w-100 py-2" type="submit">Daftar</button>
              <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
            </form>
          </main>
        </div>
      </div>
      
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


@endsection
