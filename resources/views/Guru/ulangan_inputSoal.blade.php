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

                <form method="post" action="#">

                    @csrf

                    <div class="form-group">
                        <label>Nama</label>
                        <input id="judul_ulangan" name="judul_ulangan" class="form-control @error('judul_ulangan') is-invalid @enderror "
                            value="{{ old('judul_ulangan') }}">

                        @if($errors->has('judul_ulangan'))
                        <div class="text-danger">
                            {{ $errors->first('judul_ulangan')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Soal</label>
                        <input id="summernote" name="soal"  class="form-control @error('soal') is-invalid @enderror "
                            value="{{ old('soal') }}">

                        @if($errors->has('soal'))
                        <div class="text-danger">
                            {{ $errors->first('soal')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan A</label>
                        <input id="pilA" name="pilA"  class="form-control @error('pilA') is-invalid @enderror "
                            value="{{ old('pilA') }}">

                        @if($errors->has('pilA'))
                        <div class="text-danger">
                            {{ $errors->first('pilA')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan B</label>
                        <input id="pilB" name="pilB"  class="form-control @error('pilB') is-invalid @enderror "
                            value="{{ old('pilB') }}">

                        @if($errors->has('pilB'))
                        <div class="text-danger">
                            {{ $errors->first('pilB')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan C</label>
                        <input id="pilC" name="pilC"  class="form-control @error('pilC') is-invalid @enderror "
                            value="{{ old('pilC') }}">

                        @if($errors->has('pilC'))
                        <div class="text-danger">
                            {{ $errors->first('pilC')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan D</label>
                        <input id="pilD" name="pilD"  class="form-control @error('pilD') is-invalid @enderror "
                            value="{{ old('pilD') }}">

                        @if($errors->has('pilD'))
                        <div class="text-danger">
                            {{ $errors->first('pilD')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan E</label>
                        <input id="pilE" name="pilE"  class="form-control @error('pilE') is-invalid @enderror "
                            value="{{ old('pilE') }}">

                        @if($errors->has('pilE'))
                        <div class="text-danger">
                            {{ $errors->first('pilE')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Kunci Jawaban</label>
                        <input id="kunci_jawaban" name="kunci_jawaban"  class="form-control @error('kunci_jawaban') is-invalid @enderror "
                            value="{{ old('kunci_jawaban') }}">

                        @if($errors->has('kunci_jawaban'))
                        <div class="text-danger">
                            {{ $errors->first('kunci_jawaban')}}
                        </div>
                        @endif

                    </div>

                    <button type="submit" class="btn btn-primary" onClick= "return confirm('Yakin Data Akan Disimpan ?')" >Simpan</button>

                </form>

            </div>
        </div>
    </div>
@endsection