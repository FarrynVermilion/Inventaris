@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'create maintenance',
    'activePage' => 'maintenance'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Create Peminjam")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('peminjam.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nama_peminjam")}}</label>
                            <input type="text" name="Nama_peminjam" class="form-control {{ $errors->has('Nama_peminjam') ? ' is-invalid' : '' }}" placeholder="Nama peminjam" value="{{ old('Nama_peminjam') }}">
                            @include('alerts.feedback', ['field' => 'Nama_peminjam'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(key: " No HP")}}</label>
                            <input type="tel" name="No_HP" class="form-control {{ $errors->has('No_HP') ? ' is-invalid' : '' }}" placeholder="No HP" value="{{ old('No_HP') }}">
                            @include('alerts.feedback', ['field' => 'No_HP'])
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
