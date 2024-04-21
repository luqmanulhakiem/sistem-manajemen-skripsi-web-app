<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Simask</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is(['dashboard']) ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @role('admn_univ')
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin Universitas
        </div>

        {{-- Nav Item --}}
        {{-- @can('create fakultas') --}}
        <li class="nav-item {{Request::is(['data/fakultas', 'data/fakultas/create', 'data/fakultas/edit/*']) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('fakultas')}}">
                <i class="fas fa-fw fa-university"></i>
                <span>Data Fakultas</span></a>
        </li>
         {{-- @endcan --}}
        <li class="nav-item {{Request::is(['data/admin-fakultas', 'data/admin-fakultas/create', 'data/admin-fakultas/edit/*']) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin-fakultas')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Admin Fakultas</span></a>
        </li>
    @endrole
    
    @hasanyrole(['admn_univ', 'admn_fakultas'])
        <!-- Divider -->
        {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

        <li class="nav-item {{Request::is(['data/angkatan', 'data/angkatan/create', 'data/angkatan/edit/*']) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('angkatan')}}">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>Data Angkatan</span></a>
        </li>
    @endhasanyrole

    @role('admn_fakultas')

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin Fakultas
        </div>

        {{-- Nav Item --}}
        <li class="nav-item {{Request::is(['data/mahasiswa', 'data/mahasiswa/create', 'data/mahasiswa/edit/*']) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('mahasiswa')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Mahasiswa</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Dosen</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('dosen.index')}}">Semua Dosen</a>
                    <a class="collapse-item" href="{{route('kaprodi')}}">Kaprodi</a>
                    <a class="collapse-item" href="{{route('dospem')}}">Dosen Pembimbing</a>
                </div>
            </div>
        </li>
        
        <li class="nav-item {{Request::is(['data/prodi', 'data/prodi/create', 'data/prodi/edit/*']) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('prodi')}}">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Data Prodi</span></a>
        </li>
        <li class="nav-item {{Request::is(['data/jumlah-dospem']) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('jumlah-dospem')}}">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Data Jumlah Dospem</span></a>
        </li>
       
    @endrole

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    @role('mahasiswa')
        <!-- Heading -->
        <div class="sidebar-heading">
            Mahasiswa
        </div>

        {{-- Nav Item --}}
        <li class="nav-item {{Request::is(['pengajuan-judul', 'pengajuan-judul/*']) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('pengajuan-judul')}}">
                <i class="fas fa-fw fa-book"></i>
                <span>Pengajuan Judul</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('pengajuan-dospem')}}">
                <i class="fas fa-fw fa-user"></i>
                <span>Pengajuan Dospem</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-user"></i>
                <span>Bimbingan</span></a>
        </li>
    @endrole
   

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>