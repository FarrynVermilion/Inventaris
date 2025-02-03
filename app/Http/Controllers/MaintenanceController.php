<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Aset;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('maintenance.index',[
            'maintenance'=> Maintenance::all(),
            'aset'=>Aset::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maintenance.create',['aset'=>Aset::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aset = Aset::find(str_pad($request->Aset_id, 11, '0', STR_PAD_LEFT));
        $request->validate([
            'Aset_id' => 'required',
            'Tgl_maintenance' => 'required',
            'Jenis_maintenance' => 'required|max:255',
            'Deskripsi' => 'required|max:255',
            'Biaya' => 'required|min:0',
            'Nm_teknisi' => 'required|max:255',
            'Jumlah'=>'required|min:0|max:'.$aset->Stok
        ]);
        $aset->Stok=$aset->Stok-$request->Jumlah;
        $aset->save();
        $maintenance = new maintenance();
        $maintenance->Jumlah = $request->Jumlah;
        $maintenance->Aset_id = $request->Aset_id;
        $maintenance->Tgl_maintenance = $request->Tgl_maintenance;
        $maintenance->Jenis_maintenance	 = $request->Jenis_maintenance	;
        $maintenance->Deskripsi = $request->Deskripsi;
        $maintenance->Biaya = $request->Biaya;
        $maintenance->Nm_teknisi = $request->Nm_teknisi;
        $maintenance->save();
        $aset = Aset::find($request->Aset_id);
        // $aset->Stok=$aset->Stok-$maintenance->jumlah;
        // $aset->save;
        return redirect()->route('maintenance.index')->with('success','Maintenance berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        return view('maintenance.edit',['edit'=>$maintenance,'aset'=>Aset::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $aset = Aset::find(str_pad($request->Aset_id, 11, '0', STR_PAD_LEFT));
        $request->validate([
            'Aset_id' => 'required',
            'Tgl_maintenance' => 'required',
            'Jenis_maintenance' => 'required|max:255',
            'Deskripsi' => 'required|max:255',
            'Biaya' => 'required|min:0',
            'Nm_teknisi' => 'required|max:255',
            'Jumlah'=>'required|min:0|max:'.$aset->Stok
        ]);
        $aset->Stok=$aset->Stok+$maintenance->Jumlah-$request->Jumlah;
        $aset->save();

        $maintenance->Jumlah = $request->Jumlah;
        $maintenance->Aset_id = $request->Aset_id;
        $maintenance->Tgl_maintenance = $request->Tgl_maintenance;
        $maintenance->Jenis_maintenance	 = $request->Jenis_maintenance	;
        $maintenance->Deskripsi = $request->Deskripsi;
        $maintenance->Biaya = $request->Biaya;
        $maintenance->Nm_teknisi = $request->Nm_teknisi;
        $maintenance->save();
        return redirect()->route('maintenance.index')->with('success','Maintenance berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $aset = Aset::find(str_pad($maintenance->Aset_id, 11, '0', STR_PAD_LEFT));
        $aset->Stok=$aset->Stok+$maintenance->Jumlah;
        $aset->save();
        $maintenance->delete();
        return redirect()->route('maintenance.index')->with('success','Maintenance berhasil dihapus');
    }
}
