@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'create penghapusan aset',
    'activePage' => 'asetDihanguskan'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Create penghapusan aset")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('asetDihanguskan.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Pilih aset")}}</label>
                            <select name="Aset_id" class="form-control {{ $errors->has('Aset_id') ? ' is-invalid' : '' }}">
                                @foreach ($aset as $a)
                                    @if ($a->Stok != 0)
                                        <option value="{{$a->Aset_id}}" {{old('Aset_id') == $a->Aset_id ? 'selected' : ''}}>
                                            Barang : {{$a->Nama_Aset}} |
                                            Merek : {{$a->Merek_Aset}} |
                                            Tipe : {{$a->Tipe}} |
                                            Model : {{$a->Model}} |
                                            Seri : {{$a->Seri}} |
                                            Aset tersedia : {{$a->Stok}} |
                                            Lokasi :
                                            @foreach ( $ruang as $r)
                                                @if ($r->Ruang_id == $a->Ruang_id)
                                                    {{$r->Nm_ruang}} |
                                                    @break
                                                @endif
                                            @endforeach
                                            Ketegori :
                                            @foreach ( $kategori as $k)
                                                @if ($k->Kategori_id == $a->Kategori_id)
                                                    {{$k->Nama_kategori}}
                                                    @break
                                                @endif
                                            @endforeach
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'Aset_id'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Status penghapusan")}}</label>
                            <input type="text" name="Status_penghapusan" class="form-control {{ $errors->has('Status_penghapusan') ? ' is-invalid' : '' }}" placeholder="Status penghapusan" value="{{ old('Status_penghapusan') }}">
                            @include('alerts.feedback', ['field' => 'Status_penghapusan'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Jumlah dihapus")}}</label>
                            <input type="number" name="Jml_dihapus" class="form-control {{ $errors->has('Jml_dihapus') ? ' is-invalid' : '' }}" placeholder="Jumlah dihapus" value="{{ old('Jml_dihapus') }}">
                            @include('alerts.feedback', ['field' => 'Jml_dihapus'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Upload file")}}</label>
                            <div>
                                <input type="file" name="Upload_File" class="form-control {{ $errors->has('Upload_File') ? ' is-invalid' : '' }}">
                            </div>
                            @include('alerts.feedback', ['field' => 'Upload_File'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Upload foto")}}</label>
                            <div>
                                <input type="file" name="Upload_Foto" class="form-control {{ $errors->has('Upload_Foto') ? ' is-invalid' : '' }}">
                            </div>
                            @include('alerts.feedback', ['field' => 'Upload_Foto'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Deskripsi")}}</label>
                            <input type="text" name="Deskripsi" class="form-control {{ $errors->has('Deskripsi') ? ' is-invalid' : '' }}" value="{{ old('Deskripsi') }}">
                            @include('alerts.feedback', ['field' => 'Deskripsi'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal dihanguskan")}}</label>
                            <input type="date" name="Tgl_dihanguskan" class="form-control {{ $errors->has('Tgl_dihanguskan') ? ' is-invalid' : '' }}" placeholder="Tanggal dihanguskan" value="{{ old('Tgl_dihanguskan') }}">
                            @include('alerts.feedback', ['field' => 'Tgl_dihanguskan'])
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
