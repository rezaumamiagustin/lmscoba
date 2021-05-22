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
    
    <br>
    <br><br>
    <table id = "table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        @php $no=1; @endphp
        @foreach ($mapel as $map)
         <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $map->mapel_kelas->nama_kelas}}</td>
            <td>{{ $map->nama_mapel }}</td>
            <td>
                <a class="btn btn-info" href="/Siswa/mapel/materi/{{ $map->id }}">Buka Materi</a>
                {{-- <a class="btn btn-primary" href="/Guru/mapel/edit/{{ $map->id }}">Edit</a>
                <form action="/Guru/mapel/{{ $map->id }}" method="post"
                    class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onClick= "return confirm('Yakin Hapus Data ?')">Hapus</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </table>
@endsection