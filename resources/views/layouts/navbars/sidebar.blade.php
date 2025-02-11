<div class="sidebar" data-color="dark-green">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->

  <div class="logo">
    <div class="logo-container" style="width: 100px; height: auto; margin-left: auto;  margin-right: auto;">
        <img src="{{ asset('assets/img/msj.png') }}" alt="">
    </div>
    <p class="simple-text logo-mini">
        {{ __('Welcome') }}
    </p>
    <p class="simple-text logo-normal">
      {{ __( Auth::user()->name) }}
    </p>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <hr class="sidebar-divider my-2" style="width:90% ;border: 1px solid white !important; opacity: 35%;margin-right: 0px;">

      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <hr class="sidebar-divider my-2" style="width:90% ;border: 1px solid white !important; opacity: 35%;margin-right: 0px;">
      <li>
        <a data-toggle="collapse" href="#User_management">
            <i class="fab fa-laravel"></i>
            <p>
                {{ __("Control") }}
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse show" id="User_management">
            <ul class="nav">
                <li class="@if ($activePage == 'profile') active @endif">
                    <a href="{{ route('profile.edit') }}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p> {{ __("User Profile") }} </p>
                    </a>
                </li>
                <li class="@if ($activePage == 'users') active @endif">
                    <a href="{{ route('user.index') }}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p> {{ __("User Management") }} </p>
                    </a>
                </li>
            </ul>
        </div>
      </li>
      <hr class="sidebar-divider my-2" style="width:90% ;border: 1px solid white !important; opacity: 35%;margin-right: 0px;">
      <li>
        <a data-toggle="collapse" href="#Master">
            <i class="fab fa-laravel"></i>
            <p>
                {{ __("Master") }}
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse show" id="Master">
            <ul class="nav">
                <li class="@if ($activePage == 'ruang') active @endif">
                    <a href="{{ route('ruang.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('Ruang') }}</p>
                    </a>
                  </li>
                  <li class="@if ($activePage == 'kategori') active @endif">
                    <a href="{{ route('kategori.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('Kategori') }}</p>
                    </a>
                  </li>
                  <li class="@if ($activePage == 'aset') active @endif">
                    <a href="{{ route('aset.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('Aset') }}</p>
                    </a>
                  </li>
            </ul>
        </div>
      </li>

      <hr class="sidebar-divider my-2" style="width:90% ;border: 1px solid white !important; opacity: 35%;margin-right: 0px;">
      <li>
        <a data-toggle="collapse" href="#Aset_management">
            <i class="fab fa-laravel"></i>
            <p>
                {{ __("Aset management") }}
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse show" id="Aset_management">
            <ul class="nav">
                <li class="@if ($activePage == 'penggunaan') active @endif">
                    <a href="{{ route('penggunaan.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('Penggunaan') }}</p>
                    </a>
                </li>
                <li class="@if ($activePage == 'rusak') active @endif">
                    <a href="{{ route('rusak.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('Rusak') }}</p>
                    </a>
                </li>
                <li class="@if ($activePage == 'maintenance') active @endif">
                    <a href="{{ route('maintenance.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('Maintenance') }}</p>
                    </a>
                </li>
                <li class="@if ($activePage == 'asetDihanguskan') active @endif">
                <a href="{{ route('asetDihanguskan.index','icons') }}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>{{ __('Penghapusan aset') }}</p>
                </a>
                </li>
            </ul>
        </div>
      </li>

      <hr class="sidebar-divider my-2" style="width:90% ;border: 1px solid white !important; opacity: 35%;margin-right: 0px;">
      <li>
        <a data-toggle="collapse" href="#Pemnjaman">
            <i class="fab fa-laravel"></i>
            <p>
                {{ __("Pemnjaman Aset") }}
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse show" id="Pemnjaman">
            <ul class="nav">
                <li class="@if ($activePage == 'peminjam') active @endif">
                    <a href="{{ route('peminjam.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('Peminjam') }}</p>
                    </a>
                </li>
                <li class="@if ($activePage == 'peminjaman') active @endif">
                    <a href="{{ route('peminjaman.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('peminjaman') }}</p>
                    </a>
                </li>
                <li class="@if ($activePage == 'pengembalian') active @endif">
                    <a href="{{ route('pengembalian.index','icons') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>{{ __('pengembalian') }}</p>
                    </a>
                </li>
            </ul>
        </div>
      </li>

      {{-- <hr class="sidebar-divider my-2" style="width:90% ;border: 1px solid white !important; opacity: 35%;margin-right: 0px;">

      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>
