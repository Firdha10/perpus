
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>SIPERPUS</title>
    <link rel="shortcut icon" href="{{ asset('images/OPAC.png') }}">
    <link rel="stylesheet" href="{{asset('css/guest/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/css/style.css">
    <link rel="stylesheet" href="https://getstisla.com/dist/css/custom.css">
    <link rel="stylesheet" href="https://getstisla.com/landing/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="">
    @include('layouts.guest-template.navbar')

    
    @yield('content')
    
    @include('layouts.guest-template.footer')
</div>
    <script>var csrf_token = 'r9963NDn89LBN4ZAskX8Q5KCJVOPvfRIqk6XUP7W';</script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://getstisla.com/dist/modules/jquery.min.js"></script>
    <script src="https://getstisla.com/dist/modules/popper.js"></script>
    <script src="https://getstisla.com/dist/modules/tooltip.js"></script>
    <script src="https://getstisla.com/dist/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://getstisla.com/dist/modules/prism/prism.js"></script>
    <script src="https://getstisla.com/dist/js/stisla.js"></script>
    <script src="https://getstisla.com/landing/script.js"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    @yield('js')
    
    <!--End mc_embed_signup-->

    </body>
</html>
