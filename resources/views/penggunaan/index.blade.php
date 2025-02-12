@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'penggunaan',
    'activePage' => 'penggunaan'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('penggunaan.create') }}">Add penggunaan</a>
            <h4 class="card-title">Penggunaan</h4>
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
                  <th>Aset tersedia</th>
                  <th>Untuk</th>
                  <th>Jumlah digunakan</th>
                  <th>Pembuat</th>
                  <th>Dibuat</th>
                  <th>Editor</th>
                  <th>Diubah</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($penggunaan as $p)
                    <tr>
                        <td>
                            {{$p->Penggunaan_id}}
                        </td>
                        @foreach ($aset as $a)
                            @if ($p->Aset_id == $a->Aset_id)
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
                                    {{$p->Untuk}}
                                </td>
                                <td>
                                    {{$p->Jumlah}}
                                </td>

                                @foreach ($user as $u)
                                    @if ($u->id == $p->created_by)
                                        <td>{{$u->name}}</td>
                                        @break
                                    @endif
                                @endforeach
                                <td>{{$p->created_at}}</td>
                                @foreach ($user as $u)
                                    @if ($u->id == $p->updated_by)
                                        <td>{{$u->name}}</td>
                                        @break
                                    @endif
                                @endforeach
                                <td>{{$p->updated_at}}</td>
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
                                                <form method="GET" action="{{route('penggunaan.edit',$p->Penggunaan_id)}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('penggunaan.destroy',$p->Penggunaan_id)}}" onsubmit="return hapus()">
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
