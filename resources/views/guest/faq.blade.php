@extends('layouts.guest-template.master')
@section('content')
<section class ="faq">
    <div class="container">
        <h1 class="wow animated slideInLeft text-center "><strong>FAQ's</strong></h1>
        @foreach ($faq as $item)
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="accordion" id="accordionExample">
                    <div class="card border-0 bg-light rounded ">
                        <div class="card-body" id="headingOne">
                            <strong>{{$item->judul}}</strong>
                            <i class="fa fa-plus text-blue float-right" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}"></i>
                            <div id="collapse{{$item->id}}" class="collapse " aria-labelledby="heading{{$item->id}}" data-parent="#accordionExample">
                                {{$item->deskripsi}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <h5 class="text-center mt-5 wow animated slideInUp">Apakah kamu memiliki pertanyaan lain ?</h5>
        <br>
        <div class="row justify-content-center wow animated slideInUp">
            <div class="col-lg-3 ">
                <a href="https://www.instagram.com/smkn7_smr" target="_blank" class="btn btn-primary ml-auto mr-auto d-block"><i class="fa fa-instagram" style="font-size:28px;"></i> &nbsp;&nbsp; Hubungi kami via Instagram</a>
            </div>
        </div>
        <p class="text-center wow animated slideInUp" style="color:black;">Dapat dihubungi pada jam kerja</p>
    </div>
</section>
@endsection
