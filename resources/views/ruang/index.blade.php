@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Lokasi',
    'activePage' => 'ruang'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('ruang.create') }}">Add Lokasi</a>
            <h4 class="card-title">Lokasi</h4>
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
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Lokasi</th>
                  <th>Pembuat</th>
                  <th>Dibuat</th>
                  <th>Editor</th>
                  <th>Diubah</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $Ruang as $r)
                    <tr>
                        <td>
                            {{$r->Ruang_id}}
                        </td>
                        <td>
                            {{$r->Nm_ruang}}
                        </td>
                        <td>
                            {{$r->Lokasi}}
                        </td>
                        @foreach ($user as $u)
                            @if ($u->id == $r->created_by)
                                <td>{{$u->name}}</td>
                                @break
                            @endif
                        @endforeach
                        <td>{{$r->created_at}}</td>
                        @foreach ($user as $u)
                            @if ($u->id == $r->updated_by)
                                <td>{{$u->name}}</td>
                                @break
                            @endif
                        @endforeach
                        <td>{{$r->updated_at}}</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <form method="GET" action="{{route('ruang.edit',$r->Ruang_id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('ruang.destroy',$r->Ruang_id)}}" onsubmit="return hapus()">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
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
