 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  {{-- <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-edit"></i>
  </div> --}}
  <div class="sidebar-brand-text mx-3" style="">SIAPOLPP <br><h6 style="font-size:8px">Sistem Administrasi Satpol PP</h6><sup></sup></div>
  
</a>


<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ url('home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>



<!-- Heading -->
<div class="sidebar-heading" style="color:white">
  Menu
</div>

<li class="nav-item ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
        <i class="fa fa-users"></i>
        <span>Kepegawaian</span>
    </a>
  
    <div id="collapse4" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded" style="">
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
               DUK
            </a>
            <hr class="sidebar-divider">

            <a class="collapse-item " style="color:white" href="{{ url('user') }}">
                Nominatif PNS
            </a>
  
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
                Nominatif NON-PNS
            </a>
            <hr class="sidebar-divider">

            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
                SKUM
            </a>
            <hr class="sidebar-divider">

            <a class="collapse-item " style="color:white" href="{{ url('rekapan') }}">
              TPP
          </a>
  
  
        </div>
    </div>
  </li>

<li class="nav-item ">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
      <i class="fa fa-briefcase"></i>
      <span>Keuangan dan Aset</span>
  </a>

  <div id="collapse1" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="py-2 collapse-inner rounded" style="">

        <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
            Laporan Keuangan
         </a>
         <br>
        <hr class="sidebar-divider">

          <a class="collapse-item " style="color:white" href="{{ url('persediaan') }}">
             Persediaan Barang
          </a>

          <a class="collapse-item " style="color:white" href="{{ url('masuk') }}">
              Barang Masuk
          </a>

          <a class="collapse-item " style="color:white" href="{{ url('keluar') }}">
              Barang Keluar
          </a>

          <br>
          <hr class="sidebar-divider">

          <a class="collapse-item " style="color:white" href="{{ url('tahun') }}">
            Tahun
         </a>

         <a class="collapse-item " style="color:white" href="{{ url('kibb') }}">
             KIB B
         </a>

         <a class="collapse-item " style="color:white" href="{{ url('kibc') }}">
             KIB C
         </a>

         <a class="collapse-item " style="color:white" href="{{ url('kibd') }}">
             KIB D
         </a>

        

      </div>
  </div>
</li>



<li class="nav-item ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse1">
        <i class="fa fa-cubes"></i>
        <span>Perencanaan</span>
    </a>
  
    <div id="collapse2" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded" style="">
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
               Renstra
            </a>
  
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
                Renja
            </a>
  
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
                LAKIP
            </a>
  
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
                SPM
            </a>
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
                Perjanjian Kinerja
            </a>
            <a class="collapse-item " style="color:white" href="{{ url('maintenance') }}">
                Evaluasi Perjanjian Kinerja
            </a>
  
        </div>
    </div>
  </li>

<!-- Divider -->
<hr class="sidebar-divider">



<li class="nav-item active"><a class="nav-link" href="{{ url('/logout') }}"><i class="fas fa-fw fa fa-times-circle"></i><span>Logout</span></a></li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
