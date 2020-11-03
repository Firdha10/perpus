@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')
@section('title')
    Detail Anggota
@endsection
@section('content')

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->nama}}</b></h4>
                      <form class="forms-sample">
                        <div class="form-group">
                            <div class="col-md-6">
                                <img class="product" width="200" height="200" @if($data->user->gambar) src="{{ asset('images/user/'.$data->user->gambar) }}" @endif />
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" readonly>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_identitas') ? ' has-error' : '' }}">
                            <label for="no_identitas" class="col-md-4 control-label">Nomor Identitas</label>
                            <div class="col-md-6">
                                <input id="no_identitas" type="number" class="form-control" name="no_identitas" value="{{ $data->no_identitas }}" maxlength="8" readonly>
                                @if ($errors->has('no_identitas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_identitas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}" readonly>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ date('d F Y', strtotime($data->tgl_lahir)) }}" readonly>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jk" required="" disabled="">
                                <option value=""></option>
                                <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jurusan_id') ? ' has-error' : '' }}">
                            <label for="jurusan_id" class="col-md-4 control-label">Jurusan</label>
                            <div class="col-md-6">
                                <input id="jurusan_id" type="text" class="form-control" name="jurusan_id" value="{{ $data->jurusan->jurusan_id }}" readonly>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                            <label for="user_id" class="col-md-4 control-label">User Login</label>
                            <div class="col-md-6">
                                <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ $data->user->username }}" readonly="">
                            </div>
                        </div>
                        <a href="{{route('anggota.index')}}" class="btn btn-danger pull-right">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection