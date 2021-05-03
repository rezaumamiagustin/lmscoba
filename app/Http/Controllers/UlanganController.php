<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mapel;
use App\Models\Tingkat;
use App\Models\Ulangan;
use Illuminate\Http\Request;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class UlanganController extends Controller
{
    
    public function index()
    {
        $ulangan = Ulangan::with('tingkat','mapel','jurusan')->latest()->paginate(2);
        return view('Guru/ulangan', compact('ulangan'));
    }

    public function create()
    {
        $tingkat = Tingkat::all();
        $mapel = Mapel::all();
        $jurusan = Jurusan::all();
        return view('Guru/ulangan_tambah', compact('tingkat','mapel','jurusan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_tingkat' => 'required',
            'id_mapel' => 'required',
            'id_jurusan' => 'required',
            'judul_ulangan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);
        Ulangan::create([
            'id_tingkat' => $request->id_tingkat,
            'id_mapel' => $request->id_mapel,
            'id_jurusan' => $request->id_jurusan,
            'judul_ulangan' => $request->judul_ulangan,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai
        ]);

        return redirect('/Guru/ulangan')->with('status', 'Data Ulangan Berhasil di tambah');
    }

    public function inputSoal(Ulangan $ulangan){
        return view('Guru/ulangan_inputSoal', ['ulangan' => $ulangan]);
    }

    // public function buatSoal(Request $request){
    //     $this->validate($request, [
    //         'soal' => 'required',
    //         'pilA' => 'required',
    //         'pilB' => 'required',
    //         'pilC' => 'required',
    //         'pilD' => 'required',
    //         'pilE' => 'required',
    //         'kunci_jawaban' => 'required'
    //     ]);
    //     Soal::create([
    //         'soal' => $dom->saveHTML(),
    //         'pilA' => $request->pilA,
    //         'pilB' => $request->pilB,
    //         'pilC' => $request->pilC,
    //         'pilD' => $request->pilD,
    //         'pilE' => $request->pilE,
    //         'kunci_jawaban' => $request->kunci_jawaban
    //     ]);

    //     $storage="storage/soal";
    //     $dom=new \DOMDocument();
    //     libxml_use_internal_errors(true);
    //     $dom->loadHTML($request->soal,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
    //     libxml_clear_errors();
    //     $images=$dom->getElementsByTagName('img');
    //     foreach($images as $img){
    //         $src=$img->getAttribute('src');
    //         if(preg_match('/data:image/', $src)){
    //             preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
    //             $mimetype=$groups['mime'];
    //             $fileNameContent=uniqid();
    //             $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
    //             $filepath=("$storage/$fileNameContentRand.$mimetype")
    //             $image=Image::make($src)
    //             ->resize(1200,1200)
    //             ->encode($mimetype,100)
    //             ->save(public_path($filepath));
    //             $new_src=asset($filepath);
    //             $img->removeAttribute('src');
    //             $img->setAttribute('src', $new_src);
    //             $img->setAttribute('class','img-responsive');

    //         }
    //     }

    //     return redirect('/Guru/ulangan')->with('status', 'Data Ulangan Berhasil di tambah');
    // }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tingkat = Tingkat::all();
        $mapel = Mapel::all();
        $jurusan = Jurusan::all();
        $ulangan = Ulangan::with('tingkat','mapel','jurusan')->findorfail($id);
        return view('Guru/ulangan_edit', compact('tingkat','mapel','jurusan','ulangan'));
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
                'id_tingkat' => $request->id_tingkat,
                'id_mapel' => $request->id_mapel,
                'id_jurusan' => $request->id_jurusan,
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
}
