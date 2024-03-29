@include('adm.head')

                @include('adm.nav')

               <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
     

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::User()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ URL::asset('images/') }}/{{Auth::User()->images}}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        
          <a class="dropdown-item" href="{{ url('/password/change') }}"  >
            <i class="fa fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
          </a>

          <a class="dropdown-item" href="{{ url('/logout') }}"  >
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
          
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> --}}

    <!-- Content Row -->
        <div class="row">
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pegawai</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/user">{{$pegawai}}</a></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fas fa-fw fa-users fa-2x text-primary-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah surat masuk</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/suratmasuk">{{$suratmasuk}}</a></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-fw fa-arrow-right fa-2x text-primary-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div> 
    
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Surat Keluar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/suratkeluar">{{$suratkeluar}}</a></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-fw fa-arrow-left fa-2x text-primary-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div> 
    
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah barang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/persediaan">{{$persediaan}}</a></div>
              </div>
              <div class="col-auto">
                <i class="fas fas fa-fw fa-briefcase fa-2x text-primary-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan Barang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/masuk">{{$masuk}} kali</a></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-arrow-right fa-2x text-primary-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengeluaran Barang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/keluar">{{$keluar}} kali</a></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-arrow-left fa-2x text-primary-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div> 



      <!-- Earnings (Monthly) Card Example -->
     
  
      <!-- Earnings (Monthly) Card Example -->
    
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      {{-- <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
               
              </div>
            </div>
          </div> --}}
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <div id="container" style="border:0px solid black;width: 100%; min-height: 400px; margin: 0 auto; position: relative;">
                                     </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      
    </div>

   
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
{{-- <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer> --}}
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
  </div>
</div>
</div>
</div>

@include('adm.foot')
