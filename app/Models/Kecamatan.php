<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = "kecamatan";
    protected $fillable = [
        'kode_kec',
        'nama_kecamatan',
        'active_kec',
    ];
    //relation kelurahan-kecamatan
    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
     //relation pegawai-kelurahan
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
