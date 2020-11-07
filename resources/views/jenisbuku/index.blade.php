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
} );
</script>
@stop
@extends('layouts.app')
@section('title')
    Data Jenis Buku
@endsection
@section('content')
<div class="row">
  <div class="col-lg-2">
    <a href="{{ route('jenisbuku.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Jenis Buku</a>
  </div>
  <br><br>
  <div class="col-lg-12">
    @include('layouts.alert-messages')
  </div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Jenis Buku</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th>Jenis Buku</th>
                <th style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)
                <tr>
                  <td>{{$data->jenis_buku}}</td>
                  <td style="text-align:center;">
                    <div class="btn-group">
                      <a type="submit" class="btn btn-primary text-white btn-sm" href="{{route('jenisbuku.edit', $data->id)}}"> <i class="fas fa-pencil-alt"></i> </a>
                    </div>
                    <div class="btn-group">
                      <form action="{{ route('jenisbuku.destroy', $data->id)}}" class="delete_form"  method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-sm" id="btn_delete"> <i class="fa fa-trash"></i></button>
                      </form>
                    </div>
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