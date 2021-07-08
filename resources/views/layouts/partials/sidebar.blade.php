<div class="slimscroll-menu">

  <!-- User box -->
  <div class="user-box text-center">
      <img src="{{asset('images/users/admin.jpg')}}" alt="user-img" title="Mat Helme"
          class="rounded-circle img-thumbnail avatar-md">
      <div class="dropdown">
          <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
              aria-expanded="false">Admin</a>
          <div class="dropdown-menu user-pro-dropdown">

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="fe-user mr-1"></i>
                  <span>My Account</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="fe-log-out mr-1"></i>
                  <span>Logout</span>
              </a>

          </div>
      </div>
      <p class="text-muted">Admin Head</p>
      <ul class="list-inline">
          <li class="list-inline-item">
              <a href="#" class="text-muted">
                  <i class="mdi mdi-cog"></i>
              </a>
          </li>

          <li class="list-inline-item">
              <a href="#">
                  <i class="mdi mdi-power"></i>
              </a>
          </li>
      </ul>
  </div>

  <!--- Sidemenu -->
  <div id="sidebar-menu">

      <ul class="metismenu" id="side-menu">
        @if (Request::is('admin/*'))
            <li class="menu-title">Menu Utama</li>
            <li>
                <a href="{{route('admin.home')}}">
                    <i class="mdi mdi-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-database"></i>
                    <span> Data Master </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{route('admin.tahun-ajaran')}}">
                    <i class="mdi mdi-folder-open"></i>
                    <span>Tahun Ajaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.mata-pelajaran')}}">
                    <i class="mdi mdi-folder-open"></i>
                    <span>Mata Pelajaran</span>
                </a>
                </li>
                <li>
                    <a href="{{route('admin.kelas')}}">
                    <i class="mdi mdi-folder-open"></i>
                    <span>Kelas / Jurusan</span>
                    </a>
                </li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-account-group"></i>
                    <span> Manajemen Data Guru </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{route('admin.jabatan')}}">
                    <i class="mdi mdi-folder-open"></i>
                    <span>Data Jabatan</span>
                </a>
                </li>
                <li>
                    <a href="{{route('admin.kepegawaian')}}">
                    <i class="mdi mdi-folder-open"></i>
                    <span>Data Status Kepegawaiaan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.guru')}}">
                        <i class="mdi mdi-account-group"></i>
                        <span> Input Data Guru </span>
                    </a>
                </li>
                </ul>
            </li>
            <li>
            <a href="{{route('admin.agenda')}}">
                <i class="mdi mdi-calendar"></i>
                <span> History Jurnal Mengajar </span>
            </a>
            </li>
            {{-- <li>
            <a href="{{route('admin.berkas')}}">
                <i class="mdi mdi-calendar-month-outline"></i>
                <span> Bank Jurnal Mengajar </span>
            </a>
            </li> --}}
            <li>
            <a href="{{route('admin.pengguna')}}">
                <i class="mdi mdi-account"></i>
                <span> Manajemen Data User </span>
            </a>
            </li>
        @elseif(Request::is('guru/*'))
            <li class="menu-title">Menu Utama</li>
            <li>
                <a href="{{route('guru.home')}}">
                    <i class="mdi mdi-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="{{route('guru.ganti')}}">
                    <i class="mdi mdi-sync"></i>
                    <span> Ganti Password </span>
                </a>
            </li>
            <li class="menu-title">Data Jurnal Mengajar</li>
            
            <li>
            <a href="{{route('guru.mata-pelajaran')}}">
                <i class="mdi mdi-book"></i>
                <span> Mata Pelajaran </span>
            </a>
            </li>
            <li>
            <a href="{{route('guru.agenda')}}">
                <i class="mdi mdi-calendar"></i>
                <span> Jurnal Mengajar Pengajaran </span>
            </a>
            </li>
            <li>
            <a href="{{route('guru.berkas')}}">
                <i class="mdi mdi-folder-open"></i>
                <span> File Pengajaran </span>
            </a>
            </li>
            <li>
            <a href="{{route('guru.lain')}}">
                <i class="mdi mdi-calendar"></i>
                <span> Kegiatan Lainnya </span>
            </a>
            </li>
            <li>
                <a href="{{route('guru.laporan')}}">
                    <i class="mdi mdi-file-multiple"></i>
                    <span> Laporan Harian </span>
                </a>
            </li>
        @elseif(Request::is('kepsek/*'))
        <li class="menu-title">Menu Utama</li>
        <li>
            <a href="{{route('kepsek.home')}}">
                <i class="mdi mdi-home"></i>
                <span> Dashboard </span>
            </a>
        </li>
        <li>
        <a href="{{route('kepsek.agenda')}}">
            <i class="mdi mdi-calendar"></i>
            <span> History Jurnal Mengajar </span>
        </a>
        </li>
        <li>
        <a href="{{route('kepsek.berkas')}}">
            <i class="mdi mdi-calendar-month-outline"></i>
            <span> Bank Data Jurnal Mengajar </span>
        </a>
        </li>
        <li>
            <a href="{{route('kepsek.laporan')}}">
                <i class="mdi mdi-file-multiple"></i>
                <span> Laporan Harian </span>
            </a>
        </li>
        @endif
      </ul>

  </div>
  <!-- End Sidebar -->

  <div class="clearfix"></div>

</div>