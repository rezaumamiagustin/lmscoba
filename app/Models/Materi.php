<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = "materis";
    protected $fillable = ['id_detMapel','nama_materi','desc_materi','file_materi','link_materi'];

    public function materi_detMap()
    {
    return $this->belongsTo(DetailMapel::class, 'id_detMapel');
    }
}
