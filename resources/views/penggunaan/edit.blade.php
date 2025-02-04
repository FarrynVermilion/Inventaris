@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit penggunaan',
    'activePage' => 'penggunaan',
    'activeNav' => '',
])
@section('content')
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Penggunaan")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('penggunaan.update',$edit->Penggunaan_id ) }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
              @method('PUT')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>{{__(" Untuk")}}</label>
                        <input type="text" name="Untuk" class="form-control" placeholder="Untuk" value="{{ old('Untuk', $edit->Untuk) }}">
                        @include('alerts.feedback', ['field' => 'Untuk'])
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
