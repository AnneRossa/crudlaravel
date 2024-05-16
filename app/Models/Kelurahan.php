<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = "kelurahan";
    protected $fillable = [
        'kode_kel',
        'nama_kelurahan',
        'kecamatan_id',
        'active_kel',
    ];
    //relation kelurahan-kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    //relation pegawai-kelurahan
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
