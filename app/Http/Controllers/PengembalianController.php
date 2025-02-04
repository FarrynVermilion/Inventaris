<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Detil_kembali;
use App\Models\Peminjaman;
use App\Models\Detil_pinjam;
use App\Models\Aset;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengembalian.index',[
            'pengembalian'=>Pengembalian::all(),
            'detil_kembali'=>Detil_kembali::all(),
            'peminjaman'=>peminjaman::all(),
            'detil_pinjam'=>Detil_pinjam::all(),
            'aset'=>aset::all(),
            'peminjam'=>peminjam::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kembali=DB::table('Pengembalian')->pluck('Pinjam_id');
        $peminjaman=DB::table('Peminjaman')->whereNotIn('Pinjam_id',$kembali)->get();
        $dp=DB::table('Detil_pinjam')->whereNotIn('Pinjam_id',$kembali)->get();
        return view('pengembalian.create',[
            'peminjaman'=>$peminjaman,
            'detil_pinjam'=>$dp,
            'peminjam'=>peminjam::all(),
            'aset'=>aset::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dp=Detil_pinjam::find($request->Pinjam_id);
        $request->validate([
            'Pinjam_id'=>'required',
            'Tgl_kembali'=>'required|date',
            'Jml_kembali'=>'required|min:0|max:'.$dp->Belum_kembali,
            'Status_kembali'=>'required|max:255',
            'Penerima'=>'required|max:255'
        ]);
        $dp->Belum_kembali-=$request->Jml_kembali;
        $dp->save();
        $aset=Aset::find(str_pad($dp->Aset_id, 11, '0', STR_PAD_LEFT));
        $aset->Stok=$aset->Stok+$request->Jml_kembali;
        $aset->save();
        $DK=new Detil_kembali();
        $DK->Aset_id=str_pad($dp->Aset_id, 11, '0', STR_PAD_LEFT);
        $DK->Jml_kembali=$request->Jml_kembali;
        $DK->Status_kembali=$request->Status_kembali;
        $DK->Penerima=$request->Penerima;
        $DK->save();
        $pmbln= new Pengembalian();
        $pmbln->Tgl_kembali=$request->Tgl_kembali;
        $pmbln->Pinjam_id=$request->Pinjam_id;
        $pmbln->save();
        return redirect()->route('pengembalian.index')->with('success','Pengembalian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
