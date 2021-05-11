@extends('layout.app')
@section('title', 'Ulangan Siswa')

@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
         {{ session('status') }}
     </div>
    @endif
</div>
{{-- <div class="float-right my-2">
    <a class="btn btn-success" href="/Guru/ulangan/create">Tambah Ulangan</a>
</div> --}}
<br>
<br><br>
<table id = "table" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            {{-- <th>Nama Siswa</th> --}}
            {{-- <th>Jawaban</th> --}}
            <th>Benar</th>
            <th>Salah</th>
            <th>Nilai</th>
            {{-- <th>Waktu Selesai</th>
            <th width="280px">Aksi</th> --}}
        </tr>
    </thead>
    @php $no=1; @endphp
    @foreach ($nilai_ulangan as $nu)
    <tr>
        <td>{{ $no++ }}</td>
        {{-- <td>Nama Siswa</td> --}}
        {{-- <td>{{ $nu->jawaban }}</td> --}}
        <td>{{ $nu->benar }}</td>
        <td>{{ $nu->salah }}</td>
        
        <td>{{ $nu->nilai }}</td>
        {{-- <td>{{ $ul->waktu_selesai }}</td>
        <td>
            <a class="btn btn-info" href="/Guru/ulangan/soal/{{ $ul->id }}">Input Soal</a>
            <a class="btn btn-primary" href="/Guru/ulangan/edit/{{ $ul->id }}">Edit</a>
            <form action="/Guru/ulangan/{{ $ul->id }}" method="post"
                class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onClick= "return confirm('Yakin Hapus Data ?')">Hapus</button>
            </form>
        </td> --}}
    </tr>
    @endforeach
</table>
@endsection