@extends('layout.app')
@section('title', 'Ulangan Siswa')
    
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <strong>Kerjakan Ulangan</strong>
            </div>
            <div class="card-body">
                <a href="/Siswa/ulangan" class="btn btn-primary" onClick= "return confirm('Yakin Akan Kembali ke Halaman Utama ?')">Kembali</a>
                <br>
                <form method="post" action="{{ route('kerjakanSoal') }} ">
                    @csrf
                    <div class="form-group">
                        <label>Siswa</label>
                        <br>
                        <select name="id_siswa" id="id_siswa">
                            <option disabled value>Pilihan Siswa </option>
                            @foreach ($siswa as $sis)
                                <option value="{{ $sis->id }}">{{ $sis->nama_siswa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ulangan</label>
                        <br>
                        <select name="id_ulangan" id="id_ulangan">
                            <option disabled value>Pilihan Ulangan </option>
                            @foreach ($ulg as $ul)
                                <option value="{{ $ul->id }}">{{ $ul->judul_ulangan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Soal</label>
                        @foreach ($soal as $so)
                        <input type="hidden" name="id[]" value="{{$so->id}}">
                        <input type="hidden" name="jumlah" value="{{$so->count()}}">
                        {{-- @php $no=1; @endphp --}}
                            <div class="form-group">
                                <h5> {!! $so->soal !!}</h5>
                                <p>A.   <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilA' /> {{ $so->pilA }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p>B.   <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilB' /> {{ $so->pilB }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p>C.   <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilC' /> {{ $so->pilC }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p>D.   <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilD' /> {{ $so->pilD }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p>E.   <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilE' /> {{ $so->pilE }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary" onClick= "return confirm('Apakah Anda Sudah Yakin dengan Jawabannya ?')" >Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection