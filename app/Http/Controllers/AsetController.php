<?php

namespace App\Http\Controllers;

use App\Models\Aset;

use App\Models\Penghapusan_aset;
use App\Models\Penyusutan;
use App\Models\Jual_aset;
use App\Models\aset_dihanguskan;
use App\Models\Maintenance;

use App\Models\Ruang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aset.index', [
            'Aset' => DB::table('Aset')->paginate(15),
            'Ruang' => Ruang::all(),
            'Kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aset.create', [
            'Ruang' => Ruang::all(),
            'Kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Aset'=>'required|max:255',
            'Merek_Aset'=>'required|max:255',
            'Tipe'=>'required|max:255',
            'Model'=>'required|max:255',
            'Seri'=>'required|max:255',
            'Harga_beli'=>'required|min:0|max_digits:20',
            'Tgl_perolehan'=>'required',
            'Tgl_akhir_garansi'=>'required|after_or_equal:Tgl_perolehan',
            'Spesifikasi'=>'required',
            'Kondisi_awal'=>'required',
            'Jml_aset'=>'required|min:0',
            'Stok'=>'required|min:0',
            'Status_aset'=>'required|max:255',
            'COA'=>'required|max:255',
            'Kategori_id'=>'required',
            'Ruang_id'=>'required'
        ]);
        $num=str_pad(Aset::where('Kategori_id',$request->Kategori_id)->count()%1000, 3, '0', STR_PAD_LEFT);
        $kat=str_pad($request->Kategori_id%100, 2, '0', STR_PAD_LEFT);
        $lok=str_pad($request->Ruang_id%100, 2, '0', STR_PAD_LEFT);
        $m=date('m',strtotime($request->Tgl_perolehan));
        $y=date('y',strtotime($request->Tgl_perolehan));
        $id = $num.$kat.$lok.$m.$y;
        $val = Array(
            'Aset_id'=>$id,
            'Nama_Aset'=>$request->Nama_Aset,
            'Merek_Aset'=>$request->Merek_Aset,
            'Tipe'=>$request->Tipe,
            'Model'=>$request->Model,
            'Seri'=>$request->Seri,
            'Harga_beli'=>$request->Harga_beli,
            'Tgl_perolehan'=>$request->Tgl_perolehan,
            'Tgl_akhir_garansi'=>$request->Tgl_akhir_garansi,
            'Spesifikasi'=>$request->Spesifikasi,
            'Kondisi_awal'=>$request->Kondisi_awal,
            'Jml_aset'=>$request->Jml_aset,
            'Stok'=>$request->Stok,
            'Status_aset'=>$request->Status_aset,
            'COA'=>$request->COA,
            'Kategori_id'=>$request->Kategori_id,
            'Ruang_id'=>$request->Ruang_id
        );
        Aset::create($val);
        return redirect()->route('aset.index')->with('success', "Aset created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        return view('aset.show', [
            'Aset' => $aset,
            'Ruang' => Ruang::all(),
            'Kategori' => Kategori::all()
            // 'Penghapusan_aset' => Penghapusan_aset::where('Aset_id', $aset->Aset_id)->get(),
            // 'Penyusutan' => Penyusutan::where('Aset_id', $aset->Aset_id)->get(),
            // 'Jual_aset' => Jual_aset::where('Aset_id', $aset->Aset_id)->get(),
            // 'aset_dihanguskan' => aset_dihanguskan::where('Aset_id', $aset->Aset_id)->get(),
            // 'Maintenance' => Maintenance::where('Aset_id', $aset->Aset_id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        return view('aset.edit', [
            'edit' => $aset,
            'Ruang' => Ruang::all(),
            'Kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        $request->validate([
            'Nama_Aset'=>'required|max:255',
            'Merek_Aset'=>'required|max:255',
            'Tipe'=>'required|max:255',
            'Model'=>'required|max:255',
            'Seri'=>'required|max:255',
            'Harga_beli'=>'required|min:0|max_digits:20',
            'Tgl_perolehan'=>'required',
            'Tgl_akhir_garansi'=>'required|after_or_equal:Tgl_perolehan',
            'Spesifikasi'=>'required',
            'Kondisi_awal'=>'required',
            'Status_aset'=>'required|max:255',
            'COA'=>'required|max:255',
            'Kategori_id'=>'required',
            'Ruang_id'=>'required'
        ]);
        $num=substr($aset->Asey_id, 0, 3);
        $kat=str_pad($request->Kategori_id%100, 2, '0', STR_PAD_LEFT);
        $lok=str_pad($request->Ruang_id%100, 2, '0', STR_PAD_LEFT);
        $m=date('m',strtotime($request->Tgl_perolehan));
        $y=date('y',strtotime($request->Tgl_perolehan));
        $val = Array(
            'Aset_id' => $num.$kat.$lok.$m.$y,
            'Nama_Aset'=>$request->Nama_Aset,
            'Merek_Aset'=>$request->Merek_Aset,
            'Tipe'=>$request->Tipe,
            'Model'=>$request->Model,
            'Seri'=>$request->Seri,
            'Harga_beli'=>$request->Harga_beli,
            'Tgl_perolehan'=>$request->Tgl_perolehan,
            'Tgl_akhir_garansi'=>$request->Tgl_akhir_garansi,
            'Spesifikasi'=>$request->Spesifikasi,
            'Kondisi_awal'=>$request->Kondisi_awal,
            'Status_aset'=>$request->Status_aset,
            'COA'=>$request->COA,
            'Kategori_id'=>$request->Kategori_id,
            'Ruang_id'=>$request->Ruang_id
        );
        $aset = Aset::find($aset->Aset_id);
        $aset->update($val);
        return redirect()->route('aset.index')->with('success', "Aset updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        //
    }
    public function susut(Request $request)
    {
        $request->validate([
            'Aset_id'=>'required',
            'Tgl_susut'=>'required',
            'Nilai_susut'=>'required'
        ]);
        $val = Array(
            'Aset_id'=>$request->Aset_id,
            'Tgl_susut'=>$request->Tgl_susut,
            'Nilai_susut'=>$request->Nilai_susut
        );
        Penyusutan::create($val);
        return redirect()->route('aset.index')->with('success', "Penyusutan created successfully.");
    }
    public function jual(Request $request)
    {
        $request->validate([
            'Aset_id'=>'required',
            'Tgl_jual'=>'required',
            'Harga_jual'=>'required',
            'Keterangan'=>'required'
        ]);
        $val = Array(
            'Aset_id'=>$request->Aset_id,
            'Tgl_jual'=>$request->Tgl_jual,
            'Harga_jual'=>$request->Harga_jual,
            'Keterangan'=>$request->Keterangan
        );
        Jual_aset::create($val);
        return redirect()->route('aset.index')->with('success', "Penjualan created successfully.");
    }
    public function hapus(Request $request)
    {
        $request->validate([
            'Aset_id'=>'required',
            'Tgl_hapus'=>'required',
            'Alasan_hapus'=>'required'
        ]);
        $val = Array(
            'Aset_id'=>$request->Aset_id,
            'Tgl_hapus'=>$request->Tgl_hapus,
            'Alasan_hapus'=>$request->Alasan_hapus
        );
        Penghapusan_aset::create($val);
        return redirect()->route('aset.index')->with('success', "Penghapusan created successfully.");
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'Aset_id'=>'required',
            'Jml_aset'=>'required'
        ]);
        $aset = Aset::where('Aset_id', $request->Aset_id)->first();
        $aset->Jml_aset += $request->Jml_aset;
        $aset->Stok += $request->Jml_aset;
        $aset->save();
        return redirect()->route('aset.index')->with('success', "Aset added successfully.");
    }
    public function maintenance(Request $request)
    {
        $request->validate([
            'Aset_id'=>'required',
            'Tgl_maintenance'=>'required',
            'Keterangan'=>'required'
        ]);
        $val = Array(
            'Aset_id'=>$request->Aset_id,
            'Tgl_maintenance'=>$request->Tgl_maintenance,
            'Keterangan'=>$request->Keterangan
        );
        Maintenance::create($val);
        return redirect()->route('aset.index')->with('success', "Maintenance created successfully.");
    }
}
