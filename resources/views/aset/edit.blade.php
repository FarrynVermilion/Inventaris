@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Kategori',
    'activePage' => 'kategori',
    'activeNav' => '',
])
@section('content')
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit data aset")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('aset.update',str_pad($edit->Aset_id, 11, '0', STR_PAD_LEFT) ) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              @method('PUT')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" ID")}}</label>
                            <input type="text" name="Aset_id" class="form-control" value="{{ str_pad($edit->Aset_id, 11, '0', STR_PAD_LEFT) }}" readonly>
                            @include('alerts.feedback', ['field' => 'Aset_id'])
                        </div>
                        <div class ="form-group">
                            <label>{{__(" Nama")}}</label>
                            <input type="text" name="Nama_Aset" class="form-control" value="{{ old('Nama_Aset', $edit->Nama_Aset) }}">
                            @include('alerts.feedback', ['field' => 'Nama_Aset'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Merek aset")}}</label>
                            <input type="text" name="Merek_Aset" class="form-control" value="{{ old('Merek_Aset', $edit->Merek_Aset) }}">
                            @include('alerts.feedback', ['field' => 'Merek_Aset'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Tipe aset")}}</label>
                            <input type="text" name="Tipe" class="form-control" value="{{ old('Tipe', $edit->Tipe) }}">
                            @include('alerts.feedback', ['field' => 'Tipe'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Model aset")}}</label>
                            <input type="text" name="Model" class="form-control" value="{{ old('Model', $edit->Model) }}">
                            @include('alerts.feedback', ['field' => 'Model'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Seri aset")}}</label>
                            <input type="text" name="Seri" class="form-control" value="{{ old('Seri', $edit->Seri) }}">
                            @include('alerts.feedback', ['field' => 'Seri'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Harga beli")}}</label>
                            <input type="number" name="Harga_beli" class="form-control" value="{{ old('Harga_beli', $edit->Harga_beli) }}">
                            @include('alerts.feedback', ['field' => 'Harga_beli'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Tanggal perolehan")}}</label>
                            <input type="date" name="Tgl_perolehan" class="form-control" value="{{ old('Tgl_perolehan', $edit->Tgl_perolehan) }}">
                            @include('alerts.feedback', ['field' => 'Tgl_perolehan'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Tanggal akhir garansi")}}</label>
                            <input type="date" name="Tgl_akhir_garansi" class="form-control" value="{{ old('Tgl_akhir_garansi', $edit->Tgl_akhir_garansi) }}">
                            @include('alerts.feedback', ['field' => 'Tgl_akhir_garansi'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Spesifikasi")}}</label>
                            <input type="text" name="Spesifikasi" class="form-control" value="{{ old('Spesifikasi', $edit->Spesifikasi) }}">
                            @include('alerts.feedback', ['field' => 'Spesifikasi'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Kondisi_awal")}}</label>
                            <input type="text" name="Kondisi_awal" class="form-control" value="{{ old('Kondisi_awal', $edit->Kondisi_awal) }}">
                            @include('alerts.feedback', ['field' => 'Kondisi_awal'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" Status aset")}}</label>
                            <input type="text" name="Status_aset" class="form-control" value="{{ old('Status_aset', $edit->Status_aset) }}">
                            @include('alerts.feedback', ['field' => 'Status_aset'])
                        </div>
                        <div class="form-group">
                            <label>{{__(" COA")}}</label>
                            <input type="text" name="COA" class="form-control" value="{{ old('COA', $edit->COA) }}">
                            @include('alerts.feedback', ['field' => 'COA'])
                        </div>
                        <div>
                            <label>{{__(" Kategori")}}</label>
                            <select class="form-control" name="Kategori_id">
                                @foreach ($Kategori as $item)
                                    <option value="{{ $item->Kategori_id }}" {{ $edit->Kategori_id == $item->Kategori_id ? 'selected' : '' }}>{{ $item->Nama_kategori }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'Kategori_id'])
                        </div>
                        <div>
                            <label>{{__(" Ruang")}}</label>
                            <select class="form-control" name="Ruang_id">
                                @foreach ($Ruang as $item)
                                    <option value="{{ $item->Ruang_id }}" {{ $edit->Ruang_id == $item->Ruang_id ? 'selected' : '' }}>Nama Ruang : {{ $item->Nm_ruang }} | Lokasi : {{ $item->Lokasi }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'Ruang_id'])
                        </div>
                    </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
