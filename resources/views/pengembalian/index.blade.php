@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'pengembalian',
    'activePage' => 'pengembalian'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('pengembalian.create') }}">Add pengembalian</a>
            <h4 class="card-title">Pengembalian</h4>
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
                  <th>Terima</th>
                  <th>Status kembali</th>
                  <th>Kembali</th>
                  <th>Tanggal kembali</th>
                  <th>Tanggal pinjam</th>
                  <th>Tanggal harus kembali</th>
                  <th>belum kembali</th>
                  <th>Jumlah pinjam</th>
                  <th>Peminjam</th>
                  <th>NO HP</th>
                  <th>Infaq</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $pengembalian as $p)
                    <tr>
                        <td>
                            {{$p->Kembali_id}}
                        </td>
                        @foreach ($detil_kembali as $dk)
                            @if ($dk->Kembali_id==$p->Kembali_id)
                                <td>{{$dk->Penerima}}</td>
                                <td>
                                    {{$dk->Status_kembali}}
                                </td>
                                <td>
                                    {{$dk->Jml_kembali}}
                                </td>
                                @break
                            @endif
                        @endforeach
                        <td>
                            {{$p->Tgl_kembali}}
                        </td>
                        @foreach ($peminjaman as $pmjn)
                            @if ($pmjn->Pinjam_id == $p->Pinjam_id)
                                <td>
                                    {{$pmjn->Tgl_pinjam}}
                                </td>
                                <td>
                                    {{$pmjn->Tgl_harus_kembali}}
                                </td>
                                @foreach ($detil_pinjam as $dp)
                                    @if ($dp->Pinjam_id==$pmjn->Pinjam_id )
                                        <td>
                                            {{$dp->Belum_kembali}}
                                        </td>
                                        <td>
                                            {{$dp->Jml_pinjam}}
                                        </td>
                                        @foreach ($peminjam as $pmj)
                                            @if ($pmj->Peminjam_id == $pmjn->Peminjam_id)
                                                <td>
                                                    {{$pmj->Nama_peminjam}}
                                                </td>
                                                <td>
                                                    {{$pmj->No_HP}}
                                                </td>
                                                <td>{{$dp->Infaq}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                        @foreach ($aset as $a)
                                        @if ($dp->Aset_id == $a->Aset_id)
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
