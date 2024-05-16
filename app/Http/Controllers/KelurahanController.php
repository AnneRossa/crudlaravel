<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKel = Kelurahan::with('kecamatan')->paginate(100);
        return view('kelurahan.kelurahan', compact('dataKel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataKec = Kecamatan::all();
        return view('kelurahan.createKelurahan', compact('dataKec'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataKel = [
            'kode_kel' => $request -> input ('kode_kel'),
            'nama_kelurahan' => $request -> input ('nama_kelurahan'),
            'kecamatan_id' => $request -> input ('kecamatan_id'),
            'active_kel' => $request -> input ('active_kel', false),
        ];
        Kelurahan::create($dataKel);
        return redirect()->route('kelurahan')->with('success', 'Data kelurahan berhasil ditambahkan.');
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
       
        $dataKec = Kecamatan::all();
        $dataKel = Kelurahan::with('kecamatan')->findorfail($id);
        return view('kelurahan.editKelurahan', compact('dataKel','dataKec'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataKel = [
            'kode_kel' => $request -> input ('kode_kel'),
            'nama_kelurahan' => $request -> input ('nama_kelurahan'),
            'kecamatan_id' => $request -> input ('kecamatan_id'),
            'active_kel' => $request -> input ('active_kel', false)
        ];
        
        Kelurahan::where('id', $id)->update($dataKel);
        return redirect()->route('kelurahan')->with('success', 'Data Kecamatan berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelurahan::where('id', $id)->delete();
        return redirect()->route('kelurahan')->with('succes', 'Data Kelurahan berhasil dihapus.');
    }
}
