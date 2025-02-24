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
            <div class="card-body">
                <form method="GET" action="{{ route('asetPDF') }}" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  @include('alerts.errors')
                  @include('alerts.success')
                  <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal awal")}}</label>
                            <input type="date" name="tgl_awal" class="form-control">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal akhir")}}</label>
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Kategori")}}</label>
                            <select name="kategori" id="kategori" class="form-control" onclick="fungsiNama(this)">
                                <option value="" selected="selected" >Pilih kategori</option>
                                <option value="%">Select all</option>
                                @foreach ($kategori as $k)
                                    <option value="{{$k->Kategori_id}}">{{$k->Nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" nama")}}</label>
                            <select name="nama" id="nama" class="form-control" onclick="fungsiModel(this)"">
                                <option value="" selected="selected" >Pilih kategori dulu</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Model")}}</label>
                            <select name="model" id="model" class="form-control">
                                <option value="" selected="selected" >Pilih nama dulu</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                  </div>
                </form>
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
  <script>
    function removeOptions(selectElement) {
        var i, L = selectElement.options.length - 1;
        for (i = L; i >= 0; i--) {
            selectElement.remove(i);
        }
    }
    function fungsiNama(pilihan){
        const select = document.getElementById('nama');
        const model = document.getElementById('model');
        removeOptions(select);
        removeOptions(model);
        if(pilihan.value != "%"){
            let aset = {!! json_encode($aset->toArray(), JSON_HEX_TAG) !!};
            let a=new Set([]);
            for (let i = 0; i < aset.length; i++) {
                if(aset[i].Kategori_id == pilihan.value){
                    a.add(aset[i].Nama_Aset);
                }
            }
            a = Array.from(a);
            for (let i = 0; i < a.length; i++) {
                let option = document.createElement("option");
                option.text = a[i];
                option.value = a[i];
                select.add(option);
            }
        }
        let option = document.createElement("option");
        option.text = "Select all";
        option.value = "%";
        select.add(option);

        let option2 = document.createElement("option");
        option2.text = "Select all";
        option2.value = "%";
        model.add(option2);

    }
    function fungsiModel(pilihan){
        const select = document.getElementById('model');
        removeOptions(select);
        if(pilihan.value != "%"){
            let aset = {!! json_encode($aset->toArray(), JSON_HEX_TAG) !!};
            let a=new Set([]);
            const kategori =document.getElementById('kategori').value;
            for (let i = 0; i < aset.length; i++) {
                if(aset[i].Kategori_id == kategori && aset[i].Nama_Aset == pilihan.value){
                    a.add(aset[i].Model);
                }
            }
            a = Array.from(a);
            for (let i = 0; i < a.length; i++) {
                let option = document.createElement("option");
                option.text = a[i];
                option.value = a[i];
                select.add(option);
            }
        }
        let option = document.createElement("option");
        option.text = "Select all";
        option.value = "%";
        select.add(option);
    }

  </script>
@endpush
