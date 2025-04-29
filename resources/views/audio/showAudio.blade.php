<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'AUDIO LIST' }}</title>

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
                            <h4 class="fw-bold ms-4 pt-5  pb-1 text-primary"> <span class="text-purple">Data</span>
                                List Audio
                            </h4>
                            <div
                                class="container d-flex align-items-center justify-content-end   pe-lg-4 pe-sm-0 pe-md-0">
                                <a href="{{ route('audio.form') }}" class="btn btn-outline-primary me-2" target="_blank"
                                    style="width:10rem;">
                                    <i class='bx bx-plus'></i> Tambahkan
                                </a>
                            </div>
                            <table id="example" class="table table-striped ">



                                <!-- TABLE -->


                                <thead>
                                    <tr>


                                        <th>Nama Audio</th>
                                        <th>Jenis Ekspresi Relevan</th>
                                        <th>File Audio</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>

                                <tbody class="mb-5">
                                    @forelse ($audios as $audio)
                                        <tr>


                                            <td>{{ $audio->name_audio }}</td>
                                            <td>
                                                {{-- Memanggil relasi ekspresiToAudio dan mengakses name_ekspresi --}}
                                                {{ $audio->ekspresiToAudio->name_ekspresi ?? 'Ekspresi tidak ditemukan' }}
                                            </td>
                                            <td>
                                                @if ($audio->file_audio)
                                                    <audio controls>
                                                        <source src="{{ asset('audio/' . $audio->file_audio) }}"
                                                            type="audio/mpeg">
                                                        Browser Anda tidak mendukung pemutar audio.
                                                    </audio>
                                                @else
                                                    Tidak ada file audio.
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a class="dropdown-item edit-btn" href="ekspresi-edit.html"
                                                            target="_blank">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-id="001-0920">
                                                            <i class="bx bx-trash me-1"></i> Hapus
                                                        </a>
                                                    </div>


                                                </div>
                                            </td>


                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="3">Tidak ada data audio.</td>
                                        </tr>
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

    {{-- SCRIPTT --}}

    {{-- SCRIPT --}}
    @include('include.script')
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
