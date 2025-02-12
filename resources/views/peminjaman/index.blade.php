@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'peminjaman',
    'activePage' => 'peminjaman'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('peminjaman.create') }}">Add peminjaman</a>
            <h4 class="card-title">Peminjaman</h4>
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
                  <th>Nama Peminjam</th>
                  <th>No Hp</th>
                  <th>Tanggal pinjam</th>
                  <th>Tanggal harus kembali</th>
                  <th>Jumlah pinjam</th>
                  <th>Belum Kembali</th>
                  <th>Infaq</th>
                  <th>Nama aset</th>
                  <th>Merek aset</th>
                  <th>Pembuat</th>
                  <th>Dibuat</th>
                  <th>Editor</th>
                  <th>Diubah</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $peminjaman as $p)
                    <tr>
                        <td>
                            {{$p->Pinjam_id}}
                        </td>
                        @foreach ($peminjam as $pm)
                            @if ($p->Peminjam_id == $pm->Peminjam_id)
                                <td>
                                    {{$pm->Nama_peminjam}}
                                </td>
                                <td>
                                    {{$pm->No_HP}}
                                </td>
                                @break
                            @endif
                        @endforeach
                        <td>
                            {{$p->Tgl_pinjam}}
                        </td>
                        <td>
                            {{$p->Tgl_harus_kembali}}
                        </td>
                        @foreach ($detil_pinjam as $dp)
                            @if ($dp->Pinjam_id==$p->Pinjam_id )
                                <td>
                                    {{$dp->Jml_pinjam}}
                                </td>
                                <td>
                                    {{$dp->Belum_kembali}}
                                </td>
                                <td>
                                    {{$dp->Infaq}}
                                </td>
                                @foreach ($aset as $a)
                                    @if ($dp->Aset_id == $a->Aset_id)
                                        <td>
                                            {{$a->Nama_Aset}}
                                        </td>
                                        <td>
                                            {{$a->Merek_Aset}}
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
                                              </tr>
                                            </table>
                                          </td>
                                        @break
                                    @endif
                                @endforeach
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
