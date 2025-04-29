<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('/admin/assets/img/favicon/favicon.ico') }}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="{{ asset('/admin/assets/vendor/fonts/boxicons.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('/admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('/admin/assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('/admin/assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

<!-- Page CSS -->

<!-- Helpers -->
<script src="{{ asset('/admin/assets/vendor/js/helpers.js') }}"></script>

<!-- Config:  Mandatory theme config file contain global vars & default theme options -->
<script src="{{ asset('/admin/assets/js/config.js') }}"></script>

<style>
      /* Padding untuk elemen DataTables (pagination, info, dll.) */
        .dataTables_wrapper .dataTables_paginate,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            margin-bottom: 10px;
            font-size: 14px;

        }



        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .top-control-bar {
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            margin-bottom: 10px;
            /* Jarak antara kontrol dan tabel */
        }

        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            margin-right: 10px;
        }

        .dataTables_wrapper .dataTables_length select {
            margin-right: 5px;
        }

        div.dataTables_wrapper div.dataTables_length label {

            margin-bottom: 25px;
        }

        .dataTables_info,
        .dataTables_paginate {
            display: inline-block;
            vertical-align: middle;

        }

        .dataTables_paginate {
            float: right;

        }
</style>