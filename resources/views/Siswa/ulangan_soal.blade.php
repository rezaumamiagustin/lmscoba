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
                        <h4>Soal</h4><br>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($sl as $so)
                        
                        <input type="text"  name="id_soal[{{$so->id}}]" value="{{$so->id}}" disabled>
                        @php
                            $count++;
                        @endphp

                        {{-- @php $no=1; @endphp --}}
                            <div class="form-group">
                                <h5> {!! $so->soal !!}</h5>
                                @if($so->foto !=null)
                                <img src="{{ asset('temp/soal/'. $so->foto) }}" height="30%" width="30%">
                                @endif
                                
                                <p><input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilA' /> A.  {{ $so->pilA }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p><input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilB' /> B. {{ $so->pilB }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p> <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilC' /> C. {{ $so->pilC }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p> <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilD' /> D. {{ $so->pilD }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                                <p> <input type='radio' id="pilihan" name='pilihan[{{$so->id}}]' value='pilE' /> E. {{ $so->pilE }}
                                    @error('pilihan') <span class="text-danger">{{ $message }}</span> @enderror </p>
                            </div>
                        @endforeach
                        
                        <input type="hidden" name="jumlah" value="{{ $count}}">  
                       
                    </div>
                    <button type="submit" class="btn btn-primary" onClick= "return confirm('Apakah Anda Sudah Yakin dengan Jawabannya ?')" >Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection