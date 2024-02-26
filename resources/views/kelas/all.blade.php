@extends('layout.main')
@section('container')
@if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<h1>Data Kelas</h1>

<table  class="table">
<thead class="table-dark">
        <th>Kelas Siswa</th>
    </thead>
      @foreach ($kelass as $kelas)
        <tbody>
            <td>{{$kelas["kelas_siswa"]}}</td>
            <td>
                <a type="button" href="/kelas/detail/{{$kelas->id}}"  class="btn btn-primary"  style="color: black">Detail</a>
                
        </td>
        </tbody>
    @endforeach
</table>
@endsection