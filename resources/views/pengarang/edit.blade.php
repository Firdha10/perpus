@extends('layouts.app')
@section('title')
    Edit Pengarang
@endsection
@section('content')
<form action="{{ route('pengarang.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Pengarang</h4>
                    <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label for="nama" class="col-md-4 control-label">Pengarang</label>
                        <div class="col-md-6 ">
                            <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required autocomplete="off">
                            @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">
                        Simpan
                    </button>
                    <a href="{{route('pengarang.index')}}" class="btn btn-danger ">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
