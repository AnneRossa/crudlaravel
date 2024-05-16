<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $fillable = [
        'nama_pegawai',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'alamat',
        'kelurahan_id',
        'kecamatan_id',
        'provinsi_id',
    ];

    //relation pegawai-kelurahan, kecamatan, provinsi
    public function kelurahan()
    {
        return $this->belongsTo(kelurahan::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
