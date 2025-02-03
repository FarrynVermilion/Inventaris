<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Detil_kembali;
use App\Models\Detil_pinjam;
use App\Models\Pengembalian;
use App\Models\Peminjam;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kembali=DB::table('Pengembalian')->pluck('Pinjam_id');
        $peminjaman=DB::table('Peminjaman')->whereNotIn('Pinjam_id',$kembali)->get();

        return view('peminjaman.index', [
            'peminjaman' => $peminjaman,
            'detil_pinjam' => Detil_pinjam::all(),
            'peminjam' => Peminjam::all(),
            'aset' => Aset::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman.create',[
            'peminjam' => Peminjam::all(),
            'aset' => Aset::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aset = Aset::find(str_pad($request->Aset_id, 11, '0', STR_PAD_LEFT));
        $request->validate([
            'Aset_id'=>"required",
            'Peminjam_id'=>"required",
            'Jml_pinjam'=>'required|min:0|max:'.$aset->Stok,
            'Infaq'=>'required',
            'Tgl_pinjam'=>'required',
            'Tgl_harus_kembali'=>'required|after_or_equal:Tgl_pinjam'
        ]);
        $aset->Stok=$aset->Stok-$request->Jml_pinjam;
        $aset->save();
        $peminjaman=new Peminjaman();
        $peminjaman->Tgl_pinjam=$request->Tgl_pinjam;
        $peminjaman->Tgl_harus_kembali=$request->Tgl_harus_kembali;
        $peminjaman->Peminjam_id=$request->Peminjam_id;
        $peminjaman->save();
        $DP=new Detil_pinjam();
        $DP->Aset_id=$request->Aset_id;
        $DP->Jml_pinjam=$request->Jml_pinjam;
        $DP->Aset_id=$request->Aset_id;
        $DP->Infaq=$request->Infaq;
        $DP->save();
        return redirect()->route('peminjaman.index')->with('success','Peminjaman berhasil diambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
