<nav class="navbar navbar-reverse navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand smooth" href="{{url('/')}}">SIPERPUS</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-lg-3 align-items-lg-center">
                <li class="nav-item"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{url('/daftar')}}" class="nav-link">Registrations</a></li>
                <li class="nav-item"><a href="{{url('/faqs')}}" class="nav-link">FAQ</a></li>
            </ul>
            <ul class="navbar-nav ml-auto align-items-lg-center d-none d-lg-block">
                <li class="ml-lg-3 nav-item">
                    <a href="{{ route('login') }}" class="btn btn-round smooth btn-icon icon-left">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>