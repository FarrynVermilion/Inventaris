<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Ruang;
use App\Models\Rusak;
use App\Models\aset_dihanguskan;
use App\Models\Penghapusan_aset;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function asetPDF(request $request)
    {
        $data = [
            'aset'=>DB::table('Aset')->orderBy('Nama_Aset')->get(),
            'kategori'=>DB::table('Kategori')->orderBy('Nama_kategori')->get(),
            'ruang'=>Ruang::all()
        ];

        $pdf = PDF::loadView('pdf.aset', $data,[],[
            'format'=> 'A4-L',
            'default_font_size'=> '12',
        ]);

        return $pdf->stream('aset_per_kategori.pdf');
    }

}
