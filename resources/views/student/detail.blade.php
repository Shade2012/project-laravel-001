@extends('layout.main')
@section('container')
<div>
    
</div>
<ul style="list-style-type: none">
    <li>
    {{$student->nis_siswa}}
    </li>
    <li>
    {{$student->nama_siswa}}
    </li>
    <li>
    {{$student->tanggal_lahir}}
    </li>
    <li>
    {{$student->kelas_siswa}}
    </li>
    <li>
    {{$student->alamat_siswa}}
    </li>
</ul>

<a href="/student/all">Back</a>
@endsection