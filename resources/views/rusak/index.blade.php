@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'rusak',
    'activePage' => 'rusak'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('rusak.create') }}">Add kerusakan</a>
            <h4 class="card-title">Rusak</h4>
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
                  <th>Nama aset</th>
                  <th>Merek aset</th>
                  <th>Jumlah aset</th>
                  <th>Stok</th>
                  <th>Jumlah Rusak</th>
                  <th>Penanggung jawab</th>
                  <th>Kerusakan</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rusak as $r)
                    <tr>
                        <td>
                            {{$r->Rusak_id}}
                        </td>
                        @foreach ($aset as $a)
                            @if ($r->Aset_id == $a->Aset_id)
                                <td>
                                    {{$a->Nama_Aset}}
                                </td>
                                <td>
                                    {{$a->Merek_Aset}}
                                </td>
                                <td>
                                    {{$a->Jml_aset}}
                                </td>
                                <td>
                                    {{$a->Stok}}
                                </td>
                                <td>
                                    {{$r->Jumlah}}
                                </td>
                                <td>
                                    {{$r->Penanggung_jawab}}
                                </td>
                                <td>
                                    {{$r->Keruskan}}
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <form method="GET" action="{{route('aset.show',str_pad($a->Aset_id, 11, '0', STR_PAD_LEFT))}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info" style="width: 12em;">Detail aset</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="GET" action="{{route('rusak.edit',$r->Rusak_id)}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('rusak.destroy',$r->Rusak_id)}}" onsubmit="return hapus()">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                @break
                            @endif
                        @endforeach
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
