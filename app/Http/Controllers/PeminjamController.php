<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peminjam.index',[
            'peminjam'=>Peminjam::all(),
            'user'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_peminjam' => 'required|max:255',
            'No_HP' => 'required|numeric',
        ]);
        Peminjam::create($request->all());
        return redirect()->route('peminjam.index')->with('success', 'Peminjam berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjam $peminjam)
    {
        return view('peminjam.show')->with('peminjam', $peminjam);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjam $peminjam)
    {
        return view('peminjam.edit')->with('edit', $peminjam);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        $request->validate([
            'Nama_peminjam' => 'required|max:255',
            'No_HP' => 'required|numeric',
        ]);
        $peminjam->update($request->all());
        return redirect()->route('peminjam.index')->with('success', 'Peminjam berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjam $peminjam)
    {
        $peminjam->delete();
        return redirect()->route('peminjam.index')->with('success', 'Peminjam berhasil dihapus');
    }
}
