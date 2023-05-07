<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="index.html">
       <img src="{{ asset('pic') }}/logo.png" class="img-fluid" alt="">
       <span><img src="{{ asset('pic') }}/name.png" width="130px" alt=""></span>
       </a>
       <div class="iq-menu-bt-sidebar">
             <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                   <div class="main-circle"><i class="ri-more-fill"></i></div>
                   <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                </div>
             </div>
          </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="iq-menu-title"><i class="ri-subtract-line"></i><span></span></li>
             <li class="{{ '/' == request()->path() ? 'active' : '' }}">
               <a href="/" class="iq-waves-effect"><i class="ri-home-8-fill"></i><span>Beranda</span></a>
            </li>   
             <li class="{{ 'barang' == request()->path() ? 'active' : '' }}">
                <a href="/barang" class="iq-waves-effect"><i class="ri-briefcase-4-fill"></i><span>Barang</span></a>
             </li> 
             <li class="{{ 'pegawai' == request()->path() ? 'active' : '' }}">
               <a href="/pegawai" class="iq-waves-effect"><i class="ri-group-fill"></i><span>Pegawai</span></a>
            </li>                    
             <li class="{{ 'penjualan' == request()->path() ? 'active' : '' }}">
                <a href="/penjualan" class="iq-waves-effect"><i class="lab la-mendeley"></i><span>Penjualan</span></a>
             </li>
             <li class="{{ 'grafik_penjualan' == request()->path() ? 'active' : '' }}">
               <a href="/grafik_penjualan" class="iq-waves-effect"><i class="fa fa-area-chart"></i><span>Grafik Penjualan</span></a>
            </li>
             {{-- <li>
                <a href="dashboard-2.html" class="iq-waves-effect"><i class="ri-briefcase-4-fill"></i><span>Hospital Dashboard 2</span></a>
             </li>
             <li>
                <a href="dashboard-3.html" class="iq-waves-effect"><i class="ri-group-fill"></i><span>Patient Dashboard</span></a>
             </li>
             <li>
                <a href="dashboard-4.html" class="iq-waves-effect"><i class="lab la-mendeley"></i><span>Covid-19 Dashboard</span><span class="badge badge-danger">New</span></a>
             </li> --}}
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>