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
    <script type="text/javascript">
        $(document).on('click', '.pilih', function (e) {
        document.getElementById("pengarang_id").value = $(this).attr('data-pengarang_id');
        document.getElementById("pengarangs_nama").value = $(this).attr('data-pengarangs_nama');
        $('#myModal').modal('hide');
        });

        $(document).on('click', '.pilih_penerbit', function (e) {
        document.getElementById("penerbit_id").value = $(this).attr('data-penerbit_id');
        document.getElementById("penerbits_penerbit").value = $(this).attr('data-penerbits_penerbit');
        $('#myModal2').modal('hide');
        });
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
                            <div class="col-lg-6 {{ $errors->has('pengarang_id') ? ' has-error' : '' }}">
                                <p>Pengarang*</p>
                                <div class="input-group">
                                    <input id="pengarangs_nama" type="text" class="form-control" readonly="" required>
                                    <input id="pengarang_id" type="hidden" name="pengarang_id" value="{{ old('pengarang_id') }}" required readonly="">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Pengarang</b> <span class="fa fa-search"></span></button>
                                    </span>
                                </div>
                                @if ($errors->has('pengarang_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pengarang_id') }}</strong>
                                </span>
                                @endif 
                            </div>
                            <div class="col-lg-6 {{ $errors->has('penerbit_id') ? ' has-error' : '' }}">
                                <p>Penerbit*</p>
                                <div class="input-group">
                                    <input id="penerbits_penerbit" type="text" class="form-control" readonly="" required>
                                    <input id="penerbit_id" type="hidden" name="penerbit_id" value="{{ old('penerbit_id') }}" required readonly="">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Penerbit</b> <span class="fa fa-search"></span></button>
                                    </span>
                                </div>
                                @if ($errors->has('penerbit_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('penerbit_id') }}</strong>
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
                            <div class="col-lg-6 {{ $errors->has('jenis_id') ? ' has-error' : '' }}">
                                <p>Jenis Buku*</p>
                                <select name="jenis_id" required="" class="form-control">
                                    <option value=''>--- Pilih Jenis Buku ---</option>
                                    @foreach($jenis as $list)
                                        <option value="{{ $list['id'] }}"> {{$list->jenis_buku}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('rak_id') ? ' has-error' : '' }}">
                                <p>Lokasi Buku (Rak)*</p>
                                <select name="rak_id" class="form-control">
                                    <option value=''>- Pilih Rak -</option>
                                    @foreach($raks as $data)
                                        <option value="{{ $data['id'] }}"> {{$data->lokasi}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('rak_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rak_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <p>Cover*</p>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id= "cover" required name= "cover" class="custom-file-input" id="inputGroupFile01" value="{{isset($insert) ? $insert->cover : ''}}">
                                        <p class="custom-file-label" for="inputGroupFile01">Choose File</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                <p>Deskripsi*</p>
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" >
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
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
</form>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Pengarang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('pengarang.create') }}" class="btn btn-primary btn-sm" style="margin-left:20px;"><i class="fa fa-plus"></i> Tambah Pengarang</a>
                </div>
                <br><br>
                <div class="col-md-3">
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="cari" class="form-control" placeholder="Masukan Nama Pengarang">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Pengarang</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengarangs as $data)
                        <tr class="pilih" data-pengarang_id="<?php echo $data->id; ?>" data-pengarangs_nama="<?php echo $data->nama; ?>">
                            <td>{{$data->nama}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>  
            </div>
      </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari Penerbit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <table id="lookup2" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Penerbit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($penerbits as $data)
                        <tr class="pilih_penerbit" data-penerbit_id="<?php echo $data->id; ?>" data-penerbits_penerbit="<?php echo $data->penerbit; ?>">
                            <td>{{$data->penerbit}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>  
            </div>
      </div>
    </div>
</div>
@endsection