@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'create maintenance',
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
            <h5 class="title">{{__(" Create Maintenance")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('maintenance.store') }}" autocomplete="off" enctype="multipart/form-data">
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
                                        <option value="{{$a->Aset_id}}" {{old('Aset_id') == $a->Aset_id ? 'selected' : ''}}>Barang : {{$a->Nama_Aset}} | Merek : {{$a->Merek_Aset}} | Tipe : {{$a->Tipe}} | Model : {{$a->Model}} | Seri : {{$a->Seri}} | Stok : {{$a->Stok}}</option>
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
                            <label>{{__(" Tanggal maintenance")}}</label>
                            <input type="date" name="Tgl_maintenance" class="form-control {{ $errors->has('Tgl_maintenance') ? ' is-invalid' : '' }}" placeholder="Tanggal maintenance" value="{{ old('Tgl_maintenance') }}">
                            @include('alerts.feedback', ['field' => 'Tgl_maintenance'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Jenis maintenance")}}</label>
                            <input type="text" name="Jenis_maintenance" class="form-control {{ $errors->has('Jenis_maintenance') ? ' is-invalid' : '' }}" placeholder="Jenis maintenance" value="{{ old('Jenis_maintenance') }}">
                            @include('alerts.feedback', ['field' => 'Jenis_maintenance'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Deskripsi")}}</label>
                            <input type="text" name="Deskripsi" class="form-control {{ $errors->has('Deskripsi') ? ' is-invalid' : '' }}" placeholder="Deskripsi" value="{{ old('Deskripsi') }}">
                            @include('alerts.feedback', ['field' => 'Deskripsi'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Biaya")}}</label>
                            <input type="number" name="Biaya" class="form-control {{ $errors->has('Biaya') ? ' is-invalid' : '' }}" placeholder="Biaya" value="{{ old('Biaya') }}">
                            @include('alerts.feedback', ['field' => 'Biaya'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nama teknisi")}}</label>
                            <input type="text" name="Nm_teknisi" class="form-control {{ $errors->has('Nm_teknisi') ? ' is-invalid' : '' }}" placeholder="Nama teknisi" value="{{ old('Nm_teknisi') }}">
                            @include('alerts.feedback', ['field' => 'Nm_teknisi'])
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
