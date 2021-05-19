@extends('layout.app')
@section('title', 'Ulangan Guru')
    
@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
        @endif
    </div>
    <div class="float-right my-2">
        <a class="btn btn-success" href="/Guru/ulangan/create">Tambah Ulangan</a>
    </div>
    <br>
    <br><br>
    <table id = "table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Mapel</th>
                <th>Judul Ulangan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        @php $no=1; @endphp
        @foreach ($ulangan as $ul)
         <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ul->kelas->nama_kelas}}</td>
            <td>{{ $ul->mapel->nama_mapel }}</td>
            <td>{{ $ul->judul_ulangan }}</td>
            <td>{{ $ul->waktu_mulai }}</td>
            <td>{{ $ul->waktu_selesai }}</td>
            <td>
                <a class="btn btn-info" href="/Guru/ulangan/soal/{{ $ul->id }}">Input Soal</a>
                <a class="btn btn-primary" href="/Guru/ulangan/edit/{{ $ul->id }}">Edit</a>
                <form action="/Guru/ulangan/{{ $ul->id }}" method="post"
                    class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onClick= "return confirm('Yakin Hapus Data ?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection