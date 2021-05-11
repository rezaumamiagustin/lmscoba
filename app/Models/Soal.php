<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
// id soal
{
    use HasFactory;
    protected $table = "soals";
    protected $fillable = ['id_ulangan','soal','pilA','pilB' ,'pilC', 
    'pilD','pilE','foto','kunci_jawaban'];

    public function ulangan()
    {
    return $this->belongsTo(Ulangan::class, 'id_ulangan');
    }
}
