@section('js')
  <script type="text/javascript">
    $(document).on('click', '.pilih_anggota', function (e) {
      document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
      document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
      $('#myModal2').modal('hide');
    });

    $(function () {
      $("#lookup").dataTable();
    });
  </script>
@stop
@section('css')
@stop
@extends('layouts.app')
@section('title')
  Tambah Data Peminjaman
@endsection
@section('content')
  <form method="POST" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row text-center mt-4 mb-4">
                  <div class="col-lg-6">
                      <h4><strong>Peminjaman</strong></h4>
                  </div>
                </div>
                <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                  <label for="kode_transaksi" class="col-md-4 control-label">Kode Transaksi</label>
                  <div class="col-md-6">
                    <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" required readonly="">
                    @if ($errors->has('kode_transaksi'))
                      <span class="help-block">
                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                  <label for="tgl_pinjam" class="col-md-4 control-label">Tanggal Pinjam</label>
                  <div class="col-md-3">
                    <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                    @if ($errors->has('tgl_pinjam'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                  <label for="tgl_kembali" class="col-md-4 control-label">Tanggal Kembali</label>
                  <div class="col-md-3">
                    <input id="tgl_kembali" type="date"  class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString())) }}" required="" @if(Auth::user()->level == 'user') readonly @endif>
                    @if ($errors->has('tgl_kembali'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tgl_kembali') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                @if(Auth::user()->level == 'admin')
                  <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                    <label for="anggota_id" class="col-md-4 control-label">Anggota</label>
                    <div class="col-md-6">
                      <div class="input-group">
                        <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                        <input id="anggota_id" type="hidden" name="anggota_id" value="{{ old('anggota_id') }}" required readonly="">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Anggota</b> <span class="fa fa-search"></span></button>
                        </span>
                      </div>
                      @if ($errors->has('anggota_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('anggota_id') }}</strong>
                        </span>
                      @endif      
                    </div>
                  </div>
                @else
                  <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                    <label for="anggota_id" class="col-md-4 control-label">Anggota</label>
                    <div class="col-md-6">
                      <input id="anggota_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->anggota->nama}}" required>
                      <input id="anggota_id" type="hidden" name="anggota_id" value="{{ Auth::user()->anggota->id }}" required readonly="">
                      @if ($errors->has('anggota_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('anggota_id') }}</strong>
                        </span>
                      @endif 
                    </div>
                  </div>
                @endif
                <div class="form-group">
                  <label for="buku_id" class="col-md-4 control-label">Buku</label>
                  <div class="col-md-6">
                    <select name="buku[]" id="" class="selectpicker form-control" multiple data-live-search="true" >
                        @foreach($buku as $buku)
                          <option value="{{$buku['id']}}">{{$buku['judul']}} / {{$buku->penerbit['penerbit']}} / {{$buku->pengarang['nama']}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                  <label for="ket" class="col-md-4 control-label">Keterangan</label>
                  <div class="col-md-6">
                    <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                    @if ($errors->has('ket'))
                      <span class="help-block">
                        <strong>{{ $errors->first('ket') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">
                  Kirim
                </button>
                <a href="{{route('peminjaman.index')}}" class="btn btn-danger">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" style="background: #fff;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table id="lookup" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Nomor Identitas</th>
                <th>Jenis Kelamin</th>
              </tr>
            </thead>
            <tbody>
              @foreach($anggotas as $data)
                <tr class="pilih_anggota" data-anggota_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>" >
                  <td class="py-1">{{$data->nama}}</td>
                  <td>{{$data->no_identitas}}</td>
                  <td>{{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>  
        </div>
      </div>
    </div>
  </div>
@endsection