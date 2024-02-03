@extends('layout.main')
@section('container')
@if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<h1>Data Students</h1>
<a type="button" href="/student/create" class="btn btn-primary" style="color: white; margin-top: 5px; margin-right: 10px; margin-bottom: 15px;">Add New Data</a>


<table  class="table">
<thead class="table-dark">
        <th>NIS Siswa</th>
        <th>Nama Siswa</th>
        <th>Kelas Siswa</th>
        <th>Alamat Siswa</th>
        <th>Action</th>
    </thead>
      @foreach ($students as $student)
        <tbody>
            <td>{{$student->nis_siswa}}</td>
            <td>{{$student->nama_siswa}}</td>
            <td>{{$student->kelas->kelas_siswa ?? 'Tidak ada kelas' }}</td>
            <td>{{$student->alamat_siswa}}</td>
            <td>
                <a type="button" href="/student/detail/{{$student->id}}"  class="btn btn-primary"  style="color: black">Detail</a>
                <a type="button" href="/student/edit/{{$student->id}}"  class="btn btn-warning">Edit</a>
                <form action="/student/delete/{{$student->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                        <button onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" type="submit" class="btn btn-danger" style="color: black">Delete</button>
                </form>
        </td>
        </tbody>
    @endforeach
</table>
@endsection