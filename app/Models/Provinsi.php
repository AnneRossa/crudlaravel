<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = "provinsi";
    protected $fillable = [
        'kode_prov',
        'nama_provinsi',
        'active_prov',
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
