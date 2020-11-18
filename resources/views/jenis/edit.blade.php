@extends('layouts.app')
@section('title')
    Edit Pengarang
@endsection
@section('content')
<form action="{{ route('jenis.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Pengarang</h4>
                    <div class="form-group {{ $errors->has('jenis_buku') ? ' has-error' : '' }}">
                        <label for="jenis_buku" class="col-md-4 control-label">Pengarang</label>
                        <div class="col-md-6 ">
                            <input id="jenis_buku" type="text" class="form-control" name="jenis_buku" value="{{ $data->jenis_buku }}" required autocomplete="off">
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
                    <a href="{{route('jenis.index')}}" class="btn btn-danger ">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
