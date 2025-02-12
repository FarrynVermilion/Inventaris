<?php

namespace App\Http\Controllers;

use App\Models\Penggunaan;
use App\Models\Aset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penggunaan.index',[
            'aset'=>Aset::all(),
            'penggunaan'=>Penggunaan::all(),
            'user'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aset=DB::table('Aset')->where('Stok','>','0')->get();
        return view('penggunaan.create',[
            'aset'=>$aset
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aset=Aset::find(str_pad($request->Aset_id, 11, '0', STR_PAD_LEFT));
        $request->validate([
            'Aset_id'=>'required',
            'Untuk'=>'required|max:255',
            'Jumlah'=>'required|integer|min:0|max:'.$aset->Stok
        ]);
        $aset->Stok-=$request->Jumlah;
        $aset->save();
        Penggunaan::create($request->all());
        return redirect()->route('penggunaan.index')->with('success','Penggunaan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penggunaan $penggunaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penggunaan $penggunaan)
    {
        $edit = Penggunaan::find($penggunaan->Penggunaan_id);
        return view ('penggunaan.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penggunaan $penggunaan)
    {
        $aset=Aset::find(str_pad($penggunaan->Aset_id, 11, '0', STR_PAD_LEFT));
        $jmlh_awal=$aset->Stok+$penggunaan->Jumlah;
        $request->validate([
            'Jumlah'=>'required|integer|min:0|max:'.$jmlh_awal,
            'Untuk'=>'required|max:255'
        ]);
        $aset->Stok=$jmlh_awal-$request->Jumlah;
        $aset->save();
        $penggunaan->Jumlah=$request->Jumlah;
        $penggunaan->Untuk=$request->Untuk;
        $penggunaan->save();
        return redirect()->route('penggunaan.index')->with('success','Penggunaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penggunaan $penggunaan)
    {
        $aset=Aset::find(str_pad($penggunaan->Aset_id, 11, '0', STR_PAD_LEFT));
        $aset->Stok+=$penggunaan->Jumlah;
        $aset->save();
        $penggunaan->delete();
        return redirect()->route('penggunaan.index')->with('success','Penggunaan berhasil dihapus'.$aset->Stok);
    }
}
