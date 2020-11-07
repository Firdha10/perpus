@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')
@section('title')
    Tambah Jenis Buku
@endsection
@section('content')
<form method="POST" action="{{ route('jenisbuku.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Jenis Buku</h4>
                            <div class="form-group{{ $errors->has('jenis_buku') ? ' has-error' : '' }}">
                                <label for="jenis_buku" class="col-md-4 control-label">Jenis Buku</label>
                                <div class="col-md-6">
                                    <input id="jenis_buku" type="text" class="form-control" name="jenis_buku" value="{{ old('jenis_buku') }}" required autocomplete="off">
                                    @if ($errors->has('jenis_buku'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jenis_buku') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Simpan
                            </button>
                            <a href="{{route('jenisbuku.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection