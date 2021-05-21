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
    <div class="float-left my-2">
        <a class="btn btn-primary" href="/Guru/mapel">Kembali</a>
    </div>
    <div class="float-right my-2">
        <a class="btn btn-success" href="/Guru/materi/createMat">Tambah Materi</a>
    </div>
    <br>
    <br><br>
    <table id = "table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                {{--  'id_detMapel','nama_materi','desc_materi','file_materi','link_materi' --}}
                <th>No</th>
                <th>Nama Materi</th>
                <th>Describe Materi</th>
                <th>File Materi</th>
                <th>Link Materi</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        @php $no=1; @endphp
        @foreach ($materi as $mat)
         <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $mat->nama_materi}}</td>
            <td>{{ $mat->desc_materi }}</td>
            @php
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

                $explodeImage = explode('.', $mat->file_materi);
                $extension = end($explodeImage);
            @endphp
            @if (in_array($extension, $imageExtensions))
                <td><img src="{{ asset('storage/fileMateri/'. $mat->file_materi) }}" height="50%" width="100%"></td>
            @else
            <td> <a href="{{route('pdfStream', ['id' => $mat->id])}}" target="_blank" > {{ $mat->file_materi }} </a></td>
                {{-- <td> <a href="{{ $mat->file_materi }}" target="_blank" rel="noopeener noreferrer">{{ $mat->file_materi }}</a> </td> --}}
            @endif
            {{-- <td><img src="{{ asset('storage/fileMateri/'. $mat->file_materi) }}" height="50%" width="100%"></td> --}}
            <td><a href="{{ $mat->link_materi }}" target="_blank" rel="noopeener noreferrer">{{ $mat->link_materi }}</a></td>
            <td>
                <a class="btn btn-info" href="/Guru/materi/editMat/{{ $mat->id }}">Edit</a>
                <a class="btn btn-primary" href="/Guru/materi/showMat/{{ $mat->id }}">Detail</a>
                <form action="/Guru/materi/{{ $mat->id }}" method="post"
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