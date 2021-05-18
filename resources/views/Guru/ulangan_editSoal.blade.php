@extends('layout.app')
@section('title', 'Ulangan Guru')
    
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>TAMBAH DATA ULANGAN</strong>
            </div>
            <div class="card-body">
                <a href="/Guru/ulangan_soal" class="btn btn-primary">Kembali</a>
                <br>

                <form method="post" action="/Guru/ulangan_soal/{{ $soal->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Ulangan</label>
                        <br>
                        <select name="id_ulangan" id="id_ulangan">
                            <option disabled value>Pilihan Tingkat </option>
                            @foreach ($ulangan as $ul)
                                <option value="{{ $ul->id }}">{{ $ul->judul_ulangan}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Soal</label>
                            <textarea id="soal" name="soal"  class="form-control @error('soal') is-invalid @enderror "
                            value="{{ old('soal', $soal->soal) }}"></textarea>

                        @if($errors->has('soal'))
                        <div class="text-danger">
                            {{ $errors->first('soal')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror "
                            value="{{ old('foto') }}">

                        @if($errors->has('foto'))
                        <div class="text-danger">
                            {{ $errors->first('foto')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <img src="{{ asset('temp/soal/'. $soal->foto) }}" height="50%" width="100%">
                        @if($errors->has('foto'))
                        <div class="text-danger">
                            {{ $errors->first('foto')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Pilihan A</label>
                        <input id="pilA" name="pilA"  class="form-control @error('pilA') is-invalid @enderror "
                            value="{{ old('pilA', $soal->pilA) }}">

                        @if($errors->has('pilA'))
                        <div class="text-danger">
                            {{ $errors->first('pilA')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan B</label>
                        <input id="pilB" name="pilB"  class="form-control @error('pilB') is-invalid @enderror "
                            value="{{ old('pilB', $soal->pilB) }}">

                        @if($errors->has('pilB'))
                        <div class="text-danger">
                            {{ $errors->first('pilB')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan C</label>
                        <input id="pilC" name="pilC"  class="form-control @error('pilC') is-invalid @enderror "
                            value="{{ old('pilC', $soal->pilC) }}">

                        @if($errors->has('pilC'))
                        <div class="text-danger">
                            {{ $errors->first('pilC')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan D</label>
                        <input id="pilD" name="pilD"  class="form-control @error('pilD') is-invalid @enderror "
                            value="{{ old('pilD', $soal->pilD) }}">

                        @if($errors->has('pilD'))
                        <div class="text-danger">
                            {{ $errors->first('pilD')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Pilihan E</label>
                        <input id="pilE" name="pilE"  class="form-control @error('pilE') is-invalid @enderror "
                            value="{{ old('pilE', $soal->pilE) }}">

                        @if($errors->has('pilE'))
                        <div class="text-danger">
                            {{ $errors->first('pilE')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Kunci Jawaban</label>
                        <br>
                        <select name="kunci_jawaban" id="kunci_jawaban">
                            <option value="pilA" selected="selected">Pilihan A</option>
                            <option value="pilB" selected="selected">Pilihan B</option>
                            <option value="pilC" selected="selected">Pilihan C</option>
                            <option value="pilD" selected="selected">Pilihan D</option>
                            <option value="pilE" selected="selected">Pilihan E</option>
                        </select>
                        {{-- <input id="kunci_jawaban" name="kunci_jawaban"  class="form-control @error('kunci_jawaban') is-invalid @enderror "
                            value="{{ old('kunci_jawaban') }}"> --}}

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


