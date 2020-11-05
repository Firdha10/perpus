@php
$warna = session()->get('type') == 'success' ? '#4CAF50' : '#F44336';
@endphp
<div class="form-group">
    @if (session()->has('message'))
    <div class="alert alert-{{ session()->get('type') == 'success' ? 'success' : 'danger' }}" role="alert"
        style="background: {{$warna}} !important; color: white;">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert"    aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>

@if($errors->isNotEmpty())
<div class="alert alert-danger" role="alert" style="background: #F44336 !important; color: white;">
    <small><strong>Kesalahan!</strong></small>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

    <ul>
        @foreach($errors->all() as $error)
        <li class="mb-1"><small>{{ $error }}</small></li>
        @endforeach
    </ul>
</div>

@endif
