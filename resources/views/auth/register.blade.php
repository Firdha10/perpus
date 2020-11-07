@section('js')
    <script type="text/javascript">
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('submit').disabled = false;
                document.getElementById('messages').style.color = 'green';
                document.getElementById('messages').innerHTML = 'matching';
            } else {
                document.getElementById('submit').disabled = true;
                document.getElementById('messages').style.color = 'red';
                document.getElementById('messages').innerHTML = 'not matching';
            }
        }
    </script>
@stop

@extends('layouts.app')
@section('title')
    Tambah User
@endsection
@section('content')

<form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah User Baru</h4>
                    <h6 class="card-title">Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                    <div class="form-body mt-5 mb-5">
                        <div class="form-group">
                            <div class="row mb-4">
                                <div class="col-lg-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <p>Email*</p>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 {{ $errors->has('level') ? ' has-error' : '' }}">
                                    <p>Role*</p>
                                    <select class="form-control" name="level" required="">
                                        <option value=""></option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>   
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <p>Foto*</p>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id= "gambar" required name= "gambar" class="custom-file-input" id="inputGroupFile01" value="{{isset($insert) ? $insert->file : ''}}">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p>*</p>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id= "gambar" required name= "gambar" class="custom-file-input" id="inputGroupFile01" value="{{isset($insert) ? $insert->file : ''}}">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <p>Password*</p>
                                    <input id="password" type="password" class="form-control" onkeyup='check();' name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <br>
                                    <label for="password-confirm" class="col-md-6 control-label">Confirm Password*</label>
                                    <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation" required>
                                    <span id='messages'></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Simpan
                            </button>
                            <a href="{{route('user.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection