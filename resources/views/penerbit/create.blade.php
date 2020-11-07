@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')
@section('title')
    Tambah Penerbit
@endsection
@section('content')
<form method="POST" action="{{ route('penerbit.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Penerbit</h4>
                            <div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                                <label for="penerbit" class="col-md-4 control-label">Penerbit</label>
                                <div class="col-md-6">
                                    <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ old('penerbit') }}" required autocomplete="off">
                                    @if ($errors->has('penerbit'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('penerbit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Simpan
                            </button>
                            <a href="{{route('penerbit.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection