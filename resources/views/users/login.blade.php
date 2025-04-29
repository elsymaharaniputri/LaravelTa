<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'LOGIN' }}</title>

    <meta name="description" content="{{ $description ?? '' }}" />
    {{-- STYLE --}}
    @include('include.style')

</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="wrap">
                <!-- Register Card -->
                <div class="card w-25 mx-auto">
                    <div class="card-body ">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a class="app-brand-link gap-2">
                                <span class="app-brand-logo demo mx-auto ">
                                    <img src="{{ asset('admin/assets/img/psy-img/logo.png') }}" alt="logo"
                                        class="img-fluid" srcset="">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <form id="" class="my-3 mx-auto" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                {{-- <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Inputkan username anda" /> --}}
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username') }}"
                                        placeholder="Inputkan username anda" required>

                                    @error('username')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    {{-- <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Inputkan password anda" aria-describedby="password" /> --}}

                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Masukkan password"
                                        aria-describedby="password" required>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror

                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>


                                </div>

                            </div>


                            <div class="mt-3 d-flex justify-content-center">
                                {{-- <a href="" class="btn btn-primary">
                                    Login
                                </a> --}}
                                <!-- Tombol Login -->
                                <button type="submit" class="btn  btn-primary">Login</button>
                                <!-- Pesan Error -->
                                @if (session('error'))
                                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                                @endif

                                <!-- Pesan Sukses -->
                                @if (session('success'))
                                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    <!-- / Content -->

    {{-- SCRIPT --}}
    @include('include.script')
</body>

</html>
