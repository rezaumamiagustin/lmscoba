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
}
