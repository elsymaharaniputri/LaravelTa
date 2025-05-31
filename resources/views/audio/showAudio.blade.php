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
                                                <div class="btn-group">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('audio.editAudio', $audio->id) }}"
                                                        class="btn btn-sm btn-outline-primary me-1">
                                                        Edit
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <form method="POST"
                                                        action="{{ route('audio.destroyAudio', $audio->id) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus audio ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
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
    </script>


</body>

</html>
