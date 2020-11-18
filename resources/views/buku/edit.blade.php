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

        $(function () {
        $("#lookup, #lookup2").dataTable();
        });
  </script>
@stop
@extends('layouts.app')
@section('title')
    Edit Buku
@endsection
@section('content')
<form action="{{ route('buku.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Buku <b>{{$data->judul}}</b> </h4>
                    <div class="form-body mt-5 mb-5">
                        <div class="form-group">
                            <div class="row mb-4">
                                <div class="col-lg-6 {{ $errors->has('judul') ? ' has-error' : '' }}">
                                <label for="judul" class="col-md-4 control-label">Judul</label>
                                    <input id="judul" type="text" class="form-control" name="judul" value="{{ $data->judul }}" required>
                                    @if ($errors->has('judul'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6{{ $errors->has('npm') ? ' has-error' : '' }}">
                                    <label for="isbn" class="col-md-4 control-label">ISBN</label>
                                    <input id="isbn" type="text" class="form-control" name="isbn" value="{{ $data->isbn }}" required>
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
                                        <input id="pengarangs_nama" type="text" class="form-control" value="{{ $data->pengarang->nama}}" readonly="" required>
                                        <input id="pengarang_id" class="form-control" type="hidden" name="pengarang_id"  required readonly="">
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
                                        <input id="penerbits_penerbit" type="text" class="form-control" readonly="" required  value="{{ $data->penerbit->penerbit}}">
                                        <input id="penerbit_id" type="hidden" class="form-control" name="penerbit_id" required readonly="">
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
                                <div class="col-lg-6{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                                    <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                                    <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ $data->tahun_terbit }}" required>
                                    @if ($errors->has('tahun_terbit'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 {{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                                    <label for="jumlah_buku" class="col-md-4 control-label">Jumlah Buku</label>
                                    <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ $data->jumlah_buku }}" required>
                                    @if ($errors->has('jumlah_buku'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <p>Lokasi Buku (Rak)*</p>
                                    <select required name="rak_id" class="form-control" value="{{ $data->rak->lokasi }}">
                                        @foreach($raks as $rak)
                                            <option value="{{ $rak['id'] }}" {{$rak->id == $data->rak_id ?  'selected' : ''}}> {{$rak->lokasi}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 {{ $errors->has('jenis_id') ? ' has-error' : '' }}">
                                    <p>Jenis Buku*</p>
                                    <select required name="jenis_id" class="form-control" value="{{ $data->jenis->jenis_buku }}">
                                        @foreach($jenis as $list)
                                        <option value="{{ $list['id'] }}" {{$list->id == $data->jenis_id ?  'selected' : ''}}> {{$list->jenis_buku}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                    <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                                    <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" >
                                    @if ($errors->has('deskripsi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('deskripsi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <br>
                                    <label for="cover" class="col-md-4 control-label">Cover</label>
                                    <br>
                                    <img width="200" height="200" @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif />
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Simpan
                            </button>
                            <a href="{{route('buku.index')}}" class="btn btn-danger ">Kembali</a>
                        </div>
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