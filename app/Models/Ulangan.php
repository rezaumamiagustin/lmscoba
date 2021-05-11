<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulangan extends Model
{
    use HasFactory;
    protected $table = "ulangans";
    
    protected $fillable = ['id_tingkat','id_jurusan','id_mapel','judul_ulangan',
     'waktu_mulai', 'waktu_selesai'];

    public function tingkat()
    {
    return $this->belongsTo(Tingkat::class, 'id_tingkat');
    }

    public function jurusan()
    {
    return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function mapel()
    {
    return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function soal_ulangan()
    {
        return $this->hasMany(Ulangan::class, 'id_ulangan');
    }

    public function nilai_ulangan()
    {
        return $this->hasMany(Ulangan::class, 'id_ulangan');
    }
}
