<?php

namespace App\Http\Controllers;

use App\Models\Rusak;
use App\Models\Aset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RusakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rusak.index',[
            'rusak'=>Rusak::all(),
            'aset'=>Aset::all(),
            'user'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aset=DB::table('Aset')->where('Stok','>','0')->get();
        return view('rusak.create',[
            'aset'=>$aset,

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
            'Kerusakan'=>'required|max:255',
            'Penanggung_jawab'=>'required|max:255',
            'Jumlah'=>'required|integer|min:0|max:'.$aset->Stok
        ]);
        $aset->Stok-=$request->Jumlah;
        $aset->save();
        Rusak::create($request->all());
        return redirect()->route('rusak.index')->with('success','Kerusakan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rusak $rusak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rusak $rusak)
    {
        $edit = Rusak::find($rusak->Rusak_id);
        return view ('rusak.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rusak $rusak)
    {
        $aset=Aset::find(str_pad($rusak->Aset_id, 11, '0', STR_PAD_LEFT));
        $jmlh_awal=$aset->Stok+$rusak->Jumlah;
        $request->validate([
            'Jumlah'=>'required|integer|min:0|max:'.$jmlh_awal,
            'Kerusakan'=>'required|max:255',
            'Penanggung_jawab'=>'required|max:255',
        ]);
        $aset->Stok=$jmlh_awal-$request->Jumlah;
        $aset->save();
        $rusak->Jumlah=$request->Jumlah;
        $rusak->Kerusakan=$request->Kerusakan;
        $rusak->Penanggung_jawab=$request->Penanggung_jawab;
        $rusak->save();
        return redirect()->route('rusak.index')->with('success','Kerusakan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rusak $rusak)
    {
        $aset=Aset::find(str_pad($rusak->Aset_id, 11, '0', STR_PAD_LEFT));
        $aset->Stok+=$rusak->Jumlah;
        $aset->save();
        $rusak->delete();
        return redirect()->route('rusak.index')->with('success','Kerusakan berhasil dihapus'.$aset->Stok);

    }
}
