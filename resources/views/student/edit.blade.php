@extends('layout.main')
@section('container')
<h1 style="margin-bottom: 40px">Edit Data Students</h1>
  

<form method="post" action="/student/update/{{ $student->id }}">
  @csrf
  @method('put')
    <div class="row mb-3">
      <label for="nis" class="col-sm-2 col-form-label">NIS Siswa</label>
       <div class="col-sm-10">                                                                                                  {{-- readonly --}}
        <input type="text" class="form-control" id="nis" required value="{{old('nis_siswa',$student->nis_siswa)}}" name="nis_siswa" disabled>
      </div>
    </div>
    <div class="row mb-3">
      <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" required value="{{old('nama_siswa',$student->nama_siswa)}}" name="nama_siswa">
      </div>
    </div>
    <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir Siswa</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tanggal" required value="{{old('tanggal_lahir',$student->tanggal_lahir)}}" name="tanggal_lahir">
        </div>
      </div>
      <div class="row mb-3">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas Siswa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kelas" required value="{{old('kelas_siswa',$student->kelas_siswa)}}" name="kelas_siswa">
        </div>
      </div>
      <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat Siswa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="alamat" required value="{{old('alamat_siswa',$student->alamat_siswa)}}" name="alamat_siswa">
        </div>
      </div>
    </div>
    <button type="submit" value = "EditStudent" class="btn btn-primary" style="margin-left: 110px">Edit</button>
    <a href="/student/all" class="btn btn-primary" style="margin-left: 30px">Kembali</a>
  </form>
@endsection