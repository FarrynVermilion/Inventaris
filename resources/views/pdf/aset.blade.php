<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    @page {
        header: page-header;
        footer: page-footer;
    }
    .container {
    }

    .header {
        width: 100%;
        text-align: center;
        margin: auto;
        padding-top: 0.2em;
        padding-bottom: 0em;
    }
    p {
        margin: 0;
    }
    .content{
        width: 100%;
        text-align: center;
        margin: auto;
    }
    .footer{
        width: 100%;
        text-align: right;
        margin: auto;
        padding-bottom: 0.2em;
    }
    table, th, td {
        margin-left: auto;
        margin-right:auto;
        border: 1px solid;
        text-align: center;
    }
    .page_break {
        page-break-after: always;
    }
    </style>
</head>

<body>
    <htmlpageheader name="page-header">
        <div class="header">
            <p>DATA ASET PER KATEGORI</p>
            <p>
                Dokumen dibuat pertanggal
                @switch(date('w'))
                    @case(0)
                        Minggu
                        @break
                    @case(1)
                        Senin
                        @break
                    @case(2)
                        Selasa
                        @break
                    @case(3)
                        Rabu
                        @break
                    @case(4)
                        Kamis
                        @break
                    @case(5)
                        Jumat
                        @break
                    @case(6)
                        Sabtu
                        @break
                    @default
                @endswitch
                {{date('d-m-Y')}}
            <br>dibuat untuk : {{$tanggal_awal}} - {{$tanggal_akhir}}, kategori : {{$kategori}}, model : {{$model}}, nama : {{$nama}}<br><hr></p>

        </div>
    </htmlpageheader>
    <htmlpagefooter name="page-footer" >
        <div class="footer">
            <hr>
            <p>
                dibuat ID : {{Auth::user()->id}} | nama : {{Auth::user()->name}} | {PAGENO} dari {nbpg}
            </p>
        </div>
    </htmlpagefooter>
    <div class="content">
        <table>
            <tr><td colspan="25">Aset baru</td></tr>
            <tr>
                <th>ID</th>
                <th>Nama Aset</th>
                <th>Model</th>
                <th>Merek Aset</th>
                <th>Tipe</th>
                <th>Seri</th>
                <th>Harga beli</th>
                <th>Tanggal perolehan</th>
                <th>Tanggal akhir garansi</th>
                <th>Spesifikasi</th>
                <th>Kondisi awal</th>
                <th>Jumlah aset</th>
                <th>Aset tersedia</th>
                <th>Status aset</th>
                <th>COA</th>
                <th>Kategori id</th>
                <th>Nama Kategori</th>
                <th>Ruang id</th>
                <th>Nama Ruang Pemnyipanan</th>
                <th>Pembuat id</th>
                <th>Pembuat aset</th>
                <th>created at</th>
                <th>Pembaru id</th>
                <th>Pembaru aset</th>
                <th>updated at</th>
            </tr>
            @foreach ($new_aset as $item)
                <tr>
                    <td>{{str_pad($item->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$item->Nama_Aset}}</td>
                    <td>{{$item->Model}}</td>
                    <td>{{$item->Merek_Aset}}</td>
                    <td>{{$item->Tipe}}</td>
                    <td>{{$item->Seri}}</td>
                    <td>{{$item->Harga_beli}}</td>
                    <td>{{$item->Tgl_perolehan}}</td>
                    <td>{{$item->Tgl_akhir_garansi}}</td>
                    <td>{{$item->Spesifikasi}}</td>
                    <td>{{$item->Kondisi_awal}}</td>
                    <td>{{$item->Jml_aset}}</td>
                    <td>{{$item->Stok}}</td>
                    <td>{{$item->Status_aset}}</td>
                    <td>{{$item->COA}}</td>
                    <td>{{$item->Kategori_id}}</td>
                    <td>{{$item->Nama_Kategori}}</td>
                    <td>{{$item->Ruang_id}}</td>
                    <td>{{$item->Nama_Ruang_Pemnyipanan}}</td>
                    <td>{{$item->created_by}}</td>
                    <td>{{$item->Pembuat_aset}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_by}}</td>
                    <td>{{$item->Pembaru_aset}}</td>
                    <td>{{$item->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="page_break"></div>
    <div class="content">
        <table>
            <tr><td colspan="25">Semua aset</td></tr>
            <tr>
                <th>ID</th>
                <th>Nama Aset</th>
                <th>Model</th>
                <th>Merek Aset</th>
                <th>Tipe</th>
                <th>Seri</th>
                <th>Harga beli</th>
                <th>Tanggal perolehan</th>
                <th>Tanggal akhir garansi</th>
                <th>Spesifikasi</th>
                <th>Kondisi awal</th>
                <th>Jumlah aset total</th>
                <th>Aset tersedia</th>
                <th>Status aset</th>
                <th>COA</th>
                <th>Kategori id</th>
                <th>Nama Kategori</th>
                <th>Ruang id</th>
                <th>Nama Ruang Pemnyipanan</th>
                <th>Pembuat id</th>
                <th>Pembuat aset</th>
                <th>created at</th>
                <th>Pembaru id</th>
                <th>Pembaru aset</th>
                <th>updated at</th>
            </tr>
            @foreach ($all_aset as $item)
                <tr>
                    <td>{{str_pad($item->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$item->Nama_Aset}}</td>
                    <td>{{$item->Model}}</td>
                    <td>{{$item->Merek_Aset}}</td>
                    <td>{{$item->Tipe}}</td>
                    <td>{{$item->Seri}}</td>
                    <td>{{$item->Harga_beli}}</td>
                    <td>{{$item->Tgl_perolehan}}</td>
                    <td>{{$item->Tgl_akhir_garansi}}</td>
                    <td>{{$item->Spesifikasi}}</td>
                    <td>{{$item->Kondisi_awal}}</td>
                    <td>{{$item->Jml_aset}}</td>
                    <td>{{$item->Stok}}</td>
                    <td>{{$item->Status_aset}}</td>
                    <td>{{$item->COA}}</td>
                    <td>{{$item->Kategori_id}}</td>
                    <td>{{$item->Nama_Kategori}}</td>
                    <td>{{$item->Ruang_id}}</td>
                    <td>{{$item->Nama_Ruang_Pemnyipanan}}</td>
                    <td>{{$item->created_by}}</td>
                    <td>{{$item->Pembuat_aset}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_by}}</td>
                    <td>{{$item->Pembaru_aset}}</td>
                    <td>{{$item->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="page_break"></div>
    <div class="content">
        <table>
            <tr><td colspan="13">Aset rusak</td></tr>
            <tr>
                <th>ID Kerusakan</th>
                <th>ID Aset</th>
                <th>Nama Aset</th>
                <th>Model</th>
                <th>Kerusakan</th>
                <th>Penanggung jawab</th>
                <th>Jumlah</th>
                <th>created by</th>
                <th>Pembuat Rusak</th>
                <th>created at</th>
                <th>updated by</th>
                <th>Pembaru Rusak</th>
                <th>updated at</th>
            </tr>
            @foreach ($rusak as $item)
                <tr>
                    <td>{{$item->Rusak_id}}</td>
                    <td>{{str_pad($item->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$item->Nama_Aset}}</td>
                    <td>{{$item->Model}}</td>
                    <td>{{$item->Kerusakan}}</td>
                    <td>{{$item->Penanggung_jawab}}</td>
                    <td>{{$item->Jumlah}}</td>
                    <td>{{$item->created_by}}</td>
                    <td>{{$item->Pembuat_Rusak}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_by}}</td>
                    <td>{{$item->Pembaru_Rusak}}</td>
                    <td>{{$item->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="page_break"></div>
    <div class="content">
        <table>
            <tr><td colspan="16">Aset sedang maintenance</td></tr>
            <tr>
                <th>ID Maintenance</th>
                <th>ID Aset</th>
                <th>Nama Aset</th>
                <th>Model</th>
                <th>Jumlah</th>
                <th>Tanggal maintenance</th>
                <th>Jenis maintenance</th>
                <th>Deskripsi</th>
                <th>Biaya</th>
                <th>Nama Teknisi</th>
                <th>created by</th>
                <th>Pembuat Maintenance</th>
                <th>created at</th>
                <th>updated by</th>
                <th>Pembaru Maintenance</th>
                <th>updated at</th>
            </tr>
            @foreach ($maintenance as $item)
                <tr>
                    <td>{{$item->maintenance_id}}</td>
                    <td>{{str_pad($item->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$item->Nama_Aset}}</td>
                    <td>{{$item->Model}}</td>
                    <td>{{$item->Jumlah}}</td>
                    <td>{{$item->Tgl_maintenance}}</td>
                    <td>{{$item->Jenis_maintenance}}</td>
                    <td>{{$item->Deskripsi}}</td>
                    <td>{{$item->Biaya}}</td>
                    <td>{{$item->Nm_teknisi}}</td>
                    <td>{{$item->created_by}}</td>
                    <td>{{$item->Pembuat_Maintenance}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_by}}</td>
                    <td>{{$item->Pembaru_Maintenance}}</td>
                    <td>{{$item->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="page_break"></div>
    <div class="content">
        <table>
            <tr><td colspan="12">Aset yang sedang digunakan</td></tr>
            <tr>
                <th>ID Penggunaan</th>
                <th>ID Aset</th>
                <th>Nama Aset</th>
                <th>Model</th>
                <th>Untuk</th>
                <th>Jumlah</th>
                <th>created by</th>
                <th>Pembuat Penggunaan</th>
                <th>created at</th>
                <th>updated by</th>
                <th>Pembaru Penggunaan</th>
                <th>updated at</th>
            </tr>
            @foreach ($penggunaan as $item)
                <tr>
                    <td>{{$item->Penggunaan_id}}</td>
                    <td>{{str_pad($item->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$item->Nama_Aset}}</td>
                    <td>{{$item->Model}}</td>
                    <td>{{$item->Untuk}}</td>
                    <td>{{$item->Jumlah}}</td>
                    <td>{{$item->created_by}}</td>
                    <td>{{$item->Pembuat_Penggunaan}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_by}}</td>
                    <td>{{$item->Pembaru_Penggunaan}}</td>
                    <td>{{$item->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="page_break"></div>
    <div class="content">
        <table>
            <tr><td colspan="16">Aset yang dihapus</td></tr>
            <tr>
                <th>ID Penghapusan</th>
                <th>ID Aset</th>
                <th>Nama Aset</th>
                <th>Model</th>
                <th>Status Penghapusan</th>
                <th>Jumlah dihapus</th>
                <th>Tanggal pelaksanaan</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th>Foto</th>
                <th>created by</th>
                <th>Pembuat Penghapusan</th>
                <th>created at</th>
                <th>updated by</th>
                <th>Pembaru Penghapusan</th>
                <th>updated at</th>
            </tr>
            @foreach ($penghapusan as $item)
                <tr>
                    <td>{{$item->penghapusan_id}}</td>
                    <td>{{str_pad($item->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$item->Nama_Aset}}</td>
                    <td>{{$item->Model}}</td>
                    <td>{{$item->Status_penghapusan}}</td>
                    <td>{{$item->Jml_dihapus}}</td>
                    <td>{{$item->Tgl_dihanguskan}}</td>
                    <td>{{$item->Deskripsi}}</td>
                    {{-- <td><img src="{{ Storage::url("$item->Upload_File") }}" height="1000px" width="1000px"></td>
                    <td><img src="{{ Storage::url("$item->Upload_Foto") }}" height="1000px" width="1000px"></td> --}}
                    <td>{{$item->Upload_File}}</td>
                    <td>{{$item->Upload_Foto}}</td>
                    <td>{{$item->created_by}}</td>
                    <td>{{$item->Pembuat_Penghapusan_Aset}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_by}}</td>
                    <td>{{$item->Pembaru_Penghapusan_Aset}}</td>
                    <td>{{$item->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="page_break"></div>
    <div class="content">
        <table>
            <tr><td colspan="23">Aset yang dipinjam</td></tr>
            <tr>
                <th>ID Peminjaman</th>
                <th>ID Peminjam</th>
                <th>Nama Peminjam</th>
                <th>Kontak</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Harus Kembali</th>
                <th>created by</th>
                <th>Pembuat Peminjaman</th>
                <th>created at</th>
                <th>ID Aset</th>
                <th>Nama Aset</th>
                <th>Model</th>
                <th>Infaq</th>
                <th>Jumlah Pinjam</th>
                <th>Belum Kembali</th>
                <th>ID Pengembalian</th>
                <th>Jumlah Kembali</th>
                <th>Tanggal Kembali</th>
                <th>Penerima</th>
                <th>Status Kembali</th>
                <th>created by</th>
                <th>Pembuat Pengembalian</th>
                <th>created at</th>
            </tr>
            @foreach ($peminjaman as $item)
                <tr>
                    <td>{{$item->Pinjam_id}}</td>
                    <td>{{$item->Peminjam_id}}</td>
                    <td>{{$item->Nama_peminjam}}</td>
                    <td>{{$item->No_HP}}</td>
                    <td>{{$item->Tgl_pinjam}}</td>
                    <td>{{$item->Tgl_harus_kembali}}</td>
                    <td>{{$item->created_by}}</td>
                    <td>{{$item->Pembuat_peminjaman}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{str_pad($item->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$item->Nama_aset}}</td>
                    <td>{{$item->Model}}</td>
                    <td>{{$item->Infaq}}</td>
                    <td>{{$item->Jml_pinjam}}</td>
                    <td>{{$item->Belum_kembali}}</td>
                    <td>{{$item->Id_pengembalian}}</td>
                    <td>{{$item->Jumlah_kembali}}</td>
                    <td>{{$item->Tanggal_kembali}}</td>
                    <td>{{$item->Penerima}}</td>
                    <td>{{$item->Status_kembali}}</td>
                    <td>{{$item->Id_pembuat_pengembalian}}</td>
                    <td>{{$item->Pembuat_pengembalian}}</td>
                    <td>{{$item->Tanggal_pembuatan_pengembalian}}</td>
                </tr>
            @endforeach
        </table>
    </div>

</body>
</html>
