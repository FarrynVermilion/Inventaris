@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'peminjam',
    'activePage' => 'peminjam'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('peminjam.create') }}">Add peminjam</a>
            <h4 class="card-title">Peminjam</h4>
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
                  <th>Nama peminjam</th>
                  <th>NO HP</th>
                  <th>Pembuat</th>
                  <th>Dibuat</th>
                  <th>Editor</th>
                  <th>Diubah</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $peminjam as $p)
                    <tr>
                        <td>
                            {{$p->Peminjam_id}}
                        </td>
                        <td>
                            {{$p->Nama_peminjam}}
                        </td>
                        <td>
                            {{$p->No_HP}}
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
                                    <form method="GET" action="{{route('peminjam.show',$p->Peminjam_id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-info" style="width: 12em;">Detail aset</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="GET" action="{{route('peminjam.edit',$p->Peminjam_id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="width: 12em;">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('peminjam.destroy',$p->Peminjam_id)}}" onsubmit="return hapus()">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger" style="width: 12em;">Hapus log</button>
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
