@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Lokasi',
    'activePage' => 'ruang',
    'activeNav' => '',
])
@section('content')
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Lokasi")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('ruang.update',$edit->Ruang_id) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              @method('PUT')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nama")}}</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $edit->Nm_ruang) }}">
                            @include('alerts.feedback', ['field' => 'nama'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label>{{__(" Lokasi")}}</label>
                      <input type="text" name="Lokasi" class="form-control" placeholder="Lokasi" value="{{ old('Lokasi', $edit->Lokasi) }}">
                      @include('alerts.feedback', ['field' => 'Lokasi'])
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
