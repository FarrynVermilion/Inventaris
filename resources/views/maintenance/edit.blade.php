@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit maintenance',
    'activePage' => 'maintenance',
    'activeNav' => '',
])
@section('content')
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit maintenance")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('maintenance.update',$edit->maintenance_id ) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              @method('PUT')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal maintenance")}}</label>
                            <input type="date" name="Tgl_maintenance" class="form-control" value="{{ old('Tgl_maintenance', $edit->Tgl_maintenance) }}">
                            @include('alerts.feedback', ['field' => 'Tgl_maintenance'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label>{{__(" Jenis maintenance")}}</label>
                      <input type="text" name="Jenis_maintenance" class="form-control" placeholder="Jenis_maintenance" value="{{ old('Jenis_maintenance', $edit->Jenis_maintenance) }}">
                      @include('alerts.feedback', ['field' => 'Jenis_maintenance'])
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Deskripsi")}}</label>
                        <input type="text" name="Deskripsi" class="form-control" placeholder="Deskripsi" value="{{ old('Deskripsi', $edit->Deskripsi) }}">
                        @include('alerts.feedback', ['field' => 'Deskripsi'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Biaya")}}</label>
                        <input type="text" name="Biaya" class="form-control" placeholder="Biaya" value="{{ old('Biaya', $edit->Biaya) }}">
                        @include('alerts.feedback', ['field' => 'Biaya'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Nama teknisi")}}</label>
                        <input type="text" name="Nm_teknisi" class="form-control" placeholder="Nm_teknisi" value="{{ old('Nm_teknisi', $edit->Nm_teknisi) }}">
                        @include('alerts.feedback', ['field' => 'Nm_teknisi'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Aset")}}</label>
                        <select name="Aset_id" class="form-control">
                          @foreach ($aset as $a)
                            @if ($a->Stok != 0)
                                <option value="{{$a->Aset_id}}" {{$edit->Aset_id == $a->Aset_id ? 'selected' : ''}}>Barang : {{$a->Nama_Aset}} | Merek : {{$a->Merek_Aset}} | Tipe : {{$a->Tipe}} | Model : {{$a->Model}} | Seri : {{$a->Seri}} | Stok : {{$a->Stok}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Jumlah")}}</label>
                        <input type="number" name="Jumlah" class="form-control" placeholder="Jumlah" value="{{ old('Jumlah', $edit->Jumlah) }}">
                        @include('alerts.feedback', ['field' => 'Jumlah'])
                      </div>
                    </div>
                  </div>
                    <div class="card-footer">
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
