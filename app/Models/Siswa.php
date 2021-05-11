<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswas";
    protected $fillable = ['nama_siswa'];

    public function siswa_ulangan()
    {
        return $this->hasMany(Ulangan::class, 'id_ulangan');
    }
    
}
