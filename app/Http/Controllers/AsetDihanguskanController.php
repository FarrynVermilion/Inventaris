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
use Illuminate\Support\Facades\DB;

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
        $aset=DB::table('Aset')->where('Stok','>','0')->get();
        return view('asetDihanguskan.create', [
            'aset' => $aset,
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
            'Jml_dihapus'=>"required|integer|min:0|max:".$jumlah,
            'Upload_File'=>'required|file|image|mimes:jpeg,png,jpg,pdf|max:2048',
            'Upload_Foto'=>'required|file|image|mimes:jpeg,png,jpg,pdf|max:2048',
            'Aset_id'=>'required|max:255'
        ]);
        $filenameWithExt = $request->file('Upload_File')->getClientOriginalName();
        $filename = preg_replace('/[^A-Za-z0-9\-]/', '',        str_replace(' ', '-', pathinfo($filenameWithExt, PATHINFO_FILENAME)));
        $fileExtension = $request->file('Upload_File')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$fileExtension;
        Storage::putFileAs('',$request->file('Upload_File'),$fileNameToStore);

        $fotoWithExt = $request->file('Upload_Foto')->getClientOriginalName();
        $fotoname = preg_replace('/[^A-Za-z0-9\-]/', '',        str_replace(' ', '-', pathinfo($fotoWithExt, PATHINFO_FILENAME)));
        $fotoExtension = $request->file('Upload_Foto')->getClientOriginalExtension();
        $fotoNameToStore = $fotoname.'_'.time().'.'.$fotoExtension;
        Storage::putFileAs('',$request->file('Upload_Foto'),$fotoNameToStore);

        $valHapus = Penghapusan_aset::create([
            'Tgl_penghapusan' => date('Y-m-d'),
            'Status_penghapusan' => $request->Status_penghapusan,
            'Jml_dihapus' => $request->Jml_dihapus,
            'Upload_File' => $fileNameToStore,
            'Upload_Foto' => $fotoNameToStore,
            'Aset_id'=>str_pad($request->Aset_id, 11, '0', STR_PAD_LEFT)
        ]);


        $valHangus = Array(
            'Tgl_dihanguskan'=>$request->Tgl_dihanguskan,
            'Deskripsi'=>$request->Deskripsi,
            'penghapusan_id'=>$valHapus->penghapusan_id
        );
        aset_dihanguskan::create($valHangus);

        $aset->Stok = $aset->Stok - $request->Jml_dihapus;
        $aset->Jml_aset = $aset->Jml_aset - $request->Jml_dihapus;
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
        $as->Jml_aset = $as->Jml_aset + $pa->Jml_dihapus;
        $as->save();
        Storage::delete($pa->Upload_File);
        Storage::delete($pa->Upload_Foto);
        $pa->delete();
        $ad->delete();
        return redirect()->route('asetDihanguskan.index')->with('success', value: 'aset dihanguskan deleted successfully' );
    }
    public function download($file){
        return Storage::download($file);
    }
}
