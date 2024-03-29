<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    {{-- Meta Description --}}
    <meta name="description" content="BPR Bangunarta">
    <meta name="keywords" content="BPR Bangunarta, bprbangunarta" />
    <meta content='Sistem Pemberian Kredit' property='og:title' />
    <meta content='website' property='og:type' />
    <meta content='BPR Bangunarta' property='og:description' />
    <meta content='https://sipebri.bprbangunarta.co.id/assets/img/banner.png' property='og:image' />

    @include('layouts.header')
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        @include('layouts.topbar')
        <x-sidebar></x-sidebar>

        @yield('content')

        @include('layouts.version')
    </div>

    @include('layouts.footer')
    @stack('myscript')

    @if (session('session_expired'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Sesi berakhir, silahkan login kembali",
                    confirmButtonColor: "#DD4B39",
                });
            });
        </script>
    @endif

</body>

</html>
