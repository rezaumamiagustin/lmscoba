@extends('layout.app')
@section('title', 'Detail Materi')

@section('content')
<br>
<div class="row justify-content-center align-items-center">
    <div class="col-sm-4">
	    <div class="card text-center">
            <div class="card-header">
            Detail Materi
            </div>
            {{-- 'id_detMapel','nama_materi','desc_materi','file_materi','link_materi' --}}
            <div class="card-body">
                <h5 class="card-title"><b>Nama Materi : </b>{{$materi->nama_materi}}</h5>
                <p class="card-text"><b>Desc Materi : </b>{{$materi->desc_materi}}</p>
                @if($materi->file_materi !=null)
                    {{-- <p class="card-text"><b>File Materi : </b> <img src="{{ asset('temp/file_materi/'. $materi->file_materi) }}" height="30%" width="30%"> --}}
                        <p class="card-text"><b>File Materi : </b> 
                            <img src="{{ asset('storage/fileMateri/'. $materi->file_materi) }}" height="30%" width="30%"> 
                        <br>    <a href="">Download</a></p>
                    
                @else
                    <p class="card-text"><b>Link Materi : </b><a href="{{ $materi->link_materi }}" target="_blank" rel="noopeener noreferrer">{{ $materi->link_materi }}</a></p>
                @endif
            </div>
            <div class="card-footer text-muted">
                <a href="/Guru/materi" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection