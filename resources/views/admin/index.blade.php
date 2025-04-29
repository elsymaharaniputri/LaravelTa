<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'Dashboard' }}</title>

    <meta name="description" content="{{ $description ?? '' }}" />
    {{-- STYLE --}}
    @include('include.style')

</head>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('include.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <nav>
                    <!-- Navbar -->

                    @include('include.navbar')
                    <!-- / Navbar -->
                </nav>


                <!-- Content -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 mx-auto">
                                <div class="card py-3">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h4 class="card-title text-purple fw-bold">Selamat Datang,<span
                                                        class="text-primary fw-bold">Elsy
                                                        Maharani Putri</span> !🎉</h4>
                                                <p class="mb-4">
                                                    Silakan mengelola website ini untuk kepentingan ujian dengan baik,
                                                    Untuk mengelola profile
                                                    kamu silakan klik <span>icon profile</span>
                                                </p>
                                                <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary"><i class="menu-icon bx bxs-download" ></i> Panduan</a>
                                              -->
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="{{ asset('/admin/assets/img/psy-img/vectorIndex.png') }}"
                                                    height="180" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- CARD  -->

                            <div class="row">



                                <!-- Lihat Nilai -->
                                <div class="col-4 mb-4">
                                    <div class="card">
                                        <a href="http://" target="_blank" rel="noopener noreferrer">
                                            <div class="card-body" style="padding: 1.2rem 1.5rem;">

                                                <div class="card-title">
                                                    <h5 class="text-nowrap mb-3 text-purple">Ekspresi <span
                                                            class="text-primary"></span>
                                                    </h5>
                                                    <!-- <span class="badge bg-label-warning rounded-pill">20 Ujian</span> -->
                                                    <a href="{{ route('ekspresi.showEkspresi') }}" target="_blank"
                                                        class="btn btn-sm btn-outline-primary"
                                                        style="width: 5rem;">Lihat</a>
                                                </div>



                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <!-- End Lihat Nilai -->
                                <!-- Lihat Nilai -->
                                <div class="col-4 mb-4">
                                    <div class="card">
                                        <a href="http://" target="_blank" rel="noopener noreferrer">
                                            <div class="card-body" style="padding: 1.2rem 1.5rem;">

                                                <div class="card-title">
                                                    <h5 class="text-nowrap mb-3 text-purple">Audio <span
                                                            class="text-primary"></span>
                                                    </h5>
                                                    <!-- <span class="badge bg-label-warning rounded-pill">20 Ujian</span> -->
                                                    <a href="{{ route('audio.showAudio') }}" target="_blank"
                                                        class="btn btn-sm btn-outline-primary"
                                                        style="width: 5rem;">Lihat</a>
                                                </div>



                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <!-- End Lihat Nilai -->

                            </div>

                            <!-- END CARD -->



                        </div>
                    </div>
                </div>





                <!-- Content -->


                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    @include('include.footer')
                </footer>


                <!-- / Footer -->
            </div>
            <!-- / Layout page -->

        </div>


    </div>
    <!-- / Layout wrapper -->

    {{-- SCRIPT --}}
    @include('include.script')

</body>

</html>
