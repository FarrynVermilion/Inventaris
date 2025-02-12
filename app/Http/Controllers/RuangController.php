<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ruang.index', [
            'Ruang' => Ruang::all(),
            'user'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'Lokasi' => 'required',
        ]);
        $val = Array(
            'Nm_ruang'=>$request->Nama,
            'Lokasi'=>$request->Lokasi
        );
        Ruang::create($val);
        return redirect()->route('ruang.index')->with('success', 'Ruang created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        $edit = Ruang::find($ruang->Ruang_id);
        return view ('ruang.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'nama' => 'required',
            'Lokasi' => 'required',
        ]);
        $val = Array(
            'Nm_ruang'=>$request->nama,
            'Lokasi'=>$request->Lokasi
        );
        $ruangan = Ruang::find($ruang->Ruang_id);
        $ruangan->update($val);
        return redirect()->route('ruang.index')->with('success', 'Ruangan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return redirect()->route('ruang.index')->with('success', 'Ruang deleted successfully');
    }
}
