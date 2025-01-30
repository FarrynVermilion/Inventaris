@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'create aset',
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
            <h5 class="title">{{__(" Create Ruang")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('aset.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row"><div class="col-md-7 pr-1">
                <div class="form-group">
                            <label>{{__(" Nama aset")}}</label>
                                <input type="text" name="Nama_Aset" class="form-control {{ $errors->has('Nama_Aset') ? ' is-invalid' : '' }}" placeholder="Nama Aset" value="{{ old('Nama_Aset') }}">
                                @include('alerts.feedback', ['field' => 'Nama_Aset'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Merek aset")}}</label>
                            <input type="text" name="Merek_Aset" class="form-control {{ $errors->has('Merek_Aset') ? ' is-invalid' : '' }}" placeholder="Merek Aset" value="{{ old('Merek_Aset') }}">
                            @include('alerts.feedback', ['field' => 'Merek_Aset'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tipe")}}</label>
                            <input type="text" name="Tipe" class="form-control {{ $errors->has('Tipe') ? ' is-invalid' : '' }}" placeholder="Tipe" value="{{ old('Tipe') }}">
                            @include('alerts.feedback', ['field' => 'Tipe'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Model")}}</label>
                            <input type="text" name="Model" class="form-control {{ $errors->has('Model') ? ' is-invalid' : '' }}" placeholder="Model" value="{{ old('Model') }}">
                            @include('alerts.feedback', ['field' => 'Model'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Seri")}}</label>
                            <input type="text" name="Seri" class="form-control {{ $errors->has('Seri') ? ' is-invalid' : '' }}" placeholder="Seri" value="{{ old('Seri') }}">
                            @include('alerts.feedback', ['field' => 'Seri'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Harga beli")}}</label>
                            <input type="number" name="Harga_beli" class="form-control {{ $errors->has('Harga_beli') ? ' is-invalid' : '' }}" placeholder="Harga Beli" value="{{ old('Harga_beli') }}">
                            @include('alerts.feedback', ['field' => 'Harga_beli'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal perolehan")}}</label>
                            <input type="date" name="Tgl_perolehan" class="form-control {{ $errors->has('Tgl_perolehan') ? ' is-invalid' : '' }}" placeholder="Tanggal Perolehan" value="{{ old('Tgl_perolehan') }}">
                            @include('alerts.feedback', ['field' => 'Tgl_perolehan'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal akhir garansi")}}</label>
                            <input type="date" name="Tgl_akhir_garansi" class="form-control {{ $errors->has('Tgl_akhir_garansi	') ? ' is-invalid' : '' }}" placeholder="Tgl_akhir_garansi" value="{{ old('Tgl_akhir_garansi') }}">
                            @include('alerts.feedback', ['field' => 'Tgl_akhir_garansi	'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Spesifikasi")}}</label>
                            <input type="text" name="Spesifikasi" class="form-control {{ $errors->has('Spesifikasi	') ? ' is-invalid' : '' }}" placeholder="Spesifikasi" value="{{ old('Spesifikasi') }}">
                            @include('alerts.feedback', ['field' => 'Spesifikasi'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Kondisi awal")}}</label>
                            <input type="text" name="Kondisi_awal" class="form-control {{ $errors->has('Kondisi_awal') ? ' is-invalid' : '' }}" placeholder="Kondisi awal" value="{{ old('Kondisi_awal') }}">
                            @include('alerts.feedback', ['field' => 'Kondisi_awal'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Jumlah aset")}}</label>
                            <input type="number" name="Jml_aset" class="form-control {{ $errors->has('Jml_aset') ? ' is-invalid' : '' }}" placeholder="Jumlah aset" value="{{ old('Jml_aset') }}">
                            @include('alerts.feedback', ['field' => 'Jml_aset'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Stok")}}</label>
                            <input type="number" name="Stok" class="form-control {{ $errors->has('Stok') ? ' is-invalid' : '' }}" placeholder="Jumlah Stok" value="{{ old('Stok') }}">
                            @include('alerts.feedback', ['field' => 'Stok'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Status aset")}}</label>
                            <input type="text" name="Status_aset" class="form-control {{ $errors->has('Status_aset') ? ' is-invalid' : '' }}" placeholder="Status_aset" value="{{ old('Status_aset') }}">
                            @include('alerts.feedback', ['field' => 'Status_aset'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" COA")}}</label>
                            <input type="text" name="COA" class="form-control {{ $errors->has('COA') ? ' is-invalid' : '' }}" placeholder="COA" value="{{ old('COA') }}">
                            @include('alerts.feedback', ['field' => 'COA'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Kategori")}}</label>
                            <select name="Kategori_id" class="form-control {{ $errors->has('Kategori_id') ? ' is-invalid' : '' }}">
                                @foreach ($Kategori as $k)
                                    <option value="{{$k->Kategori_id}}"
                                        @if ( old('Kategori_id')==$k->Kategori_id)
                                            selected
                                        @endif
                                        >{{$k->Nama_kategori}}</option>
                                @endforeach
                              </select>
                            @include('alerts.feedback', ['field' => 'Kategori_id'])
                        </div>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Ruang")}}</label>
                            <select name="Ruang_id" class="form-control {{ $errors->has('Ruang_id') ? ' is-invalid' : '' }}">
                                @foreach ($Ruang as $r)
                                    <option value="{{$r->Ruang_id }}"
                                        @if ( old('Ruang_id')==$r->Ruang_id)
                                            selected
                                        @endif
                                        >Nama ruang : {{$r->Nm_ruang}} <br> lokasi : {{$r->Lokasi}}</option>
                                @endforeach
                              </select>
                            @include('alerts.feedback', ['field' => 'Kategori_id'])
                        </div>
                    </div>

                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
