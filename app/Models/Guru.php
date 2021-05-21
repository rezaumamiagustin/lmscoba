<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = "gurus";
    protected $fillable = ['nama_guru'];

    public function guru_detmap()
    {
        return $this->hasMany(DetailMapel::class, 'id_detMapel');
    }
}
