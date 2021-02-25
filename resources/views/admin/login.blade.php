<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login SLIBC</title>
    <!-- Favicon -->
    <link rel="icon" href="/admin/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/admin/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/admin/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default overflow-hidden">
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-8">
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body">
                            @if(session('error'))
                            <div class="alert alert-danger" id="error">
                                {{ session('error') }}
                            </div>
                            @endif
                            <form role="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="text" name="email" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                    <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password" name="password">
                                    </div>
                                    @error('password')
                                    <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="btn-login" class="btn btn-primary btn-block my-4">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Core -->
    <script src="/admin/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="/admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="/admin/assets/js/argon.js?v=1.2.0"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        setTimeout(function() {
            document.getElementById('error').remove();
        }, 3000);

    </script>
</body>

</html>
