@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')
@section('title')
    Tambah Rak
@endsection
@section('content')
<form method="POST" action="{{ route('rak.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Rak</h4>
                            <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                                <label for="lokasi" class="col-md-4 control-label">Rak</label>
                                <div class="col-md-6">
                                    <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ old('lokasi') }}" required autocomplete="off">
                                    @if ($errors->has('lokasi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lokasi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Simpan
                            </button>
                            <a href="{{route('rak.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection