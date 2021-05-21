<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = ['nama_kelas'];

    public function kelas_ulangan()
    {
        return $this->hasMany(Ulangan::class, 'id_ulangan');
    }

    public function kelas_mapel()
    {
        return $this->hasMany(Mapel::class, 'id_mapel');
    }
}
