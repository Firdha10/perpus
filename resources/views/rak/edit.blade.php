@extends('layouts.app')
@section('title')
    Edit Rak
@endsection
@section('content')
<form action="{{ route('rak.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Rak</h4>
                    <div class="form-group {{ $errors->has('lokasi') ? ' has-error' : '' }}">
                        <label for="lokasi" class="col-md-4 control-label">Rak</label>
                        <div class="col-md-6 ">
                            <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ $data->lokasi }}" required autocomplete="off">
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
                    <a href="{{route('rak.index')}}" class="btn btn-danger ">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
