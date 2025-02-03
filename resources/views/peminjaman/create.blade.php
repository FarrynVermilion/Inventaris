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
            <h5 class="title">{{__(" Create Peminjaman")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('peminjaman.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
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
                            <label>{{__(" Pilih peminjam")}}</label>
                            <select name="Peminjam_id" class="form-control {{ $errors->has('Peminjam_id') ? ' is-invalid' : '' }}">
                                @foreach ($peminjam as $p)
                                    <option value="{{$p->Peminjam_id}}" {{old('Peminjam_id') == $p->Peminjam_id ? 'selected' : ''}}>
                                        Nama : {{$p->Nama_peminjam}} |
                                        No HP : {{$p->No_HP}}
                                    </option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'Peminjam_id'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Jumlah")}}</label>
                            <input type="number" name="Jml_pinjam" class="form-control {{ $errors->has('Jml_pinjam') ? ' is-invalid' : '' }}" placeholder="Jumlah pinjam" value="{{ old('Jml_pinjam') }}">
                            @include('alerts.feedback', ['field' => 'Jml_pinjam'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Infaq")}}</label>
                            <input type="number" name="Infaq" class="form-control {{ $errors->has('Infaq') ? ' is-invalid' : '' }}" placeholder="Infaq" value="{{ old('Infaq') }}">
                            @include('alerts.feedback', ['field' => 'Infaq'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal pinjam")}}</label>
                            <input type="date" name="Tgl_pinjam" class="form-control {{ $errors->has('Tgl_pinjam') ? ' is-invalid' : '' }}" placeholder="Tanggal pinjam" value="{{ old('Tgl_pinjam') }}">
                            @include('alerts.feedback', ['field' => 'Tgl_pinjam'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal harus kembali")}}</label>
                            <input type="date" name="Tgl_harus_kembali" class="form-control {{ $errors->has('Tgl_harus_kembali') ? ' is-invalid' : '' }}" placeholder="Tanggal harus kembali" value="{{ old('Tgl_harus_kembali') }}">
                            @include('alerts.feedback', ['field' => 'Tgl_harus_kembali'])
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
