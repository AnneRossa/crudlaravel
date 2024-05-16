<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPeg = Pegawai::with('kelurahan', 'kecamatan', 'provinsi')->paginate(100);
        return view('pegawai.pegawai', compact('dataPeg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataKel = Kelurahan::all();
        $dataKec = Kecamatan::all();
        $dataProv = Provinsi::all();
        return view('pegawai.createPegawai', compact('dataKel', 'dataKec', 'dataProv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataPeg = [
            'nama_pegawai' => $request -> input ('nama_pegawai'),
            'tempat_lahir' => $request -> input ('tempat_lahir'),
            'tgl_lahir' => $request -> input ('tgl_lahir'),
            'jenis_kelamin' => $request -> input ('jenis_kelamin'),
            'agama' => $request -> input ('agama'),
            'alamat' => $request -> input ('alamat'),
            'kelurahan_id' => $request -> input ('kelurahan_id'),
            'kecamatan_id' => $request -> input ('kecamatan_id'),
            'provinsi_id' => $request -> input ('provinsi_id'),
        ];
        Pegawai::create($dataPeg);
        return redirect()->route('pegawai')->with('success', 'Data Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataKel = Kelurahan::all();
        $dataKec = Kecamatan::all();
        $dataProv = Provinsi::all();
        $dataPeg = Pegawai::with('kelurahan', 'kecamatan', 'provinsi')->findorfail($id);
        return view('pegawai.editPegawai', compact('dataPeg','dataKel','dataKec', 'dataProv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataPeg = [
            'nama_pegawai' => $request -> input ('nama_pegawai'),
            'tempat_lahir' => $request -> input ('tempat_lahir'),
            'tgl_lahir' => $request -> input ('tgl_lahir'),
            'jenis_kelamin' => $request -> input ('jenis_kelamin'),
            'agama' => $request -> input ('agama'),
            'alamat' => $request -> input ('alamat'),
            'kelurahan_id' => $request -> input ('kelurahan_id'),
            'kecamatan_id' => $request -> input ('kecamatan_id'),
            'provinsi_id' => $request -> input ('provinsi_id'),
        ];
        
        Pegawai::where('id', $id)->update($dataPeg);
        return redirect()->route('pegawai')->with('success', 'Data Pegawai berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pegawai::where('id', $id)->delete();
        return redirect()->route('pegawai')->with('succes', 'Data Pegawai berhasil dihapus.');
    }
}
