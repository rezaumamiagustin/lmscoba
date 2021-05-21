@extends('layout.app')
@section('title', 'Ulangan Guru')
    
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>TAMBAH DATA MATERI</strong>
            </div>
            <div class="card-body">
                <a href="/Guru/materi" class="btn btn-primary">Kembali</a>
                <br>

                <form method="post" action="{{ route('storeMateriTambah') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Detail Mapel</label>
                        <br>
                        <select name="id_detMapel" id="id_detMapel">
                            <option disabled value>Pilihan Detail Mapel </option>
                            @foreach ($detMap as $dm)
                                <option value="{{ $dm->id }}">{{ $dm->detmap_mapel->nama_mapel}} - {{ $dm->detmap_guru->nama_guru}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- 'id_detMapel','nama_materi','desc_materi','file_materi','link_materi' --}}
                    <div class="form-group">
                        <label>Nama Materi</label>
                        <input id="nama_materi" name="nama_materi" class="form-control @error('nama_materi') is-invalid @enderror "
                            value="{{ old('nama_materi') }}">
    
                        @if($errors->has('nama_materi'))
                        <div class="text-danger">
                            {{ $errors->first('nama_materi')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Desc Materi</label>
                        <textarea id="desc_materi" name="desc_materi" class="form-control @error('desc_materi') is-invalid @enderror "
                            value="{{ old('desc_materi') }}"></textarea>
    
                        @if($errors->has('desc_materi'))
                        <div class="text-danger">
                            {{ $errors->first('desc_materi')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>File Materi</label>
                        <input id="file_materi" name="file_materi" type="file" class="form-control @error('file_materi') is-invalid @enderror "
                            value="{{ old('file_materi') }}">

                        @if($errors->has('file_materi'))
                        <div class="text-danger">
                            {{ $errors->first('file_materi')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Link Materi</label>
                        <input id="link_materi" name="link_materi" class="form-control @error('link_materi') is-invalid @enderror "
                            value="{{ old('link_materi') }}">
    
                        @if($errors->has('link_materi'))
                        <div class="text-danger">
                            {{ $errors->first('link_materi')}}
                        </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary" onClick= "return confirm('Yakin Data Akan Disimpan ?')" >Simpan</button>

                </form>

            </div>
        </div>
    </div>
@endsection
