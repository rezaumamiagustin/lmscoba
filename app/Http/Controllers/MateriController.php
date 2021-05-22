<?php

namespace App\Http\Controllers;

use App\Models\DetailMapel;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use PhpOffice\PhpWord\TemplateProcessor;

class MateriController extends Controller
{
    
    public function index()
    {
        $mapel = Mapel::with('mapel_kelas')->latest()->paginate(100);
        return view('Guru/mapel', compact('mapel'));
    }

    public function create()
    {
        $map_kelas = Tingkat::all();
        return view('Guru/mapel_tambah', compact('map_kelas'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'nama_mapel' => 'required'
        ]);
        Mapel::create([
            'id_kelas' => $request->id_kelas,
            'nama_mapel' => $request->nama_mapel
        ]);

        return redirect('/Guru/mapel')->with('status', 'Data Mata Pelajaran Berhasil di tambah');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $map_kelas = Tingkat::all();
        $mapel = Mapel::with('mapel_kelas')->findorfail($id);
        return view('Guru/mapel_edit', compact('map_kelas','mapel'));
    }

    
    public function update(Request $request, Mapel $mapel)
    {
        $this->validate($request, [
            'nama_mapel' => 'required'
        ]);
        Mapel::where('id', $mapel->id)
            ->update([
                'id_kelas' => $request->id_kelas,
                'nama_mapel' => $request->nama_mapel
            ]);

        return redirect('/Guru/mapel')->with('status', 'Data Mapel berhasil di edit');
    }

    
    public function destroy($id)
    {
        $data = Mapel::where('id', $id);
        Mapel::where('id', $id)->delete();
        return redirect('/Guru/mapel')->with('status', 'Data Mapel berhasil di Hapus !! ');
    }

    // ketika mengklik halaman input materi
    // public function map_materi($id_detMapel)
    // {
    //     $dm = DB::table('materis')
    //                 ->where('id_detMapel',$id_detMapel)->get();
    //     $mapel = Mapel::all();
    //     $soal = Soal::with('ulangan')->paginate(100);
    //     return view('Guru/materi', compact('soal','ulangan','ul'));
    // }

    // untuk kehalaman materi
    public function materi($id_detMapel)
    {
        $mat = DB::table('materis')
                    ->where('id_detMapel',$id_detMapel)->get();
        $materi = Materi::all();
        $mapel = Mapel::with('mapel_kelas')->paginate(100);
        return view('Guru/materi', compact('mat','materi','mapel'));
    }

    // ===================== MATERI ========================
    public function indexMat()
    {
        $materi = Materi::with('materi_detMap')->latest()->paginate(100);
        return view('Guru/materi', compact('materi'));
    }

    
    public function createMat()
    {
        // $detMap = DetailMapel::all();
        $detMap = DetailMapel::with('detmap_mapel','detmap_guru')->get();
        return view('Guru/materi_tambah', compact('detMap'));
    }

    
    public function storeMat(Request $request)
    {
        // 'id_detMapel','nama_materi','desc_materi','file_materi','link_materi'
        if($request->file('file_materi'))
        {
            $ut = $request->file('file_materi');  
            // $namafile=time().rand(100,999).".".$ut->getClientOriginalExtension();
            $namafile=time() . "_" . $ut->getClientOriginalName(); 
            $dtUpload = new Materi();
            $dtUpload->id_detMapel = $request->id_detMapel;
            $dtUpload->nama_materi = $request->nama_materi;
            $dtUpload->desc_materi = $request->desc_materi;
            $dtUpload->file_materi = $namafile;

            $ut->move(public_path('storage/fileMateri'), $namafile);
            $dtUpload->save();
            return redirect('/Guru/materi')->with('status', 'Materi sudah terupload');
        }
        else {
           $this->validate($request, [
               'id_detMapel'=> 'required',
               'nama_materi' => 'required',
               'desc_materi' => 'required',
               'link_materi' => 'required'
           ]);
           Materi::create([
               'id_detMapel' => $request->id_detMapel,
               'nama_materi' => $request->nama_materi,
               'desc_materi' => $request->desc_materi,
               'link_materi' => $request->link_materi
           ]);
           return redirect('/Guru/materi')->with('status', 'Materi sudah terupload');
        }
    }

    public function showMat($id)
    {
        $materi = Materi::find($id);
        return view('Guru/materi_detail', compact('materi'));
    }

    public function editMat($id)
    {
        $detMap = DetailMapel::all();
        $materi = Materi::with('materi_detMap')->findorfail($id);
        return view('Guru/materi_edit', compact('detMap','materi'));
    }

    
    public function updateMat(Request $request, Materi $materi)
    {
        $gambar_name = '';
        $gambar = $request->file('file_materi');

        if ($gambar != '') {
            $request->validate([
                'nama_materi' => 'required',
                'desc_materi' => 'required',
                'file_materi' => 'required'
            ]);
            if ($gambar == true) {
                unlink('storage/fileMateri/' . $materi->file_materi);
            }
            $gambar_name = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('storage/fileMateri/'), $gambar_name);
        } else {
            $request->validate([
                'nama_materi' => 'required',
                'desc_materi' => 'required',
                'link_materi' => 'required'
            ]);
        }
        Materi::where('id', $materi->id)
            ->update([
                'id_detMapel' => $request->id_detMapel,
               'nama_materi' => $request->nama_materi,
               'desc_materi' => $request->desc_materi,
               'file_materi' => $gambar_name,
               'link_materi' => $request->link_materi
            ]);
        return redirect('/Guru/materi')->with('status', 'Materi sudah terupdate');
        
    }

    public function destroyMat(Materi $materi)
    {
        $materi = Materi::where('id', $materi->id)->first();
        unlink('storage/fileMateri/' . $materi->file_materi);

        Materi::destroy($materi->id);
        return redirect('/Guru/materi')->with('status', 'Data Materi berhasil di Hapus !! ');
    }

    public function pdfStream($id)
    {
        $materi = Materi::findOrFail($id);
        $temp = new TemplateProcessor('storage/fileMateri/'. $materi->file_materi);
        $filename=$materi->file_materi;
        $temp->saveAs($filename . '.docx');
        return response()->download($filename . '.docx')->deleteFileAfterSend(true);
    }
    
    public function download($id)
    {
        $materi = Materi::findOrFail($id);
        $fm = $materi->file_materi;
        return response()->download(public_path('storage/fileMateri/' . $fm));
    }

    
    // ===================== MAPEL MATERI SISWA========================

    public function MapSiswa()
    {
        $mapel = Mapel::with('mapel_kelas')->latest()->paginate(100);
        return view('Siswa/mapel', compact('mapel'));
    }

    // untuk kehalaman materi
    public function materiSis($id_detMapel)
    {
        $mat = DB::table('materis')
                    ->where('id_detMapel',$id_detMapel)->get();
        $materi = Materi::all();
        $mapel = Mapel::with('mapel_kelas')->paginate(100);
        return view('Siswa/materi', compact('mat','materi','mapel'));
    }

    public function matSiswa()
    {
        $materi = Materi::with('materi_detMap')->latest()->paginate(100);
        return view('Siswa/materi', compact('materi'));
    }

}
