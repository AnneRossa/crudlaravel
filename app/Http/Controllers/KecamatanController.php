<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKec = Kecamatan::orderBy('kode_kec', 'asc')->get();
        return view('kecamatan.kecamatan', compact('dataKec'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kecamatan.createKecamatan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataKec = [
            'kode_kec' => $request -> input ('kode_kec'),
            'nama_kecamatan' => $request -> input ('nama_kecamatan'),
            'active_kec' => $request -> input ('active_kec', false)
        ];
        Kecamatan::create($dataKec);
        return redirect()->route('kecamatan')->with('success', 'Data provinsi berhasil ditambahkan.');
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
        $dataKec = Kecamatan::findorfail($id);
        return view('kecamatan.editKecamatan', compact('dataKec'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataKec = [
            'kode_kec' => $request -> input ('kode_kec'),
            'nama_kecamatan' => $request -> input ('nama_kecamatan'),
            'active_kec' => $request -> input ('active_kec', false)
        ];
        
        Kecamatan::where('id', $id)->update($dataKec);
        return redirect()->route('kecamatan')->with('success', 'Data Kecamatan berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kecamatan::where('id', $id)->delete();
        return redirect()->route('kecamatan')->with('succes', 'Data kecamatan berhasil dihapus.');
    }
}
