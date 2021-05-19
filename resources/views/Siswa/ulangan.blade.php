@extends('layout.app')
@section('title', 'Ulangan Siswa')
    
<script src="{{ asset('temp/js/jam.js') }}"></script>

<body class="hold-transition sidebar-mini" onload="realtimeClock()">
@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <br><br>
    <table id = "table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Ulangan</th>
                {{-- <th>Jurusan</th>
                <th>Mapel</th> --}}
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @php $no=1; @endphp
        @foreach ($ulangan as $ul)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ul->judul_ulangan }}</td>
            {{-- <td>{{ $ul->jurusan->nama_jurusan }}</td>
            <td>{{ $ul->mapel->nama_mapel }}</td> --}}
            <td>{{ $ul->waktu_mulai }}</td>
            <td>{{ $ul->waktu_selesai }}</td>
            <td>
                {{--<p><input type="time" name="waktu" min="07:00" max="11:30" required></p> --}}
                <button type ="datetime-local" class="btn btn-info" min="{{$ul->waktu_mulai}}" max="{{ $ul->waktu_selesai }}" href="/Siswa/ulangan_soal/kerjakan/{{ $ul->id }}" required>Kerjakan</button>
                {{--<a class="btn btn-info" href="/Siswa/ulangan_soal/kerjakan/{{ $ul->id }}">Kerjakan</a>--}}
                {{-- @if ($ul->nilai == null)
                    <a class="btn btn-info" href="/Siswa/ulangan_soal/kerjakan/{{ $ul->id }}">Kerjakan</a>
                @else
                    <a class="btn btn-info disabled" href="/Siswa/ulangan_soal/kerjakan/{{ $ul->id }}">Kerjakan</a>
                @endif  --}}
            </td>
        </tr>
        @endforeach
    </table>
@endsection