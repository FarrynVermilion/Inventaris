@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'maintenance',
    'activePage' => 'maintenance'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('maintenance.create') }}">Add maintenance</a>
            <h4 class="card-title">Maintenance</h4>
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
                  <th>ID </th>
                  <th>Tanggal maintenance</th>
                  <th>Jenis maintenance	</th>
                  <th>Deskripsi</th>
                  <th>Biaya</th>
                  <th>Nama teknisi</th>
                  <th>Nama aset</th>
                  <th>Jumlah</th>
                  <th>Pembuat</th>
                  <th>Dibuat</th>
                  <th>Editor</th>
                  <th>Diubah</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $maintenance as $m)
                    <tr>
                        <td>
                            {{$m->maintenance_id}}
                        </td>
                        <td>
                            {{$m->Tgl_maintenance}}
                        </td>
                        <td>
                            {{$m->Jenis_maintenance}}
                        </td>
                        <td>
                            {{$m->Deskripsi}}
                        </td>
                        <td>
                            {{$m->Biaya}}
                        </td>
                        <td>
                            {{$m->Nm_teknisi}}
                        </td>
                        @foreach ($aset as $a)
                            @if ($m->Aset_id == $a->Aset_id)
                                <td>
                                    {{$a->Nama_Aset}}
                                    @break
                                </td>
                            @endif
                        @endforeach
                        <td>
                            {{$m->Jumlah}}
                        </td>

                        @foreach ($user as $u)
                            @if ($u->id == $m->created_by)
                                <td>{{$u->name}}</td>
                                @break
                            @endif
                        @endforeach
                        <td>{{$m->created_at}}</td>
                        @foreach ($user as $u)
                            @if ($u->id == $m->updated_by)
                                <td>{{$u->name}}</td>
                                @break
                            @endif
                        @endforeach
                        <td>{{$m->updated_at}}</td>
                        <td>
                          <table>
                            <tr>
                                <td>
                                    <form method="GET" action="{{route('aset.show',$m->Aset_id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-info" style="width: 12em;">Detail aset</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="GET" action="{{route('maintenance.edit',$m->maintenance_id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="width: 12em;">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('maintenance.destroy',$m->maintenance_id)}}" onsubmit="return hapus()">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger" style="width: 12em;">Hapsu log</button>
                                    </form>
                                </td>
                            </tr>
                          </table>
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
