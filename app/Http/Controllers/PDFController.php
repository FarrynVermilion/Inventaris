<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\Aset;

class PDFController extends Controller
{
    public function asetPDF()
    {
        $data = [
            'aset'=>Aset::all()
        ];

        $pdf = PDF::loadView('pdf.aset', $data);

        return $pdf->stream('aset.pdf');
    }
    public function asetDigunakanPDF()
    {
        $data = [
            'aset'=>Aset::all()
        ];

        $pdf = PDF::loadView('pdf.aset', $data);

        return $pdf->stream('aset.pdf');
    }
    public function asetTidakDigunakanPDF()
    {
        $data = [
            'aset'=>Aset::all()
        ];

        $pdf = PDF::loadView('pdf.aset', $data);

        return $pdf->stream('aset.pdf');
    }
    public function asetRusakPDF()
    {
        $data = [
            'aset'=>Aset::all()
        ];

        $pdf = PDF::loadView('pdf.aset', $data);

        return $pdf->stream('aset.pdf');
    }
    public function asetMaintenancePDF()
    {
        $data = [
            'aset'=>Aset::all()
        ];

        $pdf = PDF::loadView('pdf.aset', $data);

        return $pdf->stream('aset.pdf');
    }

    public function asetMusnahPDF()
    {
        $data = [
            'aset'=>Aset::all()
        ];

        $pdf = PDF::loadView('pdf.aset', $data);

        return $pdf->stream('aset.pdf');
    }

}
