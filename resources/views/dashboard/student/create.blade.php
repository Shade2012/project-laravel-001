@extends('dashboard.layouts.main')
@section('container')

<h1 style="margin-bottom: 40px">Tambah Data Students</h1>
  
@if(session('errorNis'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('errorNis') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<form method="post" action="/student/add">
  @csrf
    <div class="row mb-3">
      <label for="nis" class="col-sm-2 col-form-label">NIS Siswa</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="nis" required value="{{old('nis_siswa')}}" name="nis_siswa">
      </div>
    </div>
    <div class="row mb-3">
      <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" required value="{{old('nama_siswa')}}" name="nama_siswa">
      </div>
    </div>
    <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir Siswa</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tanggal" required value="{{old('tanggal_lahir')}}" name="tanggal_lahir">
        </div>
      </div>
      <div class="row mb-3">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas Siswa</label>
        <div class="col-sm-10">
          {{-- <input type="text" class="form-control" id="kelas" required value="{{old('kelas_siswa')}}" name="kelas_siswa"> --}}
          <select class="form-select" name="kelas_id" id="" >
            @foreach ($kelas as $kelasOption)
                <option name="kelas_id" value="{{$kelasOption->id}}">{{$kelasOption->kelas_siswa}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat Siswa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="alamat" required value="{{old('alamat_siswa')}}" name="alamat_siswa">
        </div>
      </div>
    </div>
    <button type="submit" value = "Add student" class="btn btn-primary" style="margin-left: 110px">Tambah</button>
    <a href="/student/all" class="btn btn-primary" style="margin-left: 30px">Kembali</a>
  </form>
@endsection