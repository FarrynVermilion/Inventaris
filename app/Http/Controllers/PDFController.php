<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Ruang;
use App\Models\Aset;
use App\Models\Rusak;
// use App\Models\Jual_aset;
use App\Models\Maintenance;
// use App\Models\Penyusutan;
use App\Models\Penggunaan;
use App\Models\aset_dihanguskan;
use App\Models\Penghapusan_aset;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\Detil_pinjam;
use App\Models\Pengembalian;
use App\Models\Detil_kembali;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function asetPDF(request $request)
    {
        request()->validate([
            'tgl_awal'=>'required',
            'tgl_akhir'=>'required',
            'kategori'=>'required',
            'nama'=>'required',
            'model'=>'required',
        ]);
        $data = [
            'new_aset'=>Aset::orderBy('Nama_Aset')
                ->leftJoin('Kategori','Aset.Kategori_id','=','Kategori.Kategori_id')
                ->leftJoin('Ruang','Aset.Ruang_id','=','Ruang.Ruang_id')
                ->leftJoin('users as Pembuat_aset','Aset.created_by','=','Pembuat_aset.id')
                ->leftJoin('users as Pembaru_aset','Aset.updated_by','=','Pembaru_aset.id')
                ->whereBetween('Tgl_perolehan',[$request->tgl_awal,$request->tgl_akhir])
                ->select('Aset.*',
                    'Kategori.Nama_Kategori',
                    'Ruang.Nm_ruang as Nama_Ruang_Pemnyipanan',
                    'Pembuat_aset.name as Pembuat_aset',
                    'Pembaru_aset.name as Pembaru_aset')
                ->get(),
            'all_aset'=>Aset::orderBy('Nama_Aset')
                ->leftJoin('Kategori','Aset.Kategori_id','=','Kategori.Kategori_id')
                ->leftJoin('Ruang','Aset.Ruang_id','=','Ruang.Ruang_id')
                ->leftJoin('users as Pembuat_aset','Aset.created_by','=','Pembuat_aset.id')
                ->leftJoin('users as Pembaru_aset','Aset.updated_by','=','Pembaru_aset.id')
                ->where('Aset.Kategori_id','like',$request->kategori)
                ->where('Aset.Model','like',$request->model)
                ->where('Aset.created_at','<=',$request->tgl_akhir)
                ->select('Aset.*',
                    'Kategori.Nama_Kategori',
                    'Ruang.Nm_ruang as Nama_Ruang_Pemnyipanan',
                    'Pembuat_aset.name as Pembuat_aset',
                    'Pembaru_aset.name as Pembaru_aset',
                )->get(),
            'rusak'=>Rusak::leftJoin('users as Pembuat_rusak','Rusak.created_by','=','Pembuat_rusak.id')
                ->leftJoin('users as Pembaru_rusak','Rusak.updated_by','=','Pembaru_rusak.id')
                ->leftJoin('Aset','Rusak.Aset_id','=','Aset.Aset_id')
                ->where('Aset.Kategori_id','like',$request->kategori)
                ->where('Aset.Model','like',$request->model)
                ->where('Aset.created_at','<=',$request->tgl_akhir)
                ->select(
                    'Rusak.*',
                    'Pembuat_rusak.name as Pembuat_Rusak',
                    'Pembaru_rusak.name as Pembaru_Rusak',
                    'Aset.Aset_id',
                    'Aset.Nama_Aset',
                    'Aset.Model',
                )->get(),
            'maintenance'=>Maintenance::leftJoin('users as Pembuat_maintenance','Maintenance.created_by','=','Pembuat_maintenance.id')
                ->leftJoin('users as Pembaru_maintenance','Maintenance.updated_by','=','Pembaru_maintenance.id')
                ->leftJoin('Aset','Maintenance.Aset_id','=','Aset.Aset_id')
                ->where('Aset.Kategori_id','like',$request->kategori)
                ->where('Aset.Model','like',$request->model)
                ->where('Aset.created_at','<=',$request->tgl_akhir)
                ->select(
                    'Maintenance.*',
                    'Pembuat_maintenance.name as Pembuat_Maintenance',
                    'Pembaru_maintenance.name as Pembaru_Maintenance',
                    'Aset.Aset_id',
                    'Aset.Nama_Aset',
                    'Aset.Model',
                )->get(),
            'penggunaan'=>Penggunaan::leftJoin('users as Pembuat_penggunaan','Penggunaan.created_by','=','Pembuat_penggunaan.id')
                ->leftJoin('users as Pembaru_penggunaan','Penggunaan.updated_by','=','Pembaru_penggunaan.id')
                ->leftJoin('Aset','Penggunaan.Aset_id','=','Aset.Aset_id')
                ->where('Aset.Kategori_id','like',$request->kategori)
                ->where('Aset.Model','like',$request->model)
                ->where('Aset.created_at','<=',$request->tgl_akhir)
                ->select(
                    'Penggunaan.*',
                    'Pembuat_penggunaan.name as Pembuat_Penggunaan',
                    'Pembaru_penggunaan.name as Pembaru_Penggunaan',
                    'Aset.Aset_id',
                    'Aset.Nama_Aset',
                    'Aset.Model',
                )->get(),
            'penghapusan'=>Penghapusan_aset::leftJoin('aset_dihanguskan','Penghapusan_aset.penghapusan_id','=','aset_dihanguskan.penghapusan_id')
                ->leftJoin('users as Pembuat_penghapusan_aset','Penghapusan_aset.created_by','=','Pembuat_penghapusan_aset.id')
                ->leftJoin('users as Pembaru_penghapusan_aset','Penghapusan_aset.updated_by','=','Pembaru_penghapusan_aset.id')
                ->leftJoin('Aset','Penghapusan_aset.Aset_id','=','Aset.Aset_id')
                ->where('Aset.Kategori_id','like',$request->kategori)
                ->where('Aset.Model','like',$request->model)
                ->where('Aset.created_at','<=',$request->tgl_akhir)
                ->select(
                    'Penghapusan_aset.*',
                    'Pembuat_penghapusan_aset.name as Pembuat_Penghapusan_Aset',
                    'Pembaru_penghapusan_aset.name as Pembaru_Penghapusan_Aset',
                    'aset_dihanguskan.*',
                    'Aset.Aset_id',
                    'Aset.Nama_Aset',
                    'Aset.Model',
                )->get(),
            'peminjaman'=>Peminjaman::leftJoin('Detil_pinjam','Peminjaman.Pinjam_id','=','Detil_pinjam.Pinjam_id')
                ->leftJoin('Peminjam','Peminjam.Peminjam_id','=','Peminjaman.Peminjam_id')
                ->leftJoin('users as Pembuat_peminjaman','Peminjaman.created_by','=','Pembuat_peminjaman.id')
                ->leftJoin('users as Pembaru_peminjaman','Peminjaman.updated_by','=','Pembaru_peminjaman.id')
                ->leftJoin('Aset','Detil_pinjam.Aset_id','=','Aset.Aset_id')
                ->join('Pengembalian','Peminjaman.Pinjam_id','=','Pengembalian.Pinjam_id')
                ->join('Detil_kembali','Pengembalian.Kembali_id','=','Detil_kembali.Kembali_id')
                ->leftJoin('users as Pembuat_pengembalian','Pengembalian.created_by','=','Pembuat_pengembalian.id')
                ->leftJoin('users as Pembaru_pengembalian','Pengembalian.updated_by','=','Pembaru_pengembalian.id')
                ->where('Aset.Kategori_id','like',$request->kategori)
                ->where('Aset.Model','like',$request->model)
                ->where('Aset.created_at','<=',$request->tgl_akhir)
                ->select(
                    'Peminjaman.*',
                    'Detil_pinjam.*',
                    'Peminjam.*',
                    'Pembuat_peminjaman.name as Pembuat_peminjaman',
                    'Pembaru_peminjaman.name as Pembaru_peminjaman',
                    'Aset.Nama_Aset as Nama_aset',
                    'Aset.Model as Model',
                    'Pengembalian.Kembali_id as Id_pengembalian',
                    'Pengembalian.Tgl_kembali as Tanggal_kembali',
                    'Pengembalian.Penerima as Penerima',
                    'Detil_kembali.Jml_kembali as Jumlah_kembali',
                    'Detil_kembali.Status_kembali as Status_kembali',
                    'Pengembalian.created_by as Id_pembuat_pengembalian',
                    'Pembuat_pengembalian.name as Pembuat_pengembalian',
                    'Pengembalian.created_at as Tanggal_pembuatan_pengembalian',
                    'Pengembalian.updated_by as Id_pembaru_pengembalian',
                    'Pembaru_pengembalian.name as Pembaru_pengembalian',
                    'Pengembalian.updated_at as Tanggal_update_pengembalian',
                )->get(),
            'tanggal_awal'=>$request->tgl_awal,
            'tanggal_akhir'=>$request->tgl_akhir,
            'kategori'=>$request->kategori=='%'?'semua':$request->kategori,
            'model'=>$request->model=='%'?'semua':$request->model,
            'nama'=>$request->nama=='%'?'semua':$request->nama
        ];

        $pdf = PDF::loadView('pdf.aset', $data,[],[
            'format'=> 'A4-L',
            'default_font_size'=> '12',
            'margin_top'=> 25,
        ]);

        return $pdf->stream('aset_per_kategori.pdf');
        // return $data;
    }

}
