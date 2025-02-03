@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit peminjam',
    'activePage' => 'peminjam',
    'activeNav' => '',
])
@section('content')
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit peminjam")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('peminjam.update',$edit->Peminjam_id) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              @method('PUT')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nama peminjam")}}</label>
                            <input type="text" name="Nama_peminjam" class="form-control" value="{{ $edit->Nama_peminjam}}">
                            @include('alerts.feedback', ['field' => 'Nama_peminjam'])
                        </div>
                        <div class ="form-group">
                            <label>{{__(" No HP")}}</label>
                            <input type="tel" name="No_HP" class="form-control" value="{{ old('No_HP', $edit->No_HP) }}">
                            @include('alerts.feedback', ['field' => 'No_HP'])
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
