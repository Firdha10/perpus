@extends('layouts.guest-template.master')

@section('content')
<section class="banner">
    <div class="hero-wrapper" id="top"> 
        <div class="hero">
            <div class="container">
                <div class="text text-center text-lg-left">
                    <h1>SIPERPUS</h1>
                    <p class="lead">
                        adalah sebuah sistem yang terintegrasi untuk menyediakan informasi guna mendukung operasi dan manajemen dalam Perpustakaan. Sistem Informasi pada Perpustakaan merupakan perangkat lunak yang didesain khusus untuk mempermudah pendataan koleksi perpustakaan, catalog, data anggota/peminjam, transaksi dan sirkulasi koleksi perpustakaan.
                    </p>
                    <div class="cta">
                        <a class="btn btn-lg btn-warning btn-icon icon-right" href="{{url('/daftar')}}">Daftar Sekarang</a> &nbsp;
                    </div>
                </div>
                <div class="image d-none d-lg-block">
                    <img src="{{ asset('images/OPAC.png') }}" alt="img" style="height:300px; width:300px;">
                </div>
            </div>
        </div>
    </div>
    <div class="callout container partner">
        <h3 style="text-align:center;">OUR PARTNERSHIP</h3>
        <div class="row mt-lg-5 mt-5 justify-content-center">
            <div class="col-lg-4 col-6 col-md-4">
                <img src="{{asset('images/guest/smakenjuh.png')}}" alt="">
            </div>
            <div class="col-lg-4 col-6 col-md-4">
                <img src= "{{asset('images/OPAC.png')}} " alt="" class="images">
            </div>
        </div>
    </div>
</section>
<section class="choose">
    <div class="container">
        <h4>
            Ayo Bergabung Dengan SIPERPUS
        </h4>
        <div class="row justify-content-center wow bounceInUp card-col">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Koleksi SIPERPUS</h5>
                        <p class="card-text"> <b>SIPERPUS</b>  memiliki lebih dari dari <b>200.000</b>  koleksi dalam berbagai bentuk (buku, majalah, koran, jurnal). </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fasilitas SIPERPUS</h5>
                            <p class="card-text"> <b>SIPERPUS</b> dibangun untuk memberikan kemudahan bagi pengguna menikmati fasilitas yang disediakan. Mulai dari prosedur pendaftaran sampai ke prosedur pengembalian buku.</p>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pelayanan SIPERPUS</h5>
                        <p class="card-text">Pengelolaan pelayanan <b>SIPERPUS</b> yang profesional dan sesuai dengan Standar Nasional Perpustakaan (Terakreditasi <b>"A"</b>  oleh Perpustakaan Nasional RI).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection