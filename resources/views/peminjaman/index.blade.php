@section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#table').DataTable({
        "iDisplayLength": 50
      });
      $(function(){ 
        $("form.delete_form button").click(function(e) {
          e.preventDefault();
            var form = $(this).parent();
            Swal.fire({
              title: 'Hapus?',
              text: "Data Tidak Dapat kembali!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus!'
            }).then((result) => {
              if (result.value) {
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Data Terhapus',
                  showConfirmButton: false,
                  timer: 1500
                });
                form.submit();
              }
            });  
        });
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
    });
  </script>
@stop
@extends('layouts.app')
@section('title')
    Data Peminjaman
@endsection
@section('content')
  @if(Auth::user()->level == 'admin')
    <div class="row">
      <div class="col-lg-2">
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
      </div>
      <br><br>
      <div class="col-lg-12">
        @include('layouts.alert-messages')
      </div>
    </div>
  @endif
  <div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Peminjaman</h4>
          <div class="table-responsive">
            <table class="table table-striped" id="table">
              <thead>
                <tr>
                  <th>Kode Peminjaman</th>
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
                      <td class="py-1">{{$data->kode_transaksi}}</td>
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
                        @if(Auth::user()->level == 'admin')
                            <div class="btn-group">
                              @if($data->status == 'pinjam')
                                <form action="{{ route('peminjaman.update', $data->id) }}" method="post" class="edit_form" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  {{ method_field('put') }}
                                  <button class="btn btn-primary text-white btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                </form>
                              @endif
                            </div>
                            <div class="btn-group">
                              <form action="{{ route('peminjaman.destroy', $data->id) }}" class="delete_form"  method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-danger btn-sm" id="btn_delete"><i class="fa fa-trash"></i></button>
                              </form>
                            </div>
                            <div class="btn-group">
                              <a href="{{route('peminjaman.show', $data->id)}}" class="btn btn-success text-white btn-sm"><i class="fas fa fa-file"></i></a>
                            </div>
                        @else
                          <div class="btn-group">
                            <a href="{{route('peminjaman.show', $data->id)}}" class="btn btn-success text-white btn-sm"><i class="fas fa fa-file"></i></a>
                          </div>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          {{--  {!! $datas->links() !!} --}}
        </div>
      </div>
    </div>
  </div>
@endsection