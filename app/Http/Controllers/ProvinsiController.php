<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProv = Provinsi::orderBy('kode_prov', 'asc')->get();
        return view('provinsi.provinsi', compact('dataProv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provinsi.createProvinsi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProv = [
            'kode_prov' => $request -> input ('kode_prov'),
            'nama_provinsi' => $request -> input ('nama_provinsi'),
            'active_prov' => $request -> input ('active_prov', false)
        ];
        Provinsi::create($dataProv);
        return redirect()->route('provinsi')->with('success', 'Data provinsi berhasil ditambahkan.');
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
        $dataProv = Provinsi::findorfail($id);
        return view('provinsi.editProvinsi', compact('dataProv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataProv = [
            'kode_prov' => $request -> input ('kode_prov'),
            'nama_provinsi' => $request -> input ('nama_provinsi'),
            'active_prov' => $request -> input ('active_prov', false)
        ];
        
        Provinsi::where('id', $id)->update($dataProv);
        return redirect()->route('provinsi')->with('success', 'Data provinsi berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Provinsi::where('id', $id)->delete();
        return redirect()->route('provinsi')->with('succes', 'Data provinsi berhasil dihapus.');
    }
}
