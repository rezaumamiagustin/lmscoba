<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = "mapels";
    protected $fillable = ['id_kelas','nama_mapel'];

    public function mapel_ulangan()
    {
        return $this->hasMany(Ulangan::class, 'id_ulangan');
    }

    public function mapel_detmap()
    {
        return $this->hasMany(DetailMapel::class, 'id_detMapel');
    }

    public function mapel_kelas()
    {
    return $this->belongsTo(Tingkat::class, 'id_kelas');
    }
}
