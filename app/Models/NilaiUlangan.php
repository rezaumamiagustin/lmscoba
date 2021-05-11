<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUlangan extends Model
{
    use HasFactory;
    protected $table = "nilai_ulangans";
    protected $fillable = ['id_siswa','id_ulangan','jawaban','benar','salah','nilai'];

    public function siswa()
    {
    return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    
    public function ulangan()
    {
    return $this->belongsTo(Ulangan::class, 'id_ulangan');
    }
}
