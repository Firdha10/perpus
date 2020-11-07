@extends('layouts.app')
@section('title')
    Edit Penerbit
@endsection
@section('content')
<form action="{{ route('penerbit.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Penerbit</h4>
                    <div class="form-group {{ $errors->has('penerbit') ? ' has-error' : '' }}">
                        <label for="penerbit" class="col-md-4 control-label">Penerbit</label>
                        <div class="col-md-6 ">
                            <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ $data->penerbit }}" required autocomplete="off">
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
                    <a href="{{route('penerbit.index')}}" class="btn btn-danger ">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
