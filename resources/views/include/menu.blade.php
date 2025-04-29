 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo d-flex justify-content-center mx-auto"
         style="height:170px; width: 75%; margin-top: 20px;">
         <a href="index.html" class="app-brand-link">
             <span>
                 <img src="{{ asset('admin/assets/img/psy-img/logo.png') }}" class="img-fluid" alt=""
                     srcset="">
             </span>
             <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span> -->
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner">
         <!-- Dashboard -->
         <li class="menu-item">
             <a href="{{ route('admin.index') }}"class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Dashboard</div>
             </a>
         </li>
         <!-- /Dashboard -->

         <!-- Peserta -->
         <li class="menu-item">
             <a href="javascript:void(0);"class="menu-link menu-toggle">
                 <i class="menu-icon bx bxs-user-detail"></i>
                 <div data-i18n="Layouts">User</div>
             </a>

             <ul class="menu-sub">

                 <li class="menu-item">
                     <a href="{{ route('users.userList') }}" class="menu-link">
                         <div data-i18n="Without menu">List User</div>
                     </a>
                 </li>

             </ul>
         </li>
         <!-- End Peserta -->

         <!-- Paket Soal -->
         <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon bx bx-music"></i>
                 <div data-i18n="Layouts">Audio</div>
             </a>

             <ul class="menu-sub">

                 <li class="menu-item">
                     <a href="{{ route('audio.showAudio') }}" class="menu-link">
                         <div data-i18n="Without menu">List Audio</div>
                     </a>
                 </li>

             </ul>
         </li>
         <!-- End Paket Soal -->
         <!-- Paket Soal -->
         <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon bx bx-book-add"></i>
                 <div data-i18n="Layouts">Konten</div>
             </a>

             <ul class="menu-sub">
                 <li class="menu-item">
                     <a href="nilai-list.html" class="menu-link">
                         <div data-i18n="Without menu">List Konten</div>
                     </a>
                 </li>

             </ul>
         </li>
         <!-- End Paket Soal -->







     </ul>

 </aside>
