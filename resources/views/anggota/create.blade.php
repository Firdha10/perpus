@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
<script type="text/javascript">
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('submit').disabled = false;
            document.getElementById('messages').style.color = 'green';
            document.getElementById('messages').innerHTML = 'matching';
        } else {
            document.getElementById('submit').disabled = true;
            document.getElementById('messages').style.color = 'red';
            document.getElementById('messages').innerHTML = 'not matching';
        }
    }
</script>
@stop
@extends('layouts.app')
@section('title')
    Tambah Anggota
@endsection
@section('content')
    <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="row text-center mt-5 mb-5">
                                        <div class="col-12">
                                            <h4><strong>Data Diri Anggota</strong></h4>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                                                @if ($errors->has('nama'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nama') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('no_identitas') ? ' has-error' : '' }}">
                                                <label for="no_identitas" class="col-md-4 control-label">Nomor Identitas</label>
                                                <input id="no_identitas" type="number" class="form-control" name="no_identitas" value="{{ old('no_identitas') }}" maxlength="8" required>
                                                @if ($errors->has('no_identitas'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('no_identitas') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                                                <label for="no_telp" class="col-md-4 control-label">Nomor Telepon</label>
                                                <input id="no_telp" type="number" class="form-control" name="no_telp" value="{{ old('no_telp') }}" maxlength="8" required>
                                                @if ($errors->has('no_telp'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                                                <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                                @if ($errors->has('tempat_lahir'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                                <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                                                <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                                                @if ($errors->has('tgl_lahir'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                                                <label for="jk" class="col-md-4 control-label">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" required="">
                                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                                    <option value="L">Laki - Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                                <label for="alamat" class="col-md-4 control-label">Alamat</label>
                                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                                @if ($errors->has('alamat'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('alamat') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center mt-5 mb-5">
                                        <div class="col-12">
                                            <h4><strong>Buat Akun</strong></h4>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Password</label>
                                                <input id="password" type="password" class="form-control" onkeyup='check();' name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>
                                                <input id="confirm_password" type="password" class="form-control" onkeyup='check();' name="password_confirmation" required>
                                                <span id='message'></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submit">
                                        Simpan
                                    </button>
                                    <a href="{{route('anggota.index')}}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection