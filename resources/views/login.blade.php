@extends('layouts.main')

@section('page-title', 'Login')

@section('content-layout')

    <style>
        body {
            background-color: #f1e9db;
        }

        .login-bg {
            background-image: url("https://cdn.pixabay.com/photo/2016/08/25/03/04/cafe-1618636_960_720.jpg");
            background-size: cover;
            background-position: center;
            border-radius: 1rem 0 0 1rem;
        }

        .login-card {
            background-color: #fff8f0;
            border-radius: 0 1rem 1rem 0;
        }

        .btn-primary {
            background-color: #6f4e37;
            border-color: #6f4e37;
        }

        .btn-primary:hover {
            background-color: #5a3c2d;
            border-color: #5a3c2d;
        }

        .btn-download-manual {
            background-color: #613b0c;
            /* Orange pastel */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-download-manual:hover {
            background-color: #7e4e13;
            color: white;
            text-decoration: none;
        }
    </style>

    <main>
        <div class="container-fluid min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
            <div class="row w-100 shadow-lg" style="max-width: 900px;">

                <!-- Left Image -->
                <div class="col-md-6 login-bg d-none d-md-block"></div>

                <!-- Right Form -->
                <div class="col-md-6 login-card d-flex align-items-center justify-content-center p-4">
                    <div class="w-100">

                        <div class="card-body">
                            <div class="pt-2 pb-4 text-center">
                                <h5 class="card-title pb-0 fs-4">☕ Café Ghibli</h5>
                                <p class="text-muted small">Enter your Email and Password</p>
                            </div>

                            <form class="row g-3 needs-validation" method="post" action="/action-login" novalidate>
                                @csrf

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        id="yourUsername" required>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                </div>

                                <div class="col-12">
                                    <label for="yourRole" class="form-label">Select Role <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                        <span class="input-group-text bg-light border-0">
                                            <i class="bi bi-person-badge-fill text-secondary"></i>
                                        </span>
                                        <select name="role" class="form-select border-0" id="yourRole" required
                                            style="background-color: #fff8f0;">
                                            <option value="" disabled selected>Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

            <!-- Button Manual Book di luar form -->
            <div class="text-center mt-4">
                <a href="{{ asset('manual-book/POS_Cafe_Ghibli.pdf') }}" class="btn-download-manual" download>
                    Download Manual Book
                </a>
            </div>

        </div>
    </main>

@endsection
