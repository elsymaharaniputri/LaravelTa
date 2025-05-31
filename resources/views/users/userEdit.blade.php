<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">


<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'EDIT USER' }}</title>

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
                @include('include.navbar')
                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="text-center fw-bold text-purple py-3">Edit <span class="text-primary"> Data
                                User</span></h4>

                        <!-- Basic Layout -->
                        <div class="row">


                            <!-- UPLOAD BY USER -->

                            <div class="col-md-8 mx-auto">
                                <div class="card mb-4">

                                    <div class="card-body">
                                        <div class="card-header d-flex justify-content-end align-items-center">

                                            <a href="{{ asset('userList') }}"
                                                class="btn btn-sm btn-outline-primary">List
                                                User</a>
                                            <!-- <small class="text-muted float-end">Merged input group</small> -->
                                        </div>
                                        <form action="{{ route('users.update', $users->id) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')
                                            <div class="row mx-auto">
                                                <div class="col-lg-12 col-md-12 mx-auto">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-fullname">Nama
                                                            Lengkap</label>

                                                        <div class="input-group input-group-merge">
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="name" name="name"
                                                                value="{{ old('name', $users->name ?? '') }}"
                                                                placeholder="Inputkan nama anda"
                                                                aria-describedby="basic-icon-default-fullname2"
                                                                required>

                                                            @error('name')
                                                                <div class="alert alert-danger mt-2">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-icon-default-company">Tanggal Lahir</label>

                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-company2"
                                                                class="input-group-text">
                                                                <i class='bx bx-date'></i>
                                                            </span>
                                                            <input
                                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                                id="tgl_lahir" name="tgl_lahir" type="date"
                                                                step="1"
                                                                value="{{ old('tgl_lahir', $users->tgl_lahir ?? '') }}"
                                                                placeholder="Pilih Tanggal" id="html5-date-input"
                                                                required />
                                                            @error('tgl_lahir')
                                                                <div class="alert alert-danger mt-2">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-icon-default-fullname">Username</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2"
                                                                class="input-group-text"><i
                                                                    class="bx bx-user"></i></span>
                                                            <input type="text"
                                                                class="form-control @error('username') is-invalid @enderror"
                                                                id="username" name="username"
                                                                value="{{ old('username') }}"
                                                                placeholder="Inputkan username anda" required>

                                                            @error('username')
                                                                <div class="alert alert-danger mt-2">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-icon-default-fullname">Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2"
                                                                class="input-group-text"><i
                                                                    class="bx bx-key"></i></span>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                id="password" name="password"
                                                                placeholder="Masukkan password"
                                                                aria-describedby="password" required>
                                                            @error('password')
                                                                <div class="alert alert-danger mt-2">{{ $message }}
                                                                </div>
                                                            @enderror

                                                            <span class="input-group-text cursor-pointer"><i
                                                                    class="bx bx-hide"></i></span>
                                                        </div>
                                                    </div>


                                                    <!-- Fix the Role dropdown section -->
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-icon-default-fullname">Role</label>
                                                        <div class="input-group input-group-merge">
                                                            <select
                                                                class="form-control @error('id_role') is-invalid @enderror"
                                                                name="id_role" required>
                                                                <option value="" disabled>Pilih Role</option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}"
                                                                        {{ old('id_role', $users->id_role) == $role->id ? 'selected' : '' }}>
                                                                        {{ $role->role }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('id_role')
                                                                <div class="alert alert-danger mt-2">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>





                                                </div>




                                                <p class="text-start"><small class="text-danger"> <i>*Pastikan item
                                                            data
                                                            yang diinputkan sudah valid </i></small></p>

                                            </div>




                                            <div class="d-flex justify-content-center">
                                                <!-- Tombol untuk membuka modal -->
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
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
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




    {{-- SCRIPT --}}
    @include('include.script')

   

</body>

</html>
