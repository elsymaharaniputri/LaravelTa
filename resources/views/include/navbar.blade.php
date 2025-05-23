   <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
       id="layout-navbar">
       <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
           <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
               <i class="bx bx-menu bx-sm"></i>
           </a>
       </div>
       <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


           <!-- SETTING USER. -->
           <ul class="navbar-nav flex-row align-items-center ms-auto">
               <!-- User -->
               <li class="nav-item navbar-dropdown dropdown-user dropdown">
                   <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                       <div class="avatar avatar-online">
                           <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt
                               class="w-px-40 h-auto rounded-circle" />

                       </div>
                   </a>
                   <ul class="dropdown-menu dropdown-menu-end">

                       <li>
                           <div class="dropdown-divider"></div>
                       </li>
                       <li>
                           <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                               @csrf
                               <button type="submit" class="dropdown-item">
                                   <i class="bx bx-power-off me-2"></i>
                                   <span class="align-middle">Log Out</span>
                               </button>
                           </form>
                       </li>
                   </ul>
               </li>
               <!--/ User -->
           </ul>
           <!-- END SETTING USER -->
       </div>
   </nav>
