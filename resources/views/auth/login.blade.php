<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    {{-- Meta Description --}}
    <meta name="description"
        content="Sistem pemberian kredit adalah mekanisme untuk menilai potensi risiko dan kemampuan seseorang untuk membayar kembali pinjaman">
    <meta name="keywords" content="BPR Bangunarta, bprbangunarta" />
    <meta content='Sistem Pemberian Kredit' property='og:title' />
    <meta content='https://sipebri.bprbangunarta.co.id/' property='og:url' />
    <meta content='Sistem Pemberian Kredit' property='og:site_name' />
    <meta content='website' property='og:type' />
    <meta
        content='Sistem pemberian kredit adalah mekanisme untuk menilai potensi risiko dan kemampuan seseorang untuk membayar kembali pinjaman'
        property='og:description' />
    <meta content='Sistem Pemberian Kredit' property='og:image:alt' />
    <meta content='https://sipebri.bprbangunarta.co.id/assets/img/banner.png' property='og:image' />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTEv1.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/login.css') }}">

    <style>
        .login-page,
        .register-page {
            background: #dddddd url("{{ asset('background.jpeg') }}");
            color: #ffffff !important;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">
                <img src='{{ asset('logo.png') }}' style='max-width: 100%;max-height:170px' />
            </a>
        </div>

        <div class="login-box-body">

            @if ($errors->has('auth'))
                <div class='alert bg-red'>
                    {{ $errors->first('auth') }}
                </div>
            @elseif($errors->has('password'))
                <div class='alert bg-red'>
                    {{ $errors->first('password') }}
                </div>
            @else
                <div class='alert bg-blue'>
                    Anda belum masuk!
                </div>
            @endif

            <p class='login-box-msg'>Silakan login untuk memulai sesi Anda</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="auth" placeholder="Username"
                        value="{{ old('auth') }}" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name='password' placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div style="margin-bottom:10px" class='row'>
                    <div class='col-xs-12'>
                        <button type="submit" class="btn bg-blue btn-block btn-flat">
                            <i class='fa fa-lock'></i> MASUK
                        </button>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-xs-12' align="center">
                        <p style="padding:10px 0px 10px 0px">Forgot the password ?
                            <a href='#'>Click here</a>
                        </p>
                    </div>
                </div>
            </form>

            <br />
        </div>
    </div>

    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
</body>

</html>
