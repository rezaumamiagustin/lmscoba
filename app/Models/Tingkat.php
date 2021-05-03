<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;
    protected $table = "tingkats";
    protected $fillable = ['nama_tingkat'];

    public function tingkat_ulangan()
    {
        return $this->hasMany(Ulangan::class, 'id_ulangan');
    }
}
