@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
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
    Tambah Buku
@endsection
@section('content')

<form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Buku baru</h4>
                    <h6 class="card-title">Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                    <div class="form-body mt-5 mb-5">
                        <div class="row mb-4">
                            <div class="col-lg-6 {{ $errors->has('judul') ? ' has-error' : '' }}">
                                <p>Judul*</p>
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('npm') ? ' has-error' : '' }}">
                                <p>ISBN*</p>
                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" required>
                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 {{ $errors->has('pengarang') ? ' has-error' : '' }}">
                                <p>Pengarang*</p>
                                <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ old('pengarang') }}" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengarang') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('penerbit') ? ' has-error' : '' }}">
                                <p>Penerbit*</p>
                                <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ old('penerbit') }}" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 {{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                                <p>Tahun Terbit*</p>
                                <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                                <p>Jumlah Buku*</p>
                                <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ old('jumlah_buku') }}" required>
                                @if ($errors->has('jumlah_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                <p>Deskripsi*</p>
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" >
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('lokasi') ? ' has-error' : '' }}">
                                <p>Lokasi*</p>
                                <select class="form-control" name="lokasi" required="">
                                    <option value=""></option>
                                    <option value="rak1">Rak 1</option>
                                    <option value="rak2">Rak 2</option>
                                    <option value="rak3">Rak 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <p>Cover*</p>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id= "gambar" required name= "gambar" class="custom-file-input" id="inputGroupFile01" value="{{isset($insert) ? $insert->file : ''}}">
                                        <p class="custom-file-label" for="inputGroupFile01">Choose File</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                            Simpan
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection