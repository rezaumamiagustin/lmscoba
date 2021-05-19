<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mapel;
use App\Models\NilaiUlangan;
use App\Models\Siswa;
use App\Models\Tingkat;
use App\Models\Ulangan;
use App\Models\Soal;
use Illuminate\Http\Request;
use Path\To\DOMDocument;
use DateTime;
use DateTimeZone;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class UlanganController extends Controller
{
    
    public function index()
    {
        $ulangan = Ulangan::with('kelas','mapel')->latest()->paginate(100);
        return view('Guru/ulangan', compact('ulangan'));
    }

    public function create()
    {
        $kelas = Tingkat::all();
        $mapel = Mapel::all();
        return view('Guru/ulangan_tambah', compact('kelas','mapel'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'judul_ulangan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);
        Ulangan::create([
            'id_kelas' => $request->id_kelas,
            'id_mapel' => $request->id_mapel,
            'judul_ulangan' => $request->judul_ulangan,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai
        ]);

        return redirect('/Guru/ulangan')->with('status', 'Data Ulangan Berhasil di tambah');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kelas = Tingkat::all();
        $mapel = Mapel::all();
        $ulangan = Ulangan::with('kelas','mapel')->findorfail($id);
        return view('Guru/ulangan_edit', compact('kelas','mapel','ulangan'));
        // return view('Guru/ulangan_edit', ['ulangan' => $ulangan]);
    }

    public function update(Request $request, Ulangan $ulangan)
    {
        $this->validate($request, [
            'judul_ulangan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);
        Ulangan::where('id', $ulangan->id)
            ->update([
                'id_kelas' => $request->id_kelas,
                'id_mapel' => $request->id_mapel,
                'judul_ulangan' => $request->judul_ulangan,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai
            ]);

        return redirect('/Guru/ulangan')->with('status', 'Data Ulangan berhasil di edit');
    }

    public function destroy($id)
    {
        $data = Ulangan::where('id', $id);
        Ulangan::where('id', $id)->delete();
        return redirect('/Guru/ulangan')->with('status', 'Data Ulangan berhasil di Hapus !! ');
    }

    // SOAL halaman data data soal
    public function soal($id_ulangan)
    {
        $ul = DB::table('soals')
                    ->where('id_ulangan',$id_ulangan)->get();
        $ulangan = Ulangan::all();
        $soal = Soal::with('ulangan')->paginate(100);
        return view('Guru/ulangan_soal', compact('soal','ulangan','ul'));
    }
    public function soall()
    {
        $ul=Soal::with('ulangan')->paginate(100);
        $ulangan = Ulangan::all();
        $soal = Soal::with('ulangan')->paginate(100);
        return view('Guru/ulangan_soal', compact('soal','ulangan','ul'));
    }

    public function inputSoal()
    {
        $ulangan = Ulangan::all();
        $soal= Soal::all();
        return view('Guru/ulangan_inputSoal', compact('ulangan','soal'));
    }

    public function buatSoal(Request $request){

        if($request->foto){
             $ut = $request->foto;  
             $namafile=time().rand(100,999).".".$ut->getClientOriginalExtension(); 
             $dtUpload = new Soal;
             $dtUpload->id_ulangan = $request->id_ulangan;
             $dtUpload->foto = $namafile;
             $dtUpload->soal = $request->soal;
             $dtUpload->pilA = $request->pilA;
             $dtUpload->pilB = $request->pilB;
             $dtUpload->pilC = $request->pilC;
             $dtUpload->pilD = $request->pilD;
             $dtUpload->pilE = $request->pilE;
             $dtUpload->kunci_jawaban = $request->kunci_jawaban;

             $ut->move(public_path().'/temp/soal', $namafile);
             $dtUpload->save();

             return redirect('/Guru/ulangan_soal')->with('status', 'Soal sudah terupload');
        }
         else {
            $this->validate($request, [
                'id_ulangan'=> 'required',
                'soal' => 'required',
                'pilA' => 'required',
                'pilB' => 'required',
                'pilC' => 'required',
                'pilD' => 'required',
                'pilE' => 'required',
                'kunci_jawaban' => 'required'
            ]);
            Soal::create([
                'id_ulangan' => $request->id_ulangan,
                'soal' => $request->soal,
                'pilA' => $request->pilA,
                'pilB' => $request->pilB,
                'pilC' => $request->pilC,
                'pilD' => $request->pilD,
                'pilE' => $request->pilE,
                'kunci_jawaban' => $request->kunci_jawaban
            ]);
            return redirect('/Guru/ulangan_soal')->with('status', 'Soal sudah terupload');  
        }

        // $storage="temp/storage/soal";
        // $dom=new \DOMDocument();
        // libxml_use_internal_errors(true);
        // $dom->loadHTML($request->soal,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        // libxml_clear_errors();
        // $images=$dom->getElementsByTagName('img');
        // foreach($images as $img){
        //     $src=$img->getAttribute('src');
        //     if(preg_match('/data:image/', $src)){
        //         preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
        //         $mimetype=$groups['mime'];
        //         $fileNameContent=uniqid();
        //         $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
        //         $filepath=("$storage/$fileNameContentRand.$mimetype");
        //         $image=Image::make($src)
        //             ->resize(1200,1200)
        //             ->encode($mimetype,100)
        //             ->save(public_path($filepath));
        //         $new_src=asset($filepath);
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src', $new_src);
        //         $img->setAttribute('class','img-responsive');
        //     }
        // }
        // Soal::create([
        //     'id_ulangan' => $request->id_ulangan,
        //     // 'soal' => $request->soal,
        //     'soal' => $dom->saveHTML(),
        //     'pilA' => $request->pilA,
        //     'pilB' => $request->pilB,
        //     'pilC' => $request->pilC,
        //     'pilD' => $request->pilD,
        //     'pilE' => $request->pilE,
        //     'kunci_jawaban' => $request->kunci_jawaban
        // ]);
        
       
    }

    public function editSoal($id){
        $ulangan = Ulangan::all();
        $soal= Soal::with('ulangan')->findorfail($id);
        return view('Guru/ulangan_editSoal', compact('ulangan','soal'));
    }

    public function updateSoal(Request $request, $id){
        $ubah = Soal::findorfail($id);
        $awal = $ubah->foto;
        // if($request->foto){
        $ut =[
            'id_ulangan' => $request['id_ulangan'],
            'foto' => $awal,
            'soal' => $request['soal'],
            'pilA' => $request['pilA'],
            'pilB' => $request['pilB'],
            'pilC' => $request['pilC'],
            'pilD'=>$request['pilD'],
            'pilE'=> $request['pilE'],
            'kunci_jawaban' => $request['kunci_jawaban']  
        ];
        if($request->foto){
            $request->foto->move(public_path().'/temp/soal', $awal);
            $ubah->update($ut);
            return redirect('/Guru/ulangan_soal')->with('status', 'Soal sudah terupdate');
        }
        else{
            $ubah->update($ut);
            return redirect('/Guru/ulangan_soal')->with('status', 'Soal sudah terupdate');
        }

        // }
        // else{
        //     $this->validate($request, [
        //         'soal' => 'required',
        //         'pilA' => 'required',
        //         'pilB' => 'required',
        //         'pilC' => 'required',
        //         'pilD' => 'required',
        //         'pilE' => 'required',
        //         'kunci_jawaban' => 'required'
        //     ]);
        //     Soal::where('id', $soal->id)
        //     ->update([
        //         'id_ulangan' => $request->id_ulangan,
        //     // 'soal' => $request->soal,
        //     'soal' => $request->soal,
        //     'pilA' => $request->pilA,
        //     'pilB' => $request->pilB,
        //     'pilC' => $request->pilC,
        //     'pilD' => $request->pilD,
        //     'pilE' => $request->pilE,
        //     'kunci_jawaban' => $request->kunci_jawaban
        //     ]);

        //     return redirect('/Guru/ulangan_soal')->with('status', 'Data Soal berhasil di edit');
        // }
        // $this->validate($request, [
        //     'soal' => 'required',
        //     'pilA' => 'required',
        //     'pilB' => 'required',
        //     'pilC' => 'required',
        //     'pilD' => 'required',
        //     'pilE' => 'required',
        //     'kunci_jawaban' => 'required'
        // ]);
        
        // $storage="temp/storage/soal";
        // $dom=new \DOMDocument();
        // libxml_use_internal_errors(true);
        // $dom->loadHTML($request->soal,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        // libxml_clear_errors();
        // $images=$dom->getElementsByTagName('img');
        // foreach($images as $img){
        //     $src=$img->getAttribute('src');
        //     if(preg_match('/data:image/', $src)){
        //         preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
        //         $mimetype=$groups['mime'];
        //         $fileNameContent=uniqid();
        //         $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
        //         $filepath=("$storage/$fileNameContentRand.$mimetype");
        //         $image=Image::make($src)
        //             ->resize(1200,1200)
        //             ->encode($mimetype,100)
        //             ->save(public_path($filepath));
        //         $new_src=asset($filepath);
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src', $new_src);
        //         $img->setAttribute('class','img-responsive');
        //     }
        // }
        // // Soal::where('id', $soal->id)
        // //     ->update([
        // //         'id_ulangan' => $request->id_ulangan,
        // //     // 'soal' => $request->soal,
        // //     'soal' => $dom->saveHTML(),
        // //     'pilA' => $request->pilA,
        // //     'pilB' => $request->pilB,
        // //     'pilC' => $request->pilC,
        // //     'pilD' => $request->pilD,
        // //     'pilE' => $request->pilE,
        // //     'kunci_jawaban' => $request->kunci_jawaban
        // //     ]);

        // return redirect('/Guru/ulangan_soal')->with('status', 'Data Soal berhasil di edit');
    }

    public function hapusSoal($id)
    {
        $data = Soal::where('id', $id);
        Soal::where('id', $id)->delete();
        return redirect('/Guru/ulangan_soal')->with('status', 'Data Ulangan berhasil di Hapus !! ');
    }

    // Untuk Siswa
    
    public function ulSiswa(){

        $id_siswa=1;
        $join = DB::select('select u.id, u.judul_ulangan, u.waktu_mulai, u.waktu_selesai, nu.nilai
        from ulangans as u 
        join nilai_ulangans as nu on u.id= nu.id_ulangan'
        );
        $nu = NilaiUlangan::all();
        $soal= Soal::with('ulangan')->latest()->paginate(100);
        $ulangan = Ulangan::with('kelas','mapel')->latest()->paginate(100);
        return view('Siswa/ulangan', compact('ulangan','soal','nu','join'));
    }

    public function kerjakan($id_ulangan){
        $sl = DB::table('soals')
                    ->where('id_ulangan',$id_ulangan)->get();
        $nilaiul=NilaiUlangan::all();
        $siswa=Siswa::all();
        $ulg = Ulangan::all();
        $soal = Soal::all();
        // $ulangan = Ulangan::findorfail($id);
        return view('Siswa/ulangan_soal', compact('ulg','soal','siswa','nilaiul','sl'));
    } 

    // public function kerjakann(){
    //     // $sl = DB::table('soals')
    //     //             ->where('id_ulangan',$id_ulangan)->get();
    //     $nilaiul=NilaiUlangan::all();
    //     $siswa=Siswa::all();
    //     $ulg = Ulangan::all();
    //     $soal = Soal::all();
    //     // $ulangan = Ulangan::findorfail($id);
    //     return view('Siswa/ulangan_soal', compact('ulg','soal','siswa','nilaiul'));
    // } 
    
    public function ulanganSoal(){
        // $soal = Soal::with('ulangan')->findorfail($id_ulangan);
        // $sl = DB::table('soals')
        //             ->where('id_ulangan')->get();
        $nilaiul=NilaiUlangan::all();
        $siswa=Siswa::all();
        $ulangan = Ulangan::all();
        // $soal = Soal::all();
        return view('Siswa/ulangan_soal', compact('siswa','ulangan','nilaiul','sl','soal'));
    }

    // mendapatkan nilainya
    public function kerjakanSoal(Request $request){
        $pilihan     = $request->pilihan;
        $id_s = [];
        foreach ($request->pilihan as $ids => $soals) {
            array_push ($id_s, $ids);
        }
        $jumlah      = $request->jumlah;
        // $dat='';
        $nilai = 0;
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        for ($i = 0; $i < count($id_s); $i++) {
            //id nomor soal
            $nomor = $id_s[$i];
            //jawaban dari user
                $jawaban = $pilihan[$nomor];
                //cocokan jawaban user dengan jawaban di database
                $query = DB::table('soals')
                    ->where('id', '=', $nomor)
                    ->where('kunci_jawaban', '=', $jawaban)
                    ->count();
                if ($query) {
                    //jika jawaban cocok (benar)
                    $benar++;
                } else {
                    //jika salah
                    $salah++;
                }
            
        }
        $salah += (int)$jumlah - count($id_s);
        $nilai = 100 / (int)$jumlah * (int)$benar;
        $hasil = number_format($nilai, 1);

        $dat = [
                    'id_siswa' => $request->id_siswa,
                    'id_ulangan'=> $request->id_ulangan,
                    'benar' => $benar,
                    'salah' => $salah,
                    // 'kosong' => $kosong,
                    'nilai' => $hasil
                ];
                NilaiUlangan::insert($dat);

        // dd($dat);
        
        return redirect('/Siswa/ulangan_hasil')->with('status', 'Ini hasil ulangannya!');
    }

    public function nilaiUl($id_ulangan){
        $ul = DB::table('nilai_ulangans')
                    ->where('id_ulangan',$id_ulangan)->get();
        $ulangan=Ulangan::all();
        $nilai_ulangan = NilaiUlangan::with('ulangan','siswa')->paginate(100);
        return view('Siswa/ulangan_hasil', compact('nilai_ulangan','ulangan','ul'));
    }

    public function nilaiUll(){
        $ulangan=Ulangan::all();
        $ul = NilaiUlangan::with('ulangan','siswa')->paginate(100);
        return view('Siswa/ulangan_hasil', compact('ulangan','ul'));
    }

}
