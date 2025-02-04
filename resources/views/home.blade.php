@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home'
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Pembuatan laporan</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                  <tr>
                    <td class="text-center w-25">
                        <a class="btn btn-primary btn-round text-white" href="{{route('asetPDF')}}">Laporan aset</a>
                    </td>
                    <td class="text-center w-25">
                        <a class="btn btn-primary btn-round text-white" href="{{route('tidakDigunakanPDF')}}">Laporan aset tidak digunakan</a>
                    </td>
                    <td class="text-center w-25">
                        <a class="btn btn-primary btn-round text-white" href="{{route('rusakPDF')}}">Laporan aset rusak</a>
                    </td>
                    <td class="text-center w-25">
                        <a class="btn btn-primary btn-round text-white" href="{{route('musnahPDF')}}">Laporan aset musnah</a>
                    </td>
                  </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
    });
  </script>
@endpush
