@section('js')
    <script type="text/javascript">
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('submit').disabled = false;
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('submit').disabled = true;
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script>
@endsection
@extends('layouts.guest-template.master')
@section('content')
<section class="daftar">
    <form method="POST" action="{{ route('beranda.kirim') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h3 class="text-center">Daftarkan diri anda di <br>SIPERPUS</h3>
        <h4 class="text-center">Silahkan isi data diri anda dengan benar</h4>
        <div class="container mt-5 ">
            <div class="card border-0 rounded wow animated bounceIn shadow">
                <div class="card-body pt-lg-5">
                    <h5 class="text-center"><strong> Informasi Anda</strong></h5>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-lg-6 {{ $errors->has('nama') ? ' has-error' : '' }}">
                            <p>Nama Lengkap*</p>
                            <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autocomplete="off">
                            @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('no_identitas') ? ' has-error' : '' }}">
                            <p>Nomor Identitas*</p>
                            <input id="no_identitas" type="number" class="form-control" name="no_identitas" value="{{ old('no_identitas') }}" required>
                            @if ($errors->has('no_identitas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_identitas') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                    <div class="row mb-4">
                        <div class="col-lg-6 {{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <p>Tempat Lahir*</p>
                            <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            @if ($errors->has('tempat_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <p>Tanggal Lahir*</p>
                            <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            @if ($errors->has('tgl_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6 {{ $errors->has('jk') ? ' has-error' : '' }}">
                            <p>Jenis Kelamin*</p>
                            <select class="form-control" name="jk" required="">
                                <option value="">--- Pilih Jenis Kelamin ---</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-6 {{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <p>Nomor Telepon*</p>
                            <input id="no_telp" type="number" class="form-control" name="no_telp" value="{{ old('no_telp') }}" required>
                            @if ($errors->has('no_telp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <p>Alamat*</p>
                            <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                            @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="card border-0 rounded shadow">
                <div class="card-body pt-lg-5"  style="padding-top: 60px;">
                    <h5 class="text-center"> <strong>Buat Akun</strong> </h5>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-lg-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <p>Email*</p>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <p>Password*</p>
                            <input id="password" type="password" class="form-control" onkeyup='check();' name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <br>
                            <label for="password-confirm" class="control-label">Confirm Password*</label>
                            <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation" required>
                            <span id='message'></span>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5" style="padding-left:390px;">
                        <div class="col-lg-6">
                            <button class="btn btn-primary w-100">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection