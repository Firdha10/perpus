@extends('layouts.app')
@section('title')
    Edit Jurusan
@endsection
@section('content')
<form action="{{ route('jurusan.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Jurusan</h4>
                    <div class="form-group {{ $errors->has('jurusan') ? ' has-error' : '' }}">
                        <label for="jurusan" class="col-md-4 control-label">Jurusan</label>
                        <div class="col-md-6 ">
                            <input id="jurusan" type="text" class="form-control" name="jurusan" value="{{ $data->jurusan }}" required autocomplete="off">
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
                    <a href="{{route('rak.index')}}" class="btn btn-danger ">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
