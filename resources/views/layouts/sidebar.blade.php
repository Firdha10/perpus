<ul class="nav">
  <li class="menu-header">Menu Utama</li>
  <li class="nav-item {{ setActive(['/', 'home']) }}"> 
    <a class="nav-link" href="{{url('/home')}}">
      <i class="menu-icon mdi mdi-television"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  @if(Auth::user()->level == 'admin')
    <li class="menu-header">Master</li>
    <li class="nav-item {{ setActive(['user*']) }}"> 
      <a class="nav-link" href="{{route('user.index')}}">
        <i class="menu-icon mdi mdi-account"></i>
        <span class="menu-title">Data User</span>
      </a>
    </li>
    <li class="nav-item {{ setActive(['anggota*']) }}"> 
      <a class="nav-link" href="{{route('anggota.index')}}">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Data Anggota</span>
      </a>
    </li>
    <li class="nav-item {{ setActive(['buku*']) }}"> 
      <a class="nav-link" href="{{route('buku.index')}}">
        <i class="menu-icon mdi mdi-book"></i>
        <span class="menu-title">Data Buku</span>
      </a>
    </li>
    <li class="nav-item {{ setActive(['pengarang*']) }}"> 
      <a class="nav-link" href="{{route('pengarang.index')}}">
        <i class="menu-icon mdi mdi-rename-box"></i>
        <span class="menu-title">Data Pengarang</span>
      </a>
    </li>
    <li class="nav-item {{ setActive(['penerbit*']) }}"> 
      <a class="nav-link" href="{{route('penerbit.index')}}">
        <i class="menu-icon mdi mdi-human-child"></i>
        <span class="menu-title">Data Penerbit</span>
      </a>
    </li>
    <li class="nav-item {{ setActive(['jenis']) }}"> 
      <a class="nav-link" href="{{route('jenis.index')}}">
        <i class="menu-icon mdi mdi-book-open"></i>
        <span class="menu-title">Data Jenis Buku</span>
      </a>
    </li>
    <li class="nav-item {{ setActive(['rak*']) }}"> 
      <a class="nav-link" href="{{route('rak.index')}}">
        <i class="menu-icon mdi mdi-locker"></i>
        <span class="menu-title">Data Rak</span>
      </a>
    </li>
  @endif
  <li class="menu-header">Peminjaman</li>
  <li class="nav-item {{ setActive(['peminjaman*']) }}">
    <a class="nav-link" href="{{route('peminjaman.index')}}">
      <i class="menu-icon mdi mdi-cash"></i>
      <span class="menu-title">Data Peminjaman</span>
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
        <li class="nav-item">
          <a class="nav-link" href="{{url('laporan/buku')}}">Laporan Buku</a>
        </li>
      </ul>
    </div>
  </li>
</ul>