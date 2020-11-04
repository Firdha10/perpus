<ul class="nav">
          <!-- <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                @if(Auth::user()->gambar == '')

                  <img src="{{asset('images/user/default.png')}}" alt="profile image">
                @else

                  <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li> -->
          <li class="menu-header">Menu Utama</li>
          <li class="nav-item {{ setActive(['/', 'home']) }}"> 
            <a class="nav-link" href="{{url('/')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->level == 'admin')
            <li class="menu-header">Master</li>
            <li class="nav-item {{ setActive(['anggota*']) }}"> 
              <a class="nav-link" href="{{route('anggota.index')}}">
                <i class="menu-icon mdi mdi-account-box"></i>
                <span class="menu-title">Data Anggota</span>
              </a>
            </li>
            <li class="nav-item {{ setActive(['buku*']) }}"> 
              <a class="nav-link" href="{{route('buku.index')}}">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Data Buku</span>
              </a>
            </li>
            <li class="nav-item {{ setActive(['user*']) }}"> 
              <a class="nav-link" href="{{route('user.index')}}">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Data User</span>
              </a>
            </li>
            <li class="nav-item {{ setActive(['jurusan*']) }}"> 
              <a class="nav-link" href="{{route('jurusan.index')}}">
                <i class="menu-icon mdi mdi-note"></i>
                <span class="menu-title">Data Jurusan</span>
              </a>
            </li>
            <li class="nav-item {{ setActive(['rak*']) }}"> 
              <a class="nav-link" href="{{route('rak.index')}}">
                <i class="menu-icon mdi mdi-locker"></i>
                <span class="menu-title">Data Rak</span>
              </a>
            </li>
          @endif
          <li class="menu-header">Transaksi</li>
          <li class="nav-item {{ setActive(['transaksi*']) }}">
            <a class="nav-link" href="{{route('transaksi.index')}}">
              <i class="menu-icon mdi mdi-cash"></i>
              <span class="menu-title">Data Transaksi</span>
            </a>
          </li>
          <li class="menu-header">Laporan</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/trs')}}">Laporan Transaksi</a>
                </li>
                <!--
                <li class="nav-item">
                  <a class="nav-link" href="">Laporan Anggota</a>
                </li>
                -->
                 <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/buku')}}">Laporan Buku</a>
                </li>
              </ul>
            </div>
          </li>
         
        </ul>