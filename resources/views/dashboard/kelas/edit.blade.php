@extends('layout.main')
@section('container')
<h1 style="margin-bottom: 40px">Edit Data Kelas</h1>
  

<form method="post" action="/kelas/update/{{ $kelas->id }}">
  @csrf
  @method('put')
      <div class="row mb-3">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas Siswa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kelas" required value="{{old('kelas_siswa',$kelas->kelas_siswa)}}" name="kelas_siswa">
        </div>
      </div>
    <button type="submit" value = "EditKelas" class="btn btn-primary" style="margin-left: 110px">Edit</button>
    <a href="/kelas/all" class="btn btn-primary" style="margin-left: 30px">Kembali</a>
  </form>
@endsection