@extends('layouts.app')
@section('title')
  Lihat Buku
@endsection
@section('content')
    @foreach ($datas as $datas)
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
                <div class="float-left">
                    {{$datas->judul}}
                    <img src="{{url('images/buku/'. $datas->cover)}}" alt="" style="height: 10px; width:">
                </div>
        </div>
    </div>
</div>
        @endforeach
@endsection