@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit rusak',
    'activePage' => 'rusak',
    'activeNav' => '',
])
@section('content')
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Kerusakan")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('rusak.update',$edit->Rusak_id ) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              @method('PUT')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Kerusakan")}}</label>
                        <input type="text" name="Kerusakan" class="form-control" placeholder="Kerusakan" value="{{ old('Kerusakan', $edit->Kerusakan) }}">
                        @include('alerts.feedback', ['field' => 'Kerusakan'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Penanggung jawab")}}</label>
                        <input type="text" name="Penanggung_jawab" class="form-control" placeholder="Penanggung_jawab" value="{{ old('Penanggung_jawab', $edit->Penanggung_jawab) }}">
                        @include('alerts.feedback', ['field' => 'Penanggung_jawab'])
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
