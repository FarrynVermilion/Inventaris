@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'create lokasi',
    'activePage' => 'ruang'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Create Lokasi")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('ruang.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row"><div class="col-md-7 pr-1">
                <div class="form-group">
                            <label>{{__(" Nama")}}</label>
                                <input type="text" name="Nama" class="form-control {{ $errors->has('Nama') ? ' is-invalid' : '' }}" placeholder="Nama" value="{{ old('Nama') }}">
                                @include('alerts.feedback', ['field' => 'Nama'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Lokasi")}}</label>
                            <input type="text" name="Lokasi" class="form-control {{ $errors->has('Lokasi') ? ' is-invalid' : '' }}" placeholder="Lokasi" value="{{ old('Lokasi') }}">
                            @include('alerts.feedback', ['field' => 'Lokasi'])
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
