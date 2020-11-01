@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')
@section('title')
    Tambah Jurusan
@endsection
@section('content')
<form method="POST" action="{{ route('jurusan.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Jurusan</h4>
                            <div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                                <label for="jurusan" class="col-md-4 control-label">Jurusan</label>
                                <div class="col-md-6">
                                    <input id="jurusan" type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}" required>
                                    @if ($errors->has('jurusan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jurusan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Simpan
                            </button>
                            <a href="{{route('jurusan.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection