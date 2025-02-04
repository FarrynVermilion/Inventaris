@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'create pengembalian',
    'activePage' => 'pengembalian'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Create pengembalian")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('pengembalian.store') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.errors')
              @include('alerts.success')
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Pilih aset peminajaman")}}</label>
                            <select name="Pinjam_id" class="form-control {{ $errors->has('Pinjam_id') ? ' is-invalid' : '' }}">
                                @foreach ($peminjaman as $pmjn)
                                    <option value="{{$pmjn->Pinjam_id}}" {{old('Pinjam_id') == $pmjn->Pinjam_id ? 'selected' : ''}}>
                                        @foreach ($peminjam as $pmj)
                                            @if ($pmj->Peminjam_id==$pmjn->Peminjam_id)
                                                Peminjam : {{$pmj->Nama_peminjam}} |
                                                NO HP : {{$pmj->No_HP}} |
                                                @break
                                            @endif
                                        @endforeach
                                        @foreach ($detil_pinjam as $dp)
                                            @if ($dp->Pinjam_id==$pmjn->Pinjam_id)
                                                @foreach ($aset as $a)
                                                    @if ($dp->Aset_id==$a->Aset_id)
                                                        Nama : {{$a->Nama_Aset}} |
                                                        Merek : {{$a->Merek_Aset}} |
                                                        @break
                                                    @endif
                                                @endforeach
                                                Jumlah pinjam : {{$dp->Jml_pinjam}} |
                                                Belum Kembali : {{$dp->Belum_kembali}}
                                                Infaq : {{$dp->Infaq}} |
                                                @break
                                            @endif
                                        @endforeach
                                        Tanggal pinjam : {{$pmjn->Tgl_pinjam}} |
                                        Tanggal Harus kembali : {{$pmjn->Tgl_harus_kembali}}
                                    </option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'Pinjam_id'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal kembali")}}</label>
                            <input type="date" name="Tgl_kembali" class="form-control {{ $errors->has('Tgl_kembali') ? ' is-invalid' : '' }}" placeholder="Tanggal kembali" value="{{ old('Tgl_kembali') }}">
                            @include('alerts.feedback', ['field' => 'Tgl_kembali'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Jumlah kembali")}}</label>
                            <input type="number" name="Jml_kembali" class="form-control {{ $errors->has('Jml_kembali') ? ' is-invalid' : '' }}" placeholder="Jumlah kembali" value="{{ old('Jml_kembali') }}">
                            @include('alerts.feedback', ['field' => 'Jml_kembali'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Status kembali")}}</label>
                            <input type="text" name="Status_kembali" class="form-control {{ $errors->has('Status_kembali') ? ' is-invalid' : '' }}" placeholder="Status kembali" value="{{ old('Status_kembali') }}">
                            @include('alerts.feedback', ['field' => 'Status_kembali'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Penerima")}}</label>
                            <input type="text" name="Penerima" class="form-control {{ $errors->has('Penerima') ? ' is-invalid' : '' }}" placeholder="Penerima" value="{{ old('Penerima') }}">
                            @include('alerts.feedback', ['field' => 'Penerima'])
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
