@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Show aset',
    'activePage' => 'aset'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Detail Aset")}}</h5>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Nama aset")}}</label>
                        <p>{{ $Aset->Nama_Aset }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Tipe")}}</label>
                        <p>{{ $Aset->Tipe }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Model")}}</label>
                        <p>{{ $Aset->Model }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Seri")}}</label>
                        <p>{{ $Aset->Seri }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Harga beli")}}</label>
                        <p>{{ $Aset->Harga_beli }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Tanggal perolehan")}}</label>
                        <p>{{ $Aset->Tgl_perolehan }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Tanggal akhir garansi")}}</label>
                        <p>{{ $Aset->Tgl_akhir_garansi }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Spesifikasi")}}</label>
                        <p>{{ $Aset->Spesifikasi }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Kondisi awal")}}</label>
                        <p>{{ $Aset->Kondisi_awal }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Jumlah aset")}}</label>
                        <p>{{ $Aset->Jml_aset }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Stok")}}</label>
                        <p>{{ $Aset->Stok }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Status aset")}}</label>
                        <p>{{ $Aset->Status_aset }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" COA")}}</label>
                        <p>{{ $Aset->COA }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Kategori")}}</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Kategori</th>
                                    <th>Nama Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $Aset->Kategori_id }}</td>
                                    @foreach ($Kategori as $k)
                                        @if ( $Aset->Kategori_id==$k->Kategori_id)
                                        <td>{{$k->Nama_kategori}}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Ruang")}}</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Ruang</th>
                                    <th>Nama Ruang</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $Aset->Ruang_id }}</td>
                                    @foreach ($Ruang as $r)
                                        @if ( $Aset->Ruang_id==$r->Ruang_id)
                                        <td>{{$r->Nm_ruang}}</td>
                                        <td>{{$r->Lokasi}}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <a href="{{ route('aset.index') }}" class="btn btn-primary">{{__('Kembali')}}</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
