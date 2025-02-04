@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'create rusak',
    'activePage' => 'rusak'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Create rusak")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('rusak.store') }}" autocomplete="off" enctype="multipart/form-data">
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
                                            Stok : {{$a->Stok}}
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
                            <label>{{__(" Jumlah")}}</label>
                            <input type="number" name="Jumlah" class="form-control {{ $errors->has('Jumlah') ? ' is-invalid' : '' }}" placeholder="Jumlah" value="{{ old('Jumlah') }}">
                            @include('alerts.feedback', ['field' => 'Jumlah'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Kerusakan")}}</label>
                            <input type="text" name="Kerusakan" class="form-control {{ $errors->has('Kerusakan') ? ' is-invalid' : '' }}" placeholder="Kerusakan" value="{{ old('Kerusakan') }}">
                            @include('alerts.feedback', ['field' => 'Kerusakan'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Peenanggung jawab")}}</label>
                            <input type="text" name="Penanggung_jawab" class="form-control {{ $errors->has('Penanggung_jawab') ? ' is-invalid' : '' }}" placeholder="Penanggung_jawab" value="{{ old('Penanggung_jawab') }}">
                            @include('alerts.feedback', ['field' => 'Penanggung_jawab'])
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
