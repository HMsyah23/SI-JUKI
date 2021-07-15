<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log in | E-Agenda Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{('favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{('assets/css/bootstrap.min.css')}}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{('assets/css/app.min.css')}}" id="app-stylesheet" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg bg-success">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center">
                                <a href="#" class="logo">
                                    <img src="image/logo.png" alt="" height="80" class="logo-light mx-auto">
                                    <img src="image/logo.png" alt="" height="80" class="logo-dark mx-auto">
                                </a>
                                <h3 class="mt-2 mb-4">SMP 1 MUHAMMADIYAH</h3>
                            </div>
                            <h3 class="text-muted text-center">E - Jurnal Kegiatan</h3>
                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Log In</h4>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email </label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                {{-- <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                            checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div> --}}

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-success btn-block" type="submit"> Log In </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    {{-- <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ml-1"><i
                                        class="fa fa-lock mr-1"></i>Forgot your password?</a></p>
                            <p class="text-muted">Don't have an account? <a href="pages-register.html"
                                    class="text-dark ml-1"><b>Sign Up</b></a></p>
                        </div> 
                    </div> --}}
                    <!-- end row -->

                </div> 
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <!-- Vendor js -->
    <script src="{{('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{('assets/js/app.min.js')}}"></script>

</body>

<!-- Mirrored from coderthemes.com/adminto/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Jun 2021 02:50:53 GMT -->

</html>