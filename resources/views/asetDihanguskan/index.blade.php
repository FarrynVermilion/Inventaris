@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => ' penghapusan aset',
    'activePage' => 'asetDihanguskan'
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('asetDihanguskan.create') }}">Add aset dihapuskan</a>
            <h4 class="card-title">Penghapusan</h4>
            <div class="col-12 mt-2"></div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            @csrf
            @include('alerts.errors')
            @include('alerts.success')
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Tanggal pembuatan</th>
                  <th>Deskripsi</th>
                  <th>Tanggal penghapusan</th>
                  <th>Status</th>
                  <th>Jumlah dihapus</th>
                  <th>File</th>
                  <th>Foto</th>
                  <th>Nama aset</th>
                  <th>Pembuat</th>
                  <th>Dibuat</th>
                  <th>Editor</th>
                  <th>Diubah</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($aset_dihanguskan as $ad)
                    <tr>
                        <td>
                            {{$ad->Tgl_dihanguskan}}
                        </td>
                        <td>
                            {{$ad->Deskripsi}}
                        </td>
                        @foreach ($penghapusan_aset as $pa)
                            @if ($pa->penghapusan_id == $ad->penghapusan_id)
                                <td>{{$pa->Tgl_penghapusan}}</td>
                                <td>{{$pa->Status_penghapusan	}}</td>
                                <td>{{$pa->Jml_dihapus}}</td>
                                <td>
                                    <a href="{!! route('download', $pa->Upload_File) !!}">{{$pa->Upload_File}}</a>
                                </td>
                                <td>
                                    <a href="{!! route('download', $pa->Upload_Foto) !!}">{{$pa->Upload_Foto}}</a>
                                </td>
                                @foreach ($aset as $a)
                                    @if ($a->Aset_id== $pa->Aset_id)
                                        <td>{{$a->Nama_Aset}}</td>
                                        @foreach ($user as $u)
                                            @if ($u->id == $pa->created_by)
                                                <td>{{$u->name}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                        <td>{{$pa->created_at}}</td>
                                        @foreach ($user as $u)
                                            @if ($u->id == $pa->updated_by)
                                                <td>{{$u->name}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                        <td>{{$pa->updated_at}}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <form method="GET" action="{{route('aset.show',str_pad($pa->Aset_id, 11, '0', STR_PAD_LEFT))}}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-info" style="width: 12em;">Detail data</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        @break
                                    @endif
                                @endforeach
                                @break
                            @endif
                        @endforeach
                        <td>
                            <form method="POST" action="{{route('asetDihanguskan.destroy',$ad->dihanguskan_id)}}" onsubmit="return hapus()">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
@endsection

@push('js')
<script>
    function hapus(){
        if(confirm("Anda yakin akan menghapus")){
            return true;
        }else{
            return false;
        }
    }
</script>
@endpush
