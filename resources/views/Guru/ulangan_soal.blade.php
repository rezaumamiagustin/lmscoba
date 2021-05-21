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
        <a class="btn btn-primary" href="/Guru/ulangan">Kembali</a>
    </div>
    <div class="float-right my-2">
        <a class="btn btn-success" href="/Guru/ulangan/inputSoal">Tambah Soal</a>
    </div>
    <br>
    <br><br>
        <table id = "table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    {{-- <th>Ulangan</th> --}}
                    <th>Soal</th>
                    <th>Foto</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Pilihan D</th>
                    <th>Pilihan E</th>
                    <th>Kunci Jawaban</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @php $no=1; @endphp
            @foreach ($ul as $so)
             <tr>
                <td>{{ $no++ }}</td>
                {{-- <td>{{ $so->ulangan->judul_ulangan }}</td> --}}
                {{-- kalo pake summernote : jadi {!! $so->soal !!} --}}
                <td>{!! $so->soal !!}</td>
                <td><img src="{{ asset('storage/fotoSoal/'. $so->foto) }}" height="50%" width="100%"></td>
                <td>{{ $so->pilA }}</td>
                <td>{{ $so->pilB }}</td>
                <td>{{ $so->pilC }}</td>
                <td>{{ $so->pilD }}</td>
                <td>{{ $so->pilE }}</td>
                {{-- <td><img src="{{ asset('temp/soal/'. $so->foto) }}" height="50%" width="100%"></td> --}}
                <td>{{ $so->kunci_jawaban }}</td>
                <td>
                    <a class="btn btn-primary" href="/Guru/ulangan_soal/editSoal/{{ $so->id }}">Edit</a>
                    <form action="/Guru/ulangan_soal/{{ $so->id }}" method="post"
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