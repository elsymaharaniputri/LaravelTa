<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'USER LIST' }}</title>

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
                        <div class="card">
                            <div class="d-flex justify-content-between ">
                                <h4 class="fw-bold ms-4 pt-5  pb-1 text-primary"> <span class="text-purple">Data</span>
                                    User
                                </h4>
                                <!-- Basic Breadcrumb -->
                                <div class="pt-5 me-4" aria-label="breadcrumb  ">
                                    <ol class="breadcrumb ">
                                        <li class="breadcrumb-item">
                                            <a href="index.html"><i class="bx bx-home mb-1 me-1"
                                                    style="color:#697a8d;"></i>Home</a>
                                        </li>

                                        <li class="breadcrumb-item active text-purple">List User</li>
                                    </ol>
                                </div>
                                <!-- Basic Breadcrumb -->
                            </div>
                            <div
                                class="container d-flex align-items-center justify-content-end   pe-lg-4 pe-sm-0 pe-md-0">
                                <a href="{{ route('users.userAdd') }}" class="btn btn-outline-primary me-2"
                                    style="width:10rem;">
                                    <i class='bx bx-plus'></i> Tambahkan
                                </a>
                            </div>
                            <table id="example" class="table table-striped ">



                                <!-- TABLE -->


                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username </th>
                                        <th>Tanggal Lahir</th>
                                        {{-- <th>Umur</th> --}}
                                        <th>Role</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody class="mb-5">
                                    @forelse ($users as $user)
                                        <tr>

                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->tgl_lahir }}</td>
                                            {{-- <td>UMUR</td> --}}
                                            <td>{{ $user->role->role ?? 'Role tidak ditemukan' }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-sm btn-outline-primary me-1">
                                                        Edit
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <form method="POST"
                                                        action="{{ route('users.destroyUser', $user->id) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Products belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>


                            </table>



                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal" aria-labelledby="modalToggleLabel" tabindex="-1"
                        style="display: none" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content ">
                                <div class="modal-header bg-primary text-center d-flex justify-content-center ">
                                    <h5 class="modal-title text-white " id="deleteModal">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close position-absolute end-0 me-2"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">Apakah anda yakin untuk hapus item ini ?
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-secondary w-25" data-bs-target="#modalToggle2"
                                        data-bs-toggle="modal" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button class="btn btn-danger w-25" data-bs-target="#modalToggle2"
                                        data-bs-toggle="modal" data-bs-dismiss="modal">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Confirmation Modal -->
                    <div class="modal fade" id="modalLong1" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="width: 40rem;">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-lg-12">
                                        <h5 class="modal-title text-center" id="modalLongTitle">Detail Ujian
                                            <span>ID : 001-GroupA-SKD</span>
                                        </h5>
                                        <div class="demo-inline-spacing mt-3">
                                            <ul class="list-group ">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center ">


                                                    PIC
                                                    <small style="width:268px;">elsy01</small>

                                                    <span class="badge bg-label-success rounded-pill"><i
                                                            class='bx bx-check'></i></span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Peserta
                                                    <small style="width:300px;">PESERTA-001-GroupA-SKD</small>

                                                    <button class="badge btn"
                                                        style="width: 50px; border-radius: 1rem; padding-top: 0.2rem; padding-bottom: 0.2rem;"><i
                                                            class='bx bxs-download '
                                                            style="color: #e01212;"></i></button>

                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    Paket Soal
                                                    <small style="width:300px;">PAKET-001-GroupA-SKD</small>

                                                    <button class="badge btn "
                                                        style="width: 50px; border-radius: 0.25rem;padding-top: 0.2rem; padding-bottom: 0.2rem;"><i
                                                            class='bx bxs-download'
                                                            style="color: #e01212;"></i></button>

                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- JavaScript untuk inisialisasi DataTables dan Filter -->
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            var table = $('#example').DataTable({
                "paging": true,
                "info": true,
                "ordering": true,
                "lengthChange": true,
                "searching": false,
                // "dom": '<"d-flex justify-content-between"<"top-left"f><"top-right"l>>t<"bottom"ip>',
                // "language": {
                //     "lengthMenu": "Show _MENU_ entries"
                // }
            });
        });

        // Event listener for the delete button
        $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#deleteModal"]', function() {
            const itemId = $(this).data('id'); // Get the ID from the data attribute
            $('#confirmDelete').data('id', itemId); // Store the ID in the confirm button
        });

        // Event listener for the confirm delete button
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('confirmDelete').addEventListener('click', function() {
                const itemId = $(this).data('id'); // Get the stored ID
                // Perform the delete action here (e.g., make an AJAX call to delete the item)
                alert("Item with ID " + itemId + " deleted!"); // Replace this with your actual delete logic
                // Optionally, you can hide the modal after confirmation
                var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.hide();
            });

        });
    </script>


</body>

</html>
