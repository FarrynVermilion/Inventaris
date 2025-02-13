@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'users',
    'activePage' => 'users'
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            @if (Auth::user()->role == 'Super_user')
                <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('register') }}">Add user</a>
            @endif
            <h4 class="card-title">Users</h4>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Creation date</th>
                  <th class="disabled-sorting text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $users as $user)
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->created_at}}
                        </td>
                        <td>
                            @if (Auth::user()->role == 'Super_user')
                            <table>
                                <tr->
                                    <td>
                                        <form method="GET" action="{{route('user.edit',$user->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="GET" action="{{route('user.destroy',$user->id)}}" onsubmit="return hapus()">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr->
                            </table>
                            @endif
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
