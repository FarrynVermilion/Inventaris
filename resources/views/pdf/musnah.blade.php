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
    }
    .content{
        width: 100%;
        text-align: center;
        margin: auto;
        padding-top: 3em;
        padding-bottom: 3em;
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
    </style>
</head>

<body>
    <htmlpageheader name="page-header">
        <div class="header">
            <p>DATA ASET YANG DIMUSNAHKAN</p>
            <p>
                Dokumeen dibuat pertanggal
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
            </p>
            <hr>
        </div>
    </htmlpageheader>
    <htmlpagefooter name="page-footer" >
        <div class="footer">
            <hr>
            <p>
                {PAGENO} dari {nbpg}
            </p>
        </div>
    </htmlpagefooter>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>ID aset dihanguskan</th>
                    <th>Tanggal dihanguskan</th>
                    <th>Deskripsi</th>
                    <th>Id penghapusan</th>
                    <th>Tanggal penghapusan ditulis</th>
                    <th>Status penghapusan</th>
                    <th>Jumlah penghapusan</th>
                    <th>Stok</th>
                    <th>ID aset</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Model</th>
                    <th>Seri</th>
                    <th>Harga beli</th>
                    <th>Tanggal perolehan</th>
                    <th>Tanggal akhir garansi</th>
                    <th>Spesifikasi</th>
                    <th>Kondisi awal</th>
                    <th>Jumlah aset</th>
                    <th>Status aset</th>
                    <th>COA</th>
                    <th>ID Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Lokasi</th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aset_dihanguskan as $ad)
                    <tr>
                        <td>{{$ad->dihanguskan_id}}</td>
                        <td>{{$ad->Tgl_dihanguskan}}</td>
                        <td>{{$ad->Deskripsi}}</td>
                        @foreach ($penghapusan as $p)
                            @if ($ad->penghapusan_id==$p->penghapusan_id)
                                <td>{{$p->penghapusan_id}}</td>
                                <td>{{$p->Tgl_penghapusan}}</td>
                                <td>{{$p->Status_penghapusan}}</td>
                                <td>{{$p->Jml_dihapus}}</td>
                                @foreach ($aset as $a)
                                    @if (str_pad($a->Aset_id, 11, '0', STR_PAD_LEFT)==str_pad($p->Aset_id, 11, '0', STR_PAD_LEFT))
                                        <td>{{$a->Stok}}</td>
                                        <td>{{str_pad($a->Aset_id, 11, '0', STR_PAD_LEFT)}}</td>
                                        <td>{{$a->Nama_Aset}}</td>
                                        <td>{{$a->Merek_Aset}}</td>
                                        <td>{{$a->Tipe}}</td>
                                        <td>{{$a->Model}}</td>
                                        <td>{{$a->Seri}}</td>
                                        <td>{{$a->Harga_beli}}</td>
                                        <td>{{$a->Tgl_perolehan}}</td>
                                        <td>{{$a->Tgl_akhir_garansi}}</td>
                                        <td>{{$a->Spesifikasi}}</td>
                                        <td>{{$a->Kondisi_awal}}</td>
                                        <td>{{$a->Jml_aset}}</td>
                                        <td>{{$a->Status_aset}}</td>
                                        <td>{{$a->COA}}</td>
                                        @foreach ($ruang as $r)
                                            @if ($r->Ruang_id==$a->Ruang_id)
                                                <td>{{$r->Ruang_id}}</td>
                                                <td>{{$r->Nm_ruang}}</td>
                                                <td>{{$r->Lokasi}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                        @foreach ( $kategori as $k)
                                            @if ($k->Kategori_id==$a->Kategori_id)
                                                <td>{{$k->Kategori_id}}</td>
                                                <td>{{$k->Nama_kategori}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                        @break
                                    @endif
                                @endforeach
                                @break
                            @endif
                        @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
