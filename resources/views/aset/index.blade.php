@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'aset',
    'activePage' => 'aset'
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('aset.create') }}">Add aset</a>
            <h4 class="card-title">Aset</h4>
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
                  <th>Nama Aset</th>
                  <th>Jumlah aset</th>
                  <th>Stok</th>
                  <th>Kategori</th>
                  <th>Ruang</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $Aset as $a)
                    <tr>
                        <td>
                            {{$a->Aset_id}}
                        </td>
                        <td>
                            {{$a->Nama_Aset}}
                        </td>
                        <td>
                            {{$a->Jml_aset}}
                        </td>
                        <td>
                            {{$a->Stok}}
                        </td>
                        <td>
                            @foreach ($Kategori as $k)
                                @if ($a->Kategori_id == $k->Kategori_id)
                                    {{$k->Nama_kategori}}
                                    @break
                                @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($Ruang as $r)
                                @if ($a->Ruang_id == $r->Ruang_id)
                                    {{$r->Nm_ruang}}
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <form method="GET" action="{{route('aset.show',$a->Aset_id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-info" style="width: 12em;">Detail data</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="GET" action="{{route('aset.edit',$a->Aset_id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-warning" style="width: 12em;">Edit data</button>
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
