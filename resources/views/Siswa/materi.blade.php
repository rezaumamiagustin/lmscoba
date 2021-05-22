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
                {{-- <th width="280px">Aksi</th> --}}
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
                <td><a href="{{route('download', ['id' => $mat->id])}}" target="_blank">Lihat Gambar<img src="{{ asset('storage/fileMateri/'. $mat->file_materi) }}" height="50%" width="100%"></a></td>
            @else
            <td> 
                {{-- <a href="{{route('pdfStream', ['id' => $mat->id])}}" target="_blank" > {{ $mat->file_materi }} </a> --}}
                <a href="{{route('download', ['id' => $mat->id])}}" target="_blank" > {{ $mat->file_materi }} </a>
            </td>
                {{-- <td> <a href="{{ $mat->file_materi }}" target="_blank" rel="noopeener noreferrer">{{ $mat->file_materi }}</a> </td> --}}
            @endif
            {{-- <td><img src="{{ asset('storage/fileMateri/'. $mat->file_materi) }}" height="50%" width="100%"></td> --}}
            <td><a href="{{ $mat->link_materi }}" target="_blank" rel="noopeener noreferrer">{{ $mat->link_materi }}</a></td>
            
        </tr>
        @endforeach
    </table>
@endsection