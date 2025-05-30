<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'Add Data Ekspresi' }}</title>

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
                <!-- Navbar -->

                <nav>
                    <!-- Navbar -->

                    @include('include.navbar')
                    <!-- / Navbar -->
                </nav>

                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="text-center fw-bold text-purple py-3">Form <span class="text-primary"> Add
                                Ekspresi</span></h4>

                        <!-- Basic Layout -->
                        <div class="row">


                            <!-- UPLOAD BY USER -->

                            <div class="col-md-8 mx-auto">
                                <div class="card mb-4">

                                    <div class="card-body">
                                        <div class="card-header d-flex justify-content-end align-items-center">

                                        </div>
                                        <form action="{{ route('ekspresi.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mx-auto">
                                                <div class="col-lg-12 col-md-12 mx-auto">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-fullname">ID
                                                            Ekspresi</label>
                                                        <div class="input-group input-group-merge">

                                                            <input type="text"
                                                                class="form-control @error('id') is-invalid @enderror"
                                                                name="id" value="{{ old('id') }}"
                                                                placeholder="Masukkan ID Ekspresi (0-100)">

                                                            <!-- Error message -->
                                                            @error('id')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-icon-default-fullname">Jenis
                                                            Ekspresi</label>
                                                        <div class="input-group input-group-merge">

                                                            <input type="text"
                                                                class="form-control @error('name_ekspresi') is-invalid @enderror"
                                                                name="name_ekspresi" value="{{ old('name_ekspresi') }}"
                                                                placeholder="Masukkan Jenis Ekspresi (Huruf Kapital)">

                                                            <!-- Error message -->
                                                            @error('name_ekspresi')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-fullname">
                                                            Deskripsi
                                                            Ekspresi</label>
                                                        <div class="input-group input-group-merge speech-to-text"
                                                            style="height: 8rem;">
                                                            {{-- <textarea class="form-control" placeholder="Inputkan by text atau voice" rows="2"></textarea> --}}
                                                            <textarea class="form-control @error('desc_ekspresi') is-invalid @enderror" name="desc_ekspresi"
                                                                placeholder="Masukkan Deskripsi" rows="2">{{ old('desc_ekspresi') }}</textarea>

                                                            <!-- Error message -->
                                                            @error('desc_ekspresi')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <span class="input-group-text">
                                                                <i
                                                                    class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-fullname">
                                                            Icon
                                                            Ekspresi</label>
                                                        <input type="file"
                                                            class="form-control @error('icon_ekspresi') is-invalid @enderror"
                                                            name="icon_ekspresi">

                                                        <!-- Error message -->
                                                        @error('icon_ekspresi')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>






                                                </div>




                                                <p class="text-start"><small class="text-danger"> <i>*Pastikan item
                                                            data
                                                            yang diinputkan sudah valid </i></small></p>

                                            </div>




                                            <div class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-primary w-lg-25"
                                                    data-bs-toggle="modal" data-bs-target="#modalKirim">
                                                    Kirim
                                                </button>
                                                <!-- Modal KONFIRMASI KIRIM-->
                                                <div class="modal fade" id="modalKirim"
                                                    aria-labelledby="modalToggleLabel" tabindex="-1"
                                                    style="display: none" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content ">
                                                            <div
                                                                class="modal-header  bg-purple text-center d-flex justify-content-center ">
                                                                <h5 class="modal-title text-white "
                                                                    id="modalToggleLabel">Konfirmasi Pengiriman
                                                                    Data
                                                                </h5>
                                                                <button type="button"
                                                                    class="btn-close position-absolute end-0 me-2"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">Apakah anda
                                                                yakin untuk melakukan pengiriman data
                                                                ?
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-center">
                                                                <!-- Tombol Batal -->
                                                                <button type="button" class="btn btn-secondary w-25"
                                                                    data-bs-dismiss="modal">
                                                                    Batal
                                                                </button>

                                                                <!-- Tombol Kirim, submit form -->
                                                                <button type="submit"
                                                                    class="btn bg-purple text-white w-25">
                                                                    Kirim
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- END MODAL KIRIM -->
                                            </div>


                                        </form>
                                        <!-- Pesan Error -->
                                        @if (session('error'))
                                            <div class="alert alert-danger mt-3">
                                                {{ session('error') }}</div>
                                        @endif

                                        <!-- Pesan Sukses -->
                                        @if (session('success'))
                                            <div class="alert alert-success mt-3">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <!-- END UP BY USER -->

                        </div>



                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    @include('include.footer')
                </footer>

                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    </div>
    <!-- / Layout wrapper -->



    @include('include.script')

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen select
            $('#exampleFormControlAdmin2').select2({
                placeholder: "Pilih Akun Anda", // Placeholder jika belum dipilih
                allowClear: true // Menambahkan opsi untuk menghapus pilihan
            });
        });
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen select
            $('#exampleFormControlFilePaketSoal').select2({
                placeholder: "Pilih Paket Soal", // Placeholder jika belum dipilih
                allowClear: true // Menambahkan opsi untuk menghapus pilihan
            });
        });
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen select
            $('#exampleFormControlFilePeserta').select2({
                placeholder: "Pilih File Peserta", // Placeholder jika belum dipilih
                allowClear: true // Menambahkan opsi untuk menghapus pilihan
            });
        });
    </script>

</body>

</html>
