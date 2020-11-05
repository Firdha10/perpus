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
    Data User
@endsection
@section('content')
<div class="row">
  <div class="col-lg-2">
    <a href="{{ route('user.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah User</a>
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
        <h4 class="card-title">Data User</h4>
        <div class="table-responsive">
          <table id="table" class="table table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Tanggal Ditambahkan</th>
                <th style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)
                <tr>
                  <td class="py-1">
                    @if($data->gambar)
                      <img src="{{url('images/user', $data->gambar)}}" alt="image" style="margin-right: 10px;" />
                    @else
                      <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                    @endif
                      {{$data->name}}
                  </td>
                  <td>{{$data->created_at}}</td>
                  <td style="text-align:center;">
                    <div class="btn-group"> 
                      <a type="submit" class="btn btn-primary text-white btn-sm" href="{{route('user.edit', $data->id)}}"> <i class="fas fa-pencil-alt"></i> </a>
                    </div>
                    <div class="btn-group">
                      <form action="{{ route('user.destroy', $data->id) }}" class="delete_form"  method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-sm" id="btn-delete"> <i class="fa fa-trash"></i></button>
                      </form>
                    </div>
                    <div class="btn-group">
                      <a href="{{route('user.show', $data->id)}}" class="btn btn-success text-white btn-sm"><i class="fas fa fa-file"></i></a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{-- {!! $datas->links() !!} --}}
      </div>
    </div>
  </div>
</div>
@endsection