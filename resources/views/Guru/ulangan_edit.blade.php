@extends('layout.app')
@section('title', 'Ulangan Guru')
    
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>TAMBAH DATA ULANGAN</strong>
        </div>
        <div class="card-body">
            <a href="/Guru/ulangan" class="btn btn-primary">Kembali</a>
            <br>

            <form method="post" action="/Guru/ulangan/{{ $ulangan->id }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label>Kelas</label>
                    <br>
                    <select name="id_kelas" id="id_kelas">
                        <option disabled value>Pilihan Kelas </option>
                        <option value="{{  $ulangan->id_kelas }}">{{ $ulangan->kelas->nama_kelas }} </option>
                        @foreach ($kelas as $ting)
                            <option value="{{ $ting->id }}">{{ $ting->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Mapel</label>
                    <br>
                    <select name="id_mapel" id="id_mapel">
                        <option disabled value>Pilihan Mapel </option>
                        <option value="{{  $ulangan->id_mapel }}">{{ $ulangan->mapel->nama_mapel }} </option>
                        @foreach ($mapel as $map)
                            <option value="{{ $map->id }}">{{ $map->nama_mapel}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Nama</label>
                    <input id="judul_ulangan" name="judul_ulangan" class="form-control @error('judul_ulangan') is-invalid @enderror "
                        value="{{ old('judul_ulangan', $ulangan->judul_ulangan) }}">

                    @if($errors->has('judul_ulangan'))
                    <div class="text-danger">
                        {{ $errors->first('judul_ulangan')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Waktu Mulai</label>
                    <input id="waktu_mulai" name="waktu_mulai" type ="datetime-local" class="form-control @error('waktu_mulai') is-invalid @enderror "
                        value="{{ old('waktu_mulai', $ulangan->waktu_mulai) }}">

                    @if($errors->has('waktu_mulai'))
                    <div class="text-danger">
                        {{ $errors->first('waktu_mulai')}}
                    </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Waktu Selesai</label>
                    <input id="waktu_selesai" name="waktu_selesai" type ="datetime-local" class="form-control @error('waktu_selesai') is-invalid @enderror "
                        value="{{ old('waktu_selesai', $ulangan->waktu_selesai) }}">

                    @if($errors->has('waktu_selesai'))
                    <div class="text-danger">
                        {{ $errors->first('waktu_selesai')}}
                    </div>
                    @endif

                </div>
                <button type="submit" class="btn btn-primary" onClick= "return confirm('Yakin Data Akan Disimpan ?')" >Simpan</button>

            </form>

        </div>
    </div>
</div>
@endsection