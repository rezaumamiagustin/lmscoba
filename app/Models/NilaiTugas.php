<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTugas extends Model
{
    use HasFactory;
    protected $table = "nilai_tugas";
    protected $fillable = ['id_tugas','id_siswa','file','tautan','waktu_pengumpulan'];
}
