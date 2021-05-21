<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMapel extends Model
{
    use HasFactory;
    protected $table = "detail_mapels";
    protected $fillable = ['id_mapel','id_guru'];

    public function detmap_mapel()
    {
    return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function detmap_guru()
    {
    return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function detmap_materi()
    {
    return $this->hasMany(Materi::class, 'id_materi');
    }
}
