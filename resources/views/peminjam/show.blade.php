@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Show peminjam',
    'activePage' => 'peminjam'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Detail peminjam")}}</h5>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" Nama peminjam")}}</label>
                        <p>{{ $peminjam->Nama_peminjam }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <label>{{__(" No HP")}}</label>
                        <p>{{ $peminjam->No_HP }}</p>
                    </div>
                </div>
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">{{__('Kembali')}}</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
