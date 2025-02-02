<?php

namespace App\Http\Controllers;

use App\Models\aset_dihanguskan;
use App\Models\Aset;
use App\Models\Penghapusan_aset;
use App\Models\Kategori;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\WhitespacePathNormalizer;

class AsetDihanguskanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('asetDihanguskan.index', [
            'aset_dihanguskan' => aset_dihanguskan::all(),
            'penghapusan_aset' => Penghapusan_aset::all(),
            'aset' => Aset::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asetDihanguskan.create', [
            'aset' => Aset::all(),
            'kategori' => Kategori::all(),
            'ruang' => Ruang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aset = Aset::find(str_pad($request->Aset_id, 11, '0', STR_PAD_LEFT));
        $jumlah = $aset->Stok;
        $request->validate([
            'Tgl_dihanguskan'=>'required',
            'Deskripsi'=>'required|max:255',
            'Status_penghapusan'=>'required|max:255',
            'Jml_dihapus'=>"required|integer|min:0|max:$jumlah",
            'Upload_File'=>'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'Aset_id'=>'required|max:255'
        ]);
        $filenameWithExt = $request->file('Upload_File')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('Upload_File')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        Storage::putFileAs('',$request->file('Upload_File'),$fileNameToStore);

        $valHapus = Penghapusan_aset::create([
            'Tgl_penghapusan' => date('Y-m-d'),
            'Status_penghapusan' => $request->Status_penghapusan,
            'Jml_dihapus' => $request->Jml_dihapus,
            'Upload_File' => $fileNameToStore,
            'Aset_id'=>str_pad($request->Aset_id, 11, '0', STR_PAD_LEFT)
        ]);


        $valHangus = Array(
            'Tgl_dihanguskan'=>$request->Tgl_dihanguskan,
            'Deskripsi'=>$request->Deskripsi,
            'penghapusan_id'=>$valHapus->penghapusan_id
        );
        aset_dihanguskan::create($valHangus);

        $aset->Stok = $aset->Stok - $request->Jml_dihapus;
        $aset->save();

        $text="aset dihanguskan created successfully nama file : .".$fileNameToStore;
        return redirect()->route('asetDihanguskan.index')->with('success', value: $text);
    }

    /**
     * Display the specified resource.
     */
    public function show(aset_dihanguskan $aset_dihanguskan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aset_dihanguskan $aset_dihanguskan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, aset_dihanguskan $aset_dihanguskan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($aset_dihanguskan)
    {
        $ad = aset_dihanguskan::find($aset_dihanguskan);
        $pa = Penghapusan_aset::find($ad->penghapusan_id);
        $as=Aset::find(str_pad($pa->Aset_id, 11, '0', STR_PAD_LEFT));
        $as->Stok = $as->Stok + $pa->Jml_dihapus;
        $as->save();
        Storage::delete($pa->Upload_File);
        $pa->delete();
        $ad->delete();
        return redirect()->route('asetDihanguskan.index')->with('success', value: 'aset dihanguskan deleted successfully' );
    }
    public function download($file){
        return Storage::download($file);
    }
}
