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

            <form method="post" action="{{ route('storeMapelTambah') }} ">

                @csrf

                <div class="form-group">
                    <label>Kelas</label>
                    <br>
                    <select name="id_kelas" id="id_kelas">
                        <option disabled value>Pilihan Kelas </option>
                        @foreach ($map_kelas as $mk)
                            <option value="{{ $mk->id }}">{{ $mk->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Mapel</label>
                    <input id="nama_mapel" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror "
                        value="{{ old('nama_mapel') }}">

                    @if($errors->has('nama_mapel'))
                    <div class="text-danger">
                        {{ $errors->first('nama_mapel')}}
                    </div>
                    @endif

                </div>

                <button type="submit" class="btn btn-primary" onClick= "return confirm('Yakin Data Akan Disimpan ?')" >Simpan</button>

            </form>

        </div>
    </div>
</div>
@endsection