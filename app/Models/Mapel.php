<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = "mapels";
    protected $fillable = ['nama_mapel'];

    public function mapel_ulangan()
    {
        return $this->hasMany(Ulangan::class, 'id_ulangan');
    }
}
