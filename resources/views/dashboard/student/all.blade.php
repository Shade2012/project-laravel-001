@extends('dashboard.layouts.main')
@section('container')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h1>Data Students</h1>
@if($isAuthenticated)
<a type="button" href="/student/create" class="btn btn-primary" style="color: white; margin-top: 5px; margin-right: 10px; margin-bottom: 15px;">Add New Data</a>
<form action="/dashboard/student/all" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search students..." value="{{ request('query') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

@endif

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
                @if($isAuthenticated)
                    <a type="button" href="/student/edit/{{$student->id}}"  class="btn btn-warning">Edit</a>
                    <form action="/student/delete/{{$student->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" type="submit" class="btn btn-danger" style="color: black">Delete</button>
                    </form>
                    
                @endif

            </td>
        </tbody>
    @endforeach

</table>
@if ($isAuthenticated)
        
<div class="d-flex justify-content-between align-items-center mt-4">
    <div>
        {{-- Previous Page Link --}}
        @if ($students->onFirstPage())
            <span>&laquo; Previous</span>
        @else
            <a href="{{ $students->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        @endif

        {{-- Next Page Link --}}
        @if ($students->hasMorePages())
            <a href="{{ $students->nextPageUrl() }}" rel="next">Next &raquo;</a>
        @else
            <span>Next &raquo;</span>
        @endif
    </div>
    <div>
        Page {{ $students->currentPage() }} of {{ $students->lastPage() }} <!-- Page information -->
    </div>
</div>

    @endif
@endsection
