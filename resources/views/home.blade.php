@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });
  $(function(){ 
    $("form.edit_form button").click(function(e) {
      e.preventDefault();
        var form = $(this).parent();
        Swal.fire({
          title: 'Anda Yakin Buku Tersebut Sudah Kembali?',
          text: "Status Tidak Dapat Dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sudah Kembali'
        }).then((result) => {
        if (result.value) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Status Berubah',
            showConfirmButton: false,
            timer: 1500
          });
          form.submit();
        }
        });
            
      });
  });
} );
</script>
@stop
@extends('layouts.app')
@section('title')
  Dashboard
@endsection
@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-poll-box text-danger icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Transaksi</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$transaksi->count()}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh transaksi
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-receipt text-warning icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Sedang Pinjam</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$transaksi->where('status', 'pinjam')->count()}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> sedang dipinjam
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-book text-success icon-lg" style="width: 40px;height: 40px;"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Buku</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$buku}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Total Buku
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-account-location text-info icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Anggota</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{$anggota->count()}}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh anggota
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" >
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Transaksi sedang pinjam</h4> 
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)
              <tr>
                <td class="py-1">
                  <a href="{{route('peminjaman.show', $data->id)}}"> 
                    {{$data->kode_transaksi}}
                  </a>
                </td>
                <td>{{$data->anggota->nama}}</td>
                <td>{{date('d/m/y', strtotime($data->tgl_pinjam))}}</td>
                <td>{{date('d/m/y', strtotime($data->tgl_kembali))}}</td>
                <td>
                  @if($data->status == 'pinjam')
                    <label class="badge badge-warning">Pinjam</label>
                  @else
                    <label class="badge badge-success">Kembali</label>
                  @endif
                </td>
                <td style="text-align:center;">
                  <form action="{{ route('peminjaman.update', $data->id) }}" method="post" enctype="multipart/form-data" class="edit_form">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <button class="btn btn-info btn-sm">Sudah Kembali</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
