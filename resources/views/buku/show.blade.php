@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')
@section('title')
    Detail Buku
@endsection
@section('content')

<div class="row">
    <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail <b>{{$data->judul}}</b> </h4>
                        <form class="forms-sample">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <img width="200" height="200" @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif />
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                                <label for="judul" class="col-md-4 control-label">Judul</label>
                                <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control" name="judul" value="{{ $data->judul }}" readonly="">
                                    @if ($errors->has('judul'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('npm') ? ' has-error' : '' }}">
                                <label for="isbn" class="col-md-4 control-label">ISBN</label>
                                <div class="col-md-6">
                                    <input id="isbn" type="text" class="form-control" name="isbn" value="{{ $data->isbn }}" readonly>
                                    @if ($errors->has('isbn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('isbn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pengarang_id') ? ' has-error' : '' }}">
                                <label for="pengarang_id" class="col-md-4 control-label">Pengarang</label>
                                <div class="col-md-6">
                                    <input id="pengarang_id" type="text" class="form-control" name="pengarang_id" value="{{ $data->pengarang->nama }}" readonly>
                                    @if ($errors->has('pengaran_idg'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pengarang_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('penerbit_id') ? ' has-error' : '' }}">
                                <label for="penerbit_id" class="col-md-4 control-label">Penerbit</label>
                                <div class="col-md-6">
                                    <input id="penerbit_id" type="text" class="form-control" name="penerbit_id" value="{{ $data->penerbit->penerbit }}" readonly>
                                    @if ($errors->has('penerbit_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('penerbit_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jenis_buku') ? ' has-error' : '' }}">
                                <label for="jenis_buku" class="col-md-4 control-label">Jenis Buku</label>
                                <div class="col-md-6">
                                    <input id="jenis_buku" type="text" class="form-control" name="jenis_buku" value="{{ $data->jenis->jenis_buku }}" readonly>
                                    @if ($errors->has('jenis_buku'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jenis_buku') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                                <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                                <div class="col-md-6">
                                    <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ $data->tahun_terbit }}" readonly>
                                    @if ($errors->has('tahun_terbit'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                                <label for="jumlah_buku" class="col-md-4 control-label">Jumlah Buku</label>
                                <div class="col-md-6">
                                    <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ $data->jumlah_buku }}" readonly>
                                    @if ($errors->has('jumlah_buku'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                                <div class="col-md-6">
                                    <input id="deskripsi" type="textarea" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" readonly="">
                                    @if ($errors->has('deskripsi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('deskripsi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('rak_id') ? ' has-error' : '' }}">
                                <label for="rak_id" class="col-md-4 control-label">Lokasi Buku (Rak)</label>
                                <div class="col-md-6">
                                    <input id="rak_id" type="text" class="form-control" name="rak_id" value="{{ $data->rak->lokasi }}" readonly>
                                    @if ($errors->has('rak_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rak_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <a href="{{route('buku.index')}}" class="btn btn-danger pull-right">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection